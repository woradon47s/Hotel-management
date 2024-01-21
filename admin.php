<?php

$con = mysqli_connect("localhost","root","","hotel_management");

// Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["id"];

    // Query the database to check if the admin credentials are valid
    $query = "SELECT * FROM admin WHERE email = '$email' AND password = '$password'";
    $result = mysqli_query($con, $query);

    if (mysqli_num_rows($result) > 0) {
        // Admin credentials are valid, redirect to admin.php
        header("Location: admin.php");
        exit();
    } else {
        // Invalid admin credentials, display an error message
        echo "Invalid email or password. Please try again.";
    }
}

/*mysqli_close($con);*/
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<style>
		table {
			width: 100%;
			border-collapse: collapse;
			margin: 0 10px;
			margin-top: 5px;
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
	</style> 

		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
		<title>Hotel Dashboard Template</title>
		<link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">
		<link rel="stylesheet" href="assets/css/bootstrap.min.css">
		<link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
		<link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">
		<link rel="stylesheet" href="assets/css/feathericon.min.css">
		<link rel="stylehseet" href="https://cdn.oesmith.co.uk/morris-0.5.1.css">
		<link rel="stylesheet" href="assets/plugins/morris/morris.css">
		<link rel="stylesheet" href="assets/css/style.css"> 
</head>

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
						</div> <a class="dropdown-item" href="profile.html">My Profile</a> <a class="dropdown-item" href="settings.html">Account Settings</a> <a class="dropdown-item" href="index.php">Logout</a> 
                    </div>
				</li>
			</ul>
			<div class="top-nav-search">
				<form>
					<input type="text" class="form-control" placeholder="Search here">
					<button class="btn" type="submit"><i class="fas fa-search"></i></button>
				</form>
			</div>
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
					<div class="row">
						<div class="col-sm-12 mt-5">
							<h3 class="page-title mt-3">Welcome John Doe!</h3>
							<ul class="breadcrumb">
								<li class="breadcrumb-item active">Dashboard</li>
							</ul>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-xl-3 col-sm-6 col-12">
						<div class="card board1 fill">
							<div class="card-body">
								<div class="dash-widget-header">
                                    <?php
                                        $sql = "SELECT COUNT(*) as all_reservation FROM reservation";
                                        $result = mysqli_query($con, $sql);
                                        $fetch = mysqli_fetch_assoc($result);
                                    ?>
									<div>
                                        <h3 class="card_widget_header"><?php echo isset($fetch['all_reservation']) ? $fetch['all_reservation'] : '0'; ?></h3>
										<h6 class="text-muted">Total Reservation</h6> 
                                    </div>
									<div class="ml-auto mt-md-3 mt-lg-0"> 
                                        <span class="opacity-7 text-muted">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewbox="0 0 24 24" fill="none" stroke="#009688" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user-plus">
                                                <path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                                <circle cx="8.5" cy="7" r="4"></circle>
                                                <line x1="20" y1="8" x2="20" y2="14"></line>
									            <line x1="23" y1="11" x2="17" y2="11"></line>
                                            </svg>
                                        </span> 
                                    </div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-3 col-sm-6 col-12">
						<div class="card board1 fill">
							<div class="card-body">
								<div class="dash-widget-header">
									<?php
                                        $sql = "SELECT COUNT(*) as available_rooms FROM room WHERE room_available = 1";
                                        $result = mysqli_query($con, $sql);
                                        $fetch = mysqli_fetch_assoc($result);
                                    ?>
									<div>
										<h3 class="card_widget_header"><?php echo isset($fetch['available_rooms']) ? $fetch['available_rooms'] : '0'; ?></h3>
										<h6 class="text-muted">Available Rooms</h6> 
                                    </div>
									<div class="ml-auto mt-md-3 mt-lg-0"> 
                                        <span class="opacity-7 text-muted">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewbox="0 0 24 24" fill="none" stroke="#009688" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-globe">
                                                <line x1="12" y1="1" x2="12" y2="23"></line>
                                                <path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path>
									        </svg>
                                        </span> 
                                    </div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-3 col-sm-6 col-12">
						<div class="card board1 fill">
							<div class="card-body">
								<div class="dash-widget-header">
									<?php
                                        $sql = "SELECT COUNT(DISTINCT guest_firstname) as total_guest FROM guest";
                                        $result = mysqli_query($con, $sql);
                                        $fetch = mysqli_fetch_assoc($result);
                                    ?>
									<div>
										<h3 class="card_widget_header"><?php echo isset($fetch['total_guest']) ? $fetch['total_guest'] : '0'; ?></h3>
										<h6 class="text-muted">Total Guest</h6> 
                                    </div>
									<div class="ml-auto mt-md-3 mt-lg-0"> 
                                        <span class="opacity-7 text-muted">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewbox="0 0 24 24" fill="none" stroke="#009688" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-plus">
                                                <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                                                <polyline points="14 2 14 8 20 8"></polyline>
                                                <line x1="12" y1="18" x2="12" y2="12"></line>
									            <line x1="9" y1="15" x2="15" y2="15"></line>
									        </svg>
                                        </span> 
                                    </div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-3 col-sm-6 col-12">
						<div class="card board1 fill">
							<div class="card-body">
								<div class="dash-widget-header">
									<?php
                                        $sql = "SELECT SUM(invoice_amount) as totalrevenue FROM invoice WHERE invoice_status LIKE 'Paid' ";
                                        $result = mysqli_query($con, $sql);
                                        $fetch = mysqli_fetch_assoc($result);
                                    ?>
									<div>
										<h3 class="card_widget_header"><?php echo isset($fetch['totalrevenue']) ? $fetch['totalrevenue'] : '0'; ?></h3>
										<h6 class="text-muted">Total Revenue</h6> 
                                    </div>
									<div class="ml-auto mt-md-3 mt-lg-0"> 
                                        <span class="opacity-7 text-muted">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewbox="0 0 24 24" fill="none" stroke="#009688" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-dollar-sign">
									            <circle cx="12" cy="12" r="10"></circle>
									            <line x1="2" y1="12" x2="22" y2="12"></line>
									            <path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path>
									        </svg>
                                        </span> 
                                    </div>
								</div>
							</div>
						</div>
					</div>
				</div>
				
				<div class="row">
					<div class="col-md-12 d-flex">
						<div class="card card-table flex-fill">
							<div class="card-header">
								<h1 class="card-title float-left mt-2">Reservation</h1>
								<a href="all_reservation.php"><button type="button" class="btn btn-primary float-right veiwbutton">All</button></a>
							</div>
							<div class="card-body">
								<div class="table-responsive">
									<table class="table table-hover table-center">
										<thead>

											<?php
											$con = mysqli_connect("localhost", "root", "", "hotel_management");
											
											if (mysqli_connect_errno()) {
												echo "Failed to connect to MySQL: " . mysqli_connect_error();
												exit;
											}
											if (isset($_POST["checkin"]) && isset($_POST["checkout"])) {
												// Get the search terms from the form
												$checkin = $_POST["checkin"];
												$checkout = $_POST["checkout"];
							
												// Prepare the SQL statement to search for reservation information
												$query = "SELECT DISTINCT(res.reservation_id), g.guest_firstname, g.guest_lastname, r.room_type, res.checkIn_date, res.checkOut_date
														FROM reservation res
														INNER JOIN guest g ON g.guest_id = res.guest_id
														INNER JOIN transcript t ON t.reservation_id = res.reservation_id
														INNER JOIN room r ON r.room_id = t.room_id
														WHERE res.checkIn_date >= '$checkin'
														AND res.checkOut_date <= '$checkout'
														ORDER BY res.reservation_id
														LIMIT 10";
							
												// Execute the query
												$result = mysqli_query($con, $query);
							
												// Check if any search results found
												if (mysqli_num_rows($result) > 0) {
													// Display the search results in a table
													echo "<div class='search-results'>";
													echo "<h2>Search Results:</h2>";
													echo "<table>";
													echo "<tr><th>Reservation ID</th><th>First Name</th><th>Last Name</th><th>Room Type</th><th>Check-In Date</th><th>Check-Out Date</th></tr>";
							
													while ($row = mysqli_fetch_assoc($result)) {
														echo "<tr>";
														echo "<td>" . $row["reservation_id"] . "</td>";
														echo "<td>" . $row["guest_firstname"] . "</td>";
														echo "<td>" . $row["guest_lastname"] . "</td>";
														echo "<td>" . $row["room_type"] . "</td>";
														echo "<td>" . $row["checkIn_date"] . "</td>";
														echo "<td>" . $row["checkOut_date"] . "</td>";
														echo "</tr>";
													}
							
													echo "</table>";
													echo "</div>";
												} else {
													echo "<p>No results found.</p>";
												}
							
												// Free the result set
												mysqli_free_result($result);

											} else {
												// Retrieve and display all reservation data
												$query = "SELECT DISTINCT(reservation.reservation_id), guest.guest_firstname, guest.guest_lastname, room.room_type, reservation.checkIn_date, reservation.checkOut_date
														FROM reservation
														INNER JOIN guest ON guest.guest_id = reservation.guest_id
														INNER JOIN transcript ON transcript.reservation_id = reservation.reservation_id
														INNER JOIN room ON room.room_id = transcript.room_id
														ORDER BY reservation.reservation_id
														LIMIT 10";
												$result = mysqli_query($con, $query);
							
												if (mysqli_num_rows($result) > 0) {
													echo "<div class='reservation-data'>";
													echo "<table>";
													echo "<tr><th>Reservation ID</th><th>First Name</th><th>Last Name</th><th>Room Type</th><th>Check-In Date</th><th>Check-Out Date</th></tr>";
							
													while ($row = mysqli_fetch_assoc($result)) {
														echo "<tr>";
														echo "<td>" . $row["reservation_id"] . "</td>";
														echo "<td>" . $row["guest_firstname"] . "</td>";
														echo "<td>" . $row["guest_lastname"] . "</td>";
														echo "<td>" . $row["room_type"] . "</td>";
														echo "<td>" . $row["checkIn_date"] . "</td>";
														echo "<td>" . $row["checkOut_date"] . "</td>";
														echo "</tr>";
													}
							
													echo "</table>";
													echo "</div>";
												} else {
													echo "<p>No reservation data found.</p>";
												}
							
												// Free the result set
												mysqli_free_result($result);
											}
							
											// Close the database connection
											mysqli_close($con);
											?>

										</thead>
							
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
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
