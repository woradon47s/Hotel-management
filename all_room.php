<!DOCTYPE html>
<html>
<head>
    <title>Room Search</title>
	<style>
		body {
        flex-direction: column;
        align-items: center;
        height: 10000vh;
        font-family: Arial, sans-serif;
    	}
        
        table {
            width: 100%;
            border-collapse: collapse;
			margin: 0 10px;
        	margin-top: 10px;
        	box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        
        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
			background-color: #fff;
        }

		th {
        	background-color: #f2f2f2;
    	}
        
        .search-container {
            display: flex;
			width: 900px;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .search-container h2 {
            margin-top: 40px;
			font-size: 24px;
        	font-weight: 600;
        }

        .search-container input[type=text] {
            padding: 6px;
            width: 300px;
            margin-top: 30px;
            border: 1px solid #ddd;
        }

        .search-container button {
            padding: 6px 10px;
            background: #ddd;
            font-size: 14px;
            border: none;
            cursor: pointer;
        }

        .search-results {
            margin-top: 20px;
        }
		.search-results .sum-available-rooms {
            margin-top: 20px;
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
					<div class="search-container">
						<h2>Room Data</h2> 
						<form method="POST" action="">
							<input type="text" name="search" placeholder="Search by Room ID or Room Type">
							<select name="availability">
								<option value="all">All</option>
								<option value="available">Available</option>
								<option value="not_available">Not Available</option>
							</select>
							<button type="submit">Search</button>
						</form>
					</div>
				</div>

				<?php
				// Create a connection
				$con = mysqli_connect("localhost", "root", "", "hotel_management");
					
				// Check the connection
				if (!$con) {
					die("Connection failed: " . mysqli_connect_error());
				}
					
				if (isset($_POST["search"])) {
					// Get the search term and availability option from the form
					$searchTerm = $_POST["search"];
					$availability = $_POST["availability"];
						
					// Prepare the SQL statement based on the availability option
					if ($availability == "all") {
						$availabilityCondition = "";
					} elseif ($availability == "available") {
						$availabilityCondition = "AND room_available = 1";
					} elseif ($availability == "not_available") {
						$availabilityCondition = "AND room_available = 0";
					}
						
					// Prepare the SQL statement
					$sql = "SELECT room_id, room_type, room_status, 
							CASE WHEN room_available = 1 THEN 'Available' ELSE 'Not Available' END AS room_availability,
							room_price 
							FROM room 
							WHERE (room_id LIKE '%$searchTerm%' OR room_type LIKE '%$searchTerm%') $availabilityCondition";
					
					// Execute the query
					$result = mysqli_query($con, $sql);
					
					// Check if any search results found
					if (mysqli_num_rows($result) > 0) {
						// Display the search results in a table
						echo "<div class='search-results'>";
						echo "<h2>Search Results</h2>";
						echo "<table>";
						echo "<tr><th>Room ID</th><th>Room Type</th><th>Room Status</th><th>Room Availability</th><th>Room Price</th></tr>";
							
						while ($row = mysqli_fetch_assoc($result)) {
							echo "<tr>";
							echo "<td>" . $row["room_id"] . "</td>";
							echo "<td>" . $row["room_type"] . "</td>";
							echo "<td>" . $row["room_status"] . "</td>";
							echo "<td>" . $row["room_availability"] . "</td>";
							echo "<td>" . $row["room_price"] . "</td>";
							echo "</tr>";
						}
							
						echo "</table>";
							
						// Get the sum of available rooms
						$availableRoomsSql = "SELECT COUNT(*) AS sum_available FROM room WHERE room_available = 1";
						$availableRoomsResult = mysqli_query($con, $availableRoomsSql);
						$row = mysqli_fetch_assoc($availableRoomsResult);
						$sumAvailableRooms = $row["sum_available"];
						mysqli_free_result($availableRoomsResult);
							
						echo "<p class='sum-available-rooms'>Available Rooms: $sumAvailableRooms</p>";
							
						echo "</div>";
					} else {
						echo "<div class='search-results'>";
						echo "<p>No results found.</p>";
						echo "</div>";
					}
					
					// Free the search result set
					mysqli_free_result($result);
				} else {
					// Retrieve all data from the room table
					$allDataSql = "SELECT room_id, room_type, room_status, 
								CASE WHEN room_available = 1 THEN 'Available' ELSE 'Not Available' END AS room_availability,
								room_price 
								FROM room";
						
					// Execute the query
					$allDataResult = mysqli_query($con, $allDataSql);
					
					// Check if any results found
					if (mysqli_num_rows($allDataResult) > 0) {
						// Display all data in a table
						echo "<div class='search-results'>";
						echo "<table>";
						echo "<tr><th>Room ID</th><th>Room Type</th><th>Room Status</th><th>Room Availability</th><th>Room Price</th></tr>";
						
						while ($row = mysqli_fetch_assoc($allDataResult)) {
							echo "<tr>";
							echo "<td>" . $row["room_id"] . "</td>";
							echo "<td>" . $row["room_type"] . "</td>";
							echo "<td>" . $row["room_status"] . "</td>";
							echo "<td>" . $row["room_availability"] . "</td>";
							echo "<td>" . $row["room_price"] . "</td>";
							echo "</tr>";
						}
						
						echo "</table>";
							
						// Get the sum of available rooms
						$availableRoomsSql = "SELECT COUNT(*) AS sum_available FROM room WHERE room_available = 1";
						$availableRoomsResult = mysqli_query($con, $availableRoomsSql);
						$row = mysqli_fetch_assoc($availableRoomsResult);
						$sumAvailableRooms = $row["sum_available"];
						mysqli_free_result($availableRoomsResult);
							
						echo "<p class='sum-available-rooms'>Available Rooms: $sumAvailableRooms</p>";
							
						echo "</div>";
					} else {
						echo "<div class='search-results'>";
						echo "<p>No room data available.</p>";
						echo "</div>";
					}
					
					// Free the room result set
					mysqli_free_result($allDataResult);
				}

				// Close the database connection
				mysqli_close($con);
				?>
			</div>
		</div>
	</class>
	<script data-cfasync="false" src="../../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
	<script src="assets/js/jquery-3.5.1.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
	<script src="assets/plugins/raphael/raphael.min.js"></script>
	<script src="assets/plugins/morris/morris.min.js"></script>
	<script src="assets/js/chart.morris.js"></script>
	<script src="assets/js/script.js"></script>
</body>
</html>

