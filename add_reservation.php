<?php
$con = mysqli_connect("localhost", "root", "", "hotel_management");

if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $firstname = mysqli_real_escape_string($con, $_POST['guest_firstname']);
    $lastname = mysqli_real_escape_string($con, $_POST['guest_lastname']);
    $phone = mysqli_real_escape_string($con, $_POST['guest_phone']);
    $email = mysqli_real_escape_string($con, $_POST['guest_email']);
    $arrival = mysqli_real_escape_string($con, $_POST['checkIn_date']);
    $departure = mysqli_real_escape_string($con, $_POST['checkOut_date']);
    $roomtype = mysqli_real_escape_string($con, $_POST['room_type']);
    $numguest = mysqli_real_escape_string($con, $_POST['number_of_guest']);
    $numroom = mysqli_real_escape_string($con, $_POST['number_of_room']);
	$staff_id = mysqli_real_escape_string($con, $_POST['staff_id']);

    // Date validation
    if (strtotime($arrival) >= strtotime($departure)) {
        mysqli_close($con);
        echo "Invalid date selection. Check-in date should be before the check-out date.";
        exit;
    }

    // Check room availability and type
    $roomQuery = "SELECT room_id FROM room WHERE room_type = '$roomtype' AND room_available = 1 ORDER BY room_id LIMIT $numroom";
    $roomResult = mysqli_query($con, $roomQuery);

    if (mysqli_num_rows($roomResult) < $numroom) {
        mysqli_close($con);
        echo "Insufficient available rooms of type $roomtype.";
        exit;
    }

    // Insert data into guest table
    $guestSql = "INSERT INTO guest (guest_firstname, guest_lastname, guest_phone, guest_email) 
               VALUES (?, ?, ?, ?)";
    $guestStmt = mysqli_prepare($con, $guestSql);
    mysqli_stmt_bind_param($guestStmt, 'ssss', $firstname, $lastname, $phone, $email);
    mysqli_stmt_execute($guestStmt);
	

    // Get the guest ID
    $guestId = mysqli_insert_id($con);

    // Update room status to 0 (booked)
    $roomIds = array();
    while ($row = mysqli_fetch_assoc($roomResult)) {
        $roomIds[] = $row['room_id'];
    }
    $roomIdsStr = implode(',', $roomIds);

    $roomSql = "UPDATE room SET room_available = 0 WHERE room_id IN ($roomIdsStr)";
    mysqli_query($con, $roomSql);

    // Insert data into reservation table
    $reservationSql = "INSERT INTO reservation (guest_id, checkIn_date, checkOut_date, number_of_guest, number_of_room, staff_id)
                     VALUES (?, ?, ?, ?, ?, ?)";
    $reservationStmt = mysqli_prepare($con, $reservationSql);
    mysqli_stmt_bind_param($reservationStmt, 'isssii', $guestId, $arrival, $departure, $numguest, $numroom, $staff_id);
    mysqli_stmt_execute($reservationStmt);

    // Commit the transaction
    mysqli_commit($con);

    // Close the statement and database connection
    mysqli_stmt_close($guestStmt);
    mysqli_stmt_close($reservationStmt);
    mysqli_close($con);
}
?>


<!DOCTYPE html>
<html>

