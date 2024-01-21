<!DOCTYPE html>
<html>
<head>
    <title>Guest Search</title>
    <style>
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
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            width: 1000px;
        }

        .search-container h2 {
            margin-top: 40px;
            font-size: 24px;
            font-weight: 600;
        }

        .search-container input[type=text] {
            padding: 6px;
            width: 300px;
            margin-top: 10px;
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
        <div class="page-wrapper">
			<div class="content container-fluid">
				<div class="page-header">
					<div class="search-container">
                        <h2>All Guest Data</h2> 
                        <form method="POST" action="">
                            <input type="text" name="search" placeholder="Search by First Name or Last Name">
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
                // Get the search term from the form
                $searchTerm = $_POST["search"];
                
                // Prepare the SQL statement to search for guest information
                $hotel_management = "SELECT guest.guest_firstname, guest.guest_lastname, guest.guest_email, guest.guest_phone, reservation.checkIn_date, reservation.checkOut_date 
                            FROM guest 
                            INNER JOIN reservation ON guest.guest_id = reservation.guest_id 
                            WHERE guest.guest_firstname LIKE '%$searchTerm%' OR guest.guest_lastname LIKE '%$searchTerm%'";
                
                // Execute the query for guest information
                $guestResult = mysqli_query($con, $hotel_management);
                
                // Check if any search results found for guest
                if (mysqli_num_rows($guestResult) > 0) {
                    // Display the search results for guest in a table
                    echo "<div class='search-results'>";
                    echo "<h2>Search Results</h2>";
                    echo "<table>";
                    echo "<tr><th>First Name</th><th>Last Name</th><th>Email</th><th>Phone</th><th>Check-In Date</th><th>Check-Out Date</th></tr>";
                    
                    while ($guestRow = mysqli_fetch_assoc($guestResult)) {
                        echo "<tr>";
                        echo "<td>" . $guestRow["guest_firstname"] . "</td>";
                        echo "<td>" . $guestRow["guest_lastname"] . "</td>";
                        echo "<td>" . $guestRow["guest_email"] . "</td>";
                        echo "<td>" . $guestRow["guest_phone"] . "</td>";
                        
                        echo "<td>" . $guestRow["checkIn_date"] . "</td>";
                        echo "<td>" . $guestRow["checkOut_date"] . "</td>";
                        
                        echo "</tr>";
                    }
                    
                    echo "</table>";
                    echo "</div>";
                } else {
                    echo "<p>No results found.</p>";
                }

                // Free the search result set for guest
                mysqli_free_result($guestResult);
                } else {
                // Retrieve all data from the guest table
                $allDataSql = "SELECT guest.guest_firstname, guest.guest_lastname, guest.guest_email, guest.guest_phone, reservation.checkIn_date, reservation.checkOut_date 
                            FROM guest 
                            INNER JOIN reservation ON guest.guest_id = reservation.guest_id";
                $allDataResult = mysqli_query($con, $allDataSql);

                // Check if any results found
                if (mysqli_num_rows($allDataResult) > 0) {
                    // Display all data in a table
                    echo "<div class='search-results'>";
                    echo "<table>";
                    echo "<tr><th>First Name</th><th>Last Name</th><th>Email</th><th>Phone</th><th>Check-In Date</th><th>Check-Out Date</th></tr>";

                    while ($row = mysqli_fetch_assoc($allDataResult)) {
                        echo "<tr>";
                        echo "<td>" . $row["guest_firstname"] . "</td>";
                        echo "<td>" . $row["guest_lastname"] . "</td>";
                        echo "<td>" . $row["guest_email"] . "</td>";
                        echo "<td>" . $row["guest_phone"] . "</td>";
                        echo "<td>" . $row["checkIn_date"] . "</td>";
                        echo "<td>" . $row["checkOut_date"] . "</td>";
                        echo "</tr>";
                    }

                    echo "</table>";
                    echo "</div>";
                } else {
                    echo "<p>No guest data available.</p>";
                }

                // Free the guest result set
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

