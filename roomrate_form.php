<?php
$con = mysqli_connect("localhost", "root", "", "hotel_management");

// Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$currentPrice = ""; // Variable to store the current price
$roomType = ""; // Variable to store the room type

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if the search button is clicked
    if (isset($_POST['search'])) {
        // Check if room ID is selected
        if (isset($_POST['roomID'])) {
            // Escape variables for security
            $room_id = mysqli_real_escape_string($con, $_POST['roomID']);

            // Query to retrieve the current price based on room ID
            $priceQuery = "SELECT room_price FROM room WHERE room_id = '$room_id'";
            $priceResult = mysqli_query($con, $priceQuery);

            // Query to retrieve the room type based on room ID
            $roomTypeQuery = "SELECT room_type FROM room WHERE room_id = '$room_id'";
            $roomTypeResult = mysqli_query($con, $roomTypeQuery);

            if ($priceResult) {
                $row = mysqli_fetch_assoc($priceResult);
                $currentPrice = $row['room_price'];
                mysqli_free_result($priceResult); // Free the result set
            } else {
                echo "Error retrieving the current price: " . mysqli_error($con);
            }

            if ($roomTypeResult) {
                $row = mysqli_fetch_assoc($roomTypeResult);
                $roomType = $row['room_type'];
                mysqli_free_result($roomTypeResult); // Free the result set
            } else {
                echo "Error retrieving the room type: " . mysqli_error($con);
            }
        }
    } else if (isset($_POST['submit'])) {
        $seasonName = mysqli_real_escape_string($con, $_POST['seasonName']);
        $startDate = mysqli_real_escape_string($con, $_POST['startDate']);
        $endDate = mysqli_real_escape_string($con, $_POST['endDate']);
        $rateModifier = mysqli_real_escape_string($con, $_POST['rateModifier']);
    
        // Get the selected room ID
        $room_id = mysqli_real_escape_string($con, $_POST['roomID']);
    
        // Retrieve the current room value
        $roomValueQuery = "SELECT room_price FROM room WHERE room_id = '$room_id'";
        $roomValueResult = mysqli_query($con, $roomValueQuery);
    
        if ($roomValueResult) {
            $row = mysqli_fetch_assoc($roomValueResult);
            $roomValue = $row['room_price'];
            mysqli_free_result($roomValueResult); // Free the result set
        } else {
            echo "Error retrieving the current room value: " . mysqli_error($con);
        }
    
        // Calculate the updated room price
        $updatedPrice = $roomValue * $rateModifier;
    
        // Start a transaction
        mysqli_begin_transaction($con);
    
        try {
            // Update room price in the room table
            $updateQuery = "UPDATE room SET room_price = '$updatedPrice' WHERE room_id = '$room_id'";
            mysqli_query($con, $updateQuery);
    
            // Insert season details into the season table
            $insertQuery = "INSERT INTO season (season_name, start_date, end_date, rate_modifier) VALUES ('$seasonName', '$startDate', '$endDate', '$rateModifier')";
            mysqli_query($con, $insertQuery);
    
            // Get the last inserted season_id
            $lastSeasonId = mysqli_insert_id($con);
    
            // Update the season_id for the selected room
            $updateSeasonIdQuery = "UPDATE room SET season_id = '$lastSeasonId' WHERE room_id = '$room_id'";
            mysqli_query($con, $updateSeasonIdQuery);
    
            // Commit the transaction
            mysqli_commit($con);
    
        } catch (Exception $e) {
            // Rollback the transaction if any error occurs
            mysqli_rollback($con);
            echo "Error updating room price and inserting season details: " . $e->getMessage();
        }
    }
    
}

// Retrieve room IDs
$roomQuery = "SELECT room_id FROM room";
$roomResult = mysqli_query($con, $roomQuery);

mysqli_close($con);
?>

<html>
<head>
    <title>Room Price Form</title>
    <style>
        body {
            justify-content: center;
            height: 100vh;
            font-family: Arial, sans-serif;
        }

        .container {
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 0px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .container h2 {
            text-align: center;
            margin-top: 20px;
        }
        
        form {
            margin-top: 30px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        
        td {
            padding: 10px;
            text-align: left;
            vertical-align: center;
            border: none;
        }
        
        input[type="decimal"],
        input[type="text"],
        input[type="date"],
        select {
            font-size: 16px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            width: 170%;
            margin-bottom: 10px;
            box-sizing: border-box;
        }
        
        input[type="submit"] {
            background-color: #4caf50;
            color: #fff;
            padding: 10px 20px;
            margin-top: 20px;
            margin-bottom: 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 18px;
            width: 140%;
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
                    <div class="container">
                        <h2 class="center">Room Price Form</h2>
                        <form name="inpfrm" method="post" action="">
                            <table>
                                <tr>
                                    <td>Room ID:</td>
                                    <td>
                                        <select name="roomID" id="roomID" required>
                                            <option value="">Select Room ID</option>
                                            <?php
                                            while ($row = mysqli_fetch_assoc($roomResult)) {
                                                $selected = ($_POST['roomID'] == $row['room_id']) ? "selected" : "";
                                                echo "<option value='" . $row['room_id'] . "' " . $selected . ">" . $row['room_id'] . "</option>";
                                            }
                                            ?>
                                        </select>
                                    </td>
                                </tr>

                                <?php if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['search'])) : ?>
                                    <?php if ($currentPrice !== "") : ?>
                                        <tr>
                                            <td>Current Price:</td>
                                            <td><input name="currentPrice" type="decimal" id="currentPrice" value="<?php echo $currentPrice; ?>" required readonly></td>
                                        </tr>
                                    <?php else: ?>
                                        <tr>
                                            <td>Current Price:</td>
                                            <td><input name="currentPrice" type="decimal" id="currentPrice" value="" required readonly></td>
                                        </tr>
                                    <?php endif; ?>

                                    <?php if ($roomType !== "") : ?>
                                        <tr>
                                            <td>Room Type:</td>
                                            <td><input name="roomType" type="text" id="roomType" value="<?php echo $roomType; ?>" required readonly></td>
                                        </tr>
                                    <?php else: ?>
                                        <tr>
                                            <td>Room Type:</td>
                                            <td><input name="roomType" type="text" id="roomType" value="" required readonly></td>
                                        </tr>
                                    <?php endif; ?>
                                <?php endif; ?>

                                <tr>
                                    <td colspan="2"><input type="submit" name="search" value="Search Room"></td>
                                </tr>

                                <?php if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['search'])) : ?>
                                    <tr>
                                        <td>Season Name:</td>
                                        <td>
                                            <input name="seasonName" type="text" id="seasonName" required>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>Start Date:</td>
                                        <td>
                                            <input name="startDate" type="date" id="startDate" required>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>End Date:</td>
                                        <td>
                                            <input name="endDate" type="date" id="endDate" required>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>Rate Modifier:</td>
                                        <td>
                                            <input name="rateModifier" type="decimal" id="rateModifier" value="0.00" maxlength="10" required>
                                        </td>
                                    </tr>

                                    <tr>
                                        <th colspan="2"><input type="submit" name="submit" value="Submit"></th>
                                    </tr>
                                <?php endif; ?>
                            </table>
                        </form>
                    </class>

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