<head>
    <title>Add Reservation</title>
    <link rel="stylesheet" href="assets/css/style.css">

	<style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f2f2f2;
        }

        form {
            width: 100%;
            max-width: 600px;
            padding: 20px;
            margin: 0 auto;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            text-align: center;
        }

        td {
            padding: 10px;
            text-align: left;
            vertical-align: middle;
            border: none;
            font-weight: bold;
        }

        input[type="text"],
        input[type="number"],
        input[type="date"],
        input[type="email"],
        select {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 10px;
            background-color: #f8f8f8;
            font-size: 16px;
        }

        input[type=radio] {
            margin-right: 5px;
            transform: scale(1.2);
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
            width: 100%;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>

    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
	<title>Hotel Dashboard Template</title>
	<link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
	<link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">
	<link rel="stylesheet" href="assets/css/feathericon.min.css">
	<link rel="stylesheet" href="assets/plugins/morris/morris.css">
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap-datetimepicker.min.css">
	<link rel="stylesheet" href="assets/css/style.css"> </head>

</head>

<body>
<body>
	<div class="main-wrapper">
		<div class="header">
			<div class="header-left">
				<a href="admin.php" class="logo"> <img src="image/Black logo.png" width="50" height="70" alt="logo"> <span class="logoclass"></span> </a>
				<a href="admin.php" class="logo logo-small"> <img src="image/Black logo.png" alt="Logo" width="30" height="30"> </a>
			</div>
			
			<ul class="nav user-menu">
				<li class="nav-item dropdown has-arrow">
					<a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown"> <span class="user-img"><img class="rounded-circle" src="assets/img/profiles/avatar-01.jpg" width="31" alt="John Doe"></span> </a>
					<div class="dropdown-menu">
						<div class="user-header">
							<div class="avatar avatar-sm"> <img src="assets/img/profiles/avatar-01.jpg" alt="User Image" class="avatar-img rounded-circle"> </div>
							<div class="user-text">
								<h6>John Doe</h6>
								<p class="text-muted mb-0">Administrator</p>
							</div>
						</div> <a class="dropdown-item" href="profile.html">My Profile</a> <a class="dropdown-item" href="settings.html">Account Settings</a> <a class="dropdown-item" href="login.html">Logout</a> 
                    </div>
				</li>
			</ul>
		</div>
        
		<div class="sidebar" id="sidebar">
			<div class="sidebar-inner slimscroll">
				<div id="sidebar-menu" class="sidebar-menu">
					<ul>
						<li class="active"> <a href="admin.php"><i class="fas fa-tachometer-alt"></i> <span>Dashboard</span></a> </li>
						<li class="list-divider"></li>

						<li class="submenu"> <a href="#"><i class="fas fa-suitcase"></i> <span> Reservation </span> <span class="menu-arrow"></span></a>
							<ul class="submenu_class" style="display: none;">
								<li><a href="all_reservation.php"> All Reservation </a></li>
								<li><a href="add_reservation.php"> Add Reservation </a></li>
							</ul>
						</li>

						<li> <a href="all_guest.php"><i class="fas fa-user"></i> <span>Guest</span></a> </li>


						<li class="submenu"> <a href="#"><i class="fas fa-key"></i> <span> Rooms </span> <span class="menu-arrow"></span></a>
							<ul class="submenu_class" style="display: none;">
								<li><a href="all_room.php">All Rooms </a></li>
								<li><a href="add_room.php"> Add Rooms </a></li>
								<li><a href="roomrate_form.php"> Room Rate </a></li>
							</ul>
						</li>

						<li class="submenu"> <a href="#"><i class="fas fa-user"></i> <span> Staff </span> <span class="menu-arrow"></span></a>
							<ul class="submenu_class" style="display: none;">
								<li><a href="all_staff.php">All Staff </a></li>
								<li><a href="add_staff.php"> Add Staff </a></li>
							</ul>
						</li>

						<li class="submenu"> <a href="#"><i class="far fa-money-bill-alt"></i> <span> Accounts </span> <span class="menu-arrow"></span></a>
							<ul class="submenu_class" style="display: none;">
								<li><a href="invoice_form.php">Invoices </a></li>
								<li><a href="#">Payments </a></li>
								<li><a href="charges.php">charges </a></li>
							</ul>
						</li>

						<li class="submenu"> <a href="#"><i class="fe fe-table"></i> <span> Reports </span> <span class="menu-arrow"></span></a>
							<ul class="submenu_class" style="display: none;">
								<li><a href="testAR1.php">Revenue by Season and Room Type </a></li>
								<li><a href="testAR2.php">Revenue by Room Type and Payment Method </a></li>
                                <li><a href="testAR3.php">Occupancy Rate by Room Type and Season </a></li>
                                <li><a href="testAR4.php">Summation of each Room Type </a></li>
							</ul>
						</li>

						<li> <a href="housekeeping_form.php"><i class="far fa-bell"></i> <span>Housekeeping</span></a> </li>

                        <li> <a href="add_season.php"><i class="far fa-edit"></i> <span>Season Setup</span></a> </li>
						<li> <span></span></a> </li><li> <span></span></a> </li><li> <span></span></a> </li>
						<li> <span></span></a> </li><li> <span></span></a> </li>
					</ul>
				</div>
			</div>
		</div>
<!----------------------------------------------------------------------------------->
        <div class="page-wrapper">
			<div class="content container-fluid">
				<div class="page-header">
					<div class="row align-items-center">
						<div class="col">
							<h3 class="page-title mt-5">Add Reservation</h3> 
                        </div>
					</div>

					<form name="inpfrm" method="post" action="add_reservation.php">
						<table>
							<tr>
								<td>First Name <i class="fas fa-user"></i></td>        
								<td><input id="guest_firstname" type="text" name="guest_firstname" placeholder="First Name" required></td>                
							</tr>
							<tr>
								<td>Last Name <i class="fas fa-user"></i></td>    
								<td><input id="guest_lastname" type="text" name="guest_lastname" placeholder="Last Name" required></td>                    
							</tr>
							<tr>
								<td>Email <i class="fas fa-envelope"></i></td>    
								<td><input id="guest_email" type="email" name="guest_email" placeholder="Your Email" required></td>                    
							</tr>
							<tr>
								<td>Phone Number <i class="fas fa-phone"></i></td>
								<td><input id="guest_phone" type="text" name="guest_phone" placeholder="Your Phone Number" required></td>
							</tr>
							<tr>
								<td>Arrival Date</td>
								<td><input id="checkIn_date" type="date" name="checkIn_date" class="datepicker" required></td>
							</tr>
							<tr>
								<td>Departure Date</td>
								<td><input id="checkOut_date" type="date" name="checkOut_date" required></td>
							</tr>
							<tr>
								<td>Room Type</td>
								<td align="center">
									<label>
										<input type="radio" name="room_type" value="standard">Standard
									</label>
									<label>
										<input type="radio" name="room_type" value="deluxe">Deluxe
									</label>
									<label>
										<input type="radio" name="room_type" value="suite">Suite
									</label>
								</td>
							</tr>
							<tr>
								<td>Number of Room</td>
								<td><input name="number_of_room" type="number" id="number_of_room" size="30" value="" maxlength="30"></td>
							</tr>
							<tr>
								<td>Number of Guest</td>
								<td><input name="number_of_guest" type="number" id="number_of_guest" size="10" value="" maxlength="10"></td>
							</tr>
							<tr>
							
							<td>Staff ID:</td>
							<td>
								<select id="staff_id" name="staff_id">
								<option value="">Select a Staff ID</option> 
									<?php
									$con = mysqli_connect("localhost", "root", "", "hotel_management");
									if (mysqli_connect_errno()) {
										echo "Failed to connect to MySQL: " . mysqli_connect_error();
									} else {
										$staff_query = "SELECT staff_id FROM staff WHERE staff_position = 'Receptionist'";
										$staff_result = mysqli_query($con, $staff_query);
										while ($row = mysqli_fetch_assoc($staff_result)) {
											echo "<option value='" . $row['staff_id'] . "'>" . $row['staff_id'] . "</option>";
										}
										mysqli_close($con);
									}
									?>
								</select>
							</td>
							<br><br>
							</tr>
							<tr>
								<th colspan="2"><input type="submit" value="Submit">
							</tr>
						</table>
					</form>
                </div>
            </div>
        </div>
    </div>

	<script src="assets/js/jquery-3.5.1.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/moment.min.js"></script>
	<script src="assets/js/select2.min.js"></script>
	<script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
	<script src="assets/plugins/raphael/raphael.min.js"></script>
	<script src="assets/js/bootstrap-datetimepicker.min.js"></script>
	<script src="assets/js/script.js"></script>
	<script>
	$(function() {
		$('#datetimepicker3').datetimepicker({
			format: 'LT'
		});
	});
	</script>
</body>

</html>