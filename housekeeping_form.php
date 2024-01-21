<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $con = mysqli_connect("localhost", "root", "", "hotel_management");

    // Check connection
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    } else if (
        isset($_POST['housekeeping_date']) && isset($_POST['housekeeping_time']) && isset($_POST['room_id']) &&
        isset($_POST['staff_id']) && isset($_POST['housekeeping_task'])
    ) {
        $housekeeping_date = $_POST['housekeeping_date'];
        $housekeeping_time = $_POST['housekeeping_time'];
        $room_id = $_POST['room_id'];
        $staff_id = $_POST['staff_id'];
        $housekeeping_task = $_POST['housekeeping_task'];
        $housekeeping_description = $_POST['housekeeping_description'];

        // Escape special characters to prevent SQL injection
        $housekeeping_date = mysqli_real_escape_string($con, $housekeeping_date);
        $housekeeping_time = mysqli_real_escape_string($con, $housekeeping_time);
        $room_id = mysqli_real_escape_string($con, $room_id);
        $staff_id = mysqli_real_escape_string($con, $staff_id);
        $housekeeping_task = mysqli_real_escape_string($con, $housekeeping_task);

        // Check if housekeeping_description is empty and set it to NULL
        if (empty($housekeeping_description)) {
            $housekeeping_description = 'NULL';
        } else {
            $housekeeping_description = "'" . mysqli_real_escape_string($con, $housekeeping_description) . "'";
        }

        // Insert data into housekeeping table
        $insert_query = "INSERT INTO housekeeping (housekeeping_date, housekeeping_time, room_id, staff_id, housekeeping_task, housekeeping_description) 
        VALUES ('$housekeeping_date', '$housekeeping_time', '$room_id', '$staff_id', '$housekeeping_task', $housekeeping_description)";

        if (mysqli_query($con, $insert_query)) {
            // Update room_status column in room table
            $update_query = "UPDATE room SET room_status = '$housekeeping_task', room_available = 1 WHERE room_id = '$room_id'";

            if (mysqli_query($con, $update_query)) {
                mysqli_close($con);
            } else {
                echo "Error updating room status: " . mysqli_error($con);
            }
        } else {
            echo "Error inserting data into housekeeping table: " . mysqli_error($con);
            mysqli_close($con);
            exit();
        }
    }
}
?>


<!DOCTYPE html>
<html>
<head>
    <title>Hotel Housekeeping Form</title>
    <style>
        form {
            max-width: 1000px;
            margin: 0 auto;
            padding-top: 30px;
        }

        input[type="text"],
        select {
        width: 100%;
        padding: 8px 15px;
        margin: 8px 0;
        box-sizing: border-box;
        border: 2px solid #ccc;
        border-radius: 4px;
        background-color: #FFFFFF;
        font-size: 16px;
        color: #000; /* Add this line to set text color to black */
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
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
	<link rel="stylesheet" href="assets/css/style.css"> 

</head>
<body>
    <class="main-wrapper">
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

        <div class="page-wrapper">
			<div class="content container-fluid">
				<div class="page-header">
					<div class="row align-items-center">
						<div class="col">
							<h3 class="page-title mt-5">Hotel Housekeeping Form</h3> 
                        </div>
					</div>
                    
                    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" onsubmit="return submitForm(event)">
                    
                        <label for="housekeeping_date">Date:</label>
                        <input type="date" id="housekeeping_date" name="housekeeping_date"><br><br>

                        <label for="housekeeping_time">Time:</label>
                        <input type="time" id="housekeeping_time" name="housekeeping_time"><br><br>

                        <label for="room_id">Room ID:</label>
                        <select id="room_id" name="room_id">
                        <option value="">Select a Room ID</option>
                            <?php
                            
                            $con = mysqli_connect("localhost", "root", "", "hotel_management");
                            if (mysqli_connect_errno()) {
                                echo "Failed to connect to MySQL: " . mysqli_connect_error();
                            } else {
                                $room_query = "SELECT room_id FROM room ORDER BY room_id";
                                $room_result = mysqli_query($con, $room_query);
                                
                                while ($row = mysqli_fetch_assoc($room_result)) {
                                    echo "<option value='" . $row['room_id'] . "'>" . $row['room_id'] . "</option>";
                                }
                                mysqli_close($con);
                            }
                            ?>
                        </select><br><br>
            
                        <label for="staff_id">Staff ID:</label>
                        <select id="staff_id" name="staff_id">
                        <option value="">Select a Staff ID</option>

                            <?php
                            $con = mysqli_connect("localhost", "root", "", "hotel_management");
                            if (mysqli_connect_errno()) {
                                echo "Failed to connect to MySQL: " . mysqli_connect_error();
                            } else {
                                $staff_query = "SELECT staff_id FROM staff WHERE staff_position = 'Housekeeper'";
                                $staff_result = mysqli_query($con, $staff_query);

                                while ($row = mysqli_fetch_assoc($staff_result)) {
                                    echo "<option value='" . $row['staff_id'] . "'>" . $row['staff_id'] . "</option>";
                                }

                                mysqli_close($con);
                            }
                            ?>

                        </select><br><br>

                        <label for="task">Task:</label><br>
                        <input type="radio" id="clean" name="housekeeping_task" value="Clean">
                        <label for="clean">Clean</label><br>

                        <input type="radio" id="change_lines" name="housekeeping_task" value="Change Lines">
                        <label for="change_lines">Change Lines</label><br>

                        <input type="radio" id="restock_supplies" name="housekeeping_task" value="Restock Supplies">
                        <label for="restock_supplies">Restock Supplies</label><br>

                        <input type="radio" id="other" name="housekeeping_task" value="Other">
                        <label for="other">Other</label><br><br>

                        <label for="housekeeping_description">Task Description:</label><br>
                        <input type="text" id="housekeeping_description" name="housekeeping_description"><br>

                        <input type="hidden" id="success_status" name="success_status" value="false">

                        <input type="submit" value="Submit">

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

