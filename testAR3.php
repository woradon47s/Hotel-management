<!DOCTYPE html>
<html>
<head>
    <title>Occupancy Rate by Room Type and Season</title>
    <style>
        body {
            justify-content: center;
            align-items: center;
            height: 100vh;
            font-family: Arial, sans-serif;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            margin: 0 auto;
            margin-top: 30px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
            background-color: #fff;
        }

        th {
            background-color: #f2f2f2;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
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
							<h3 class="page-title mt-5">Occupancy Rate by Room Type and Season</h3> 
                        </div>
					</div>
                    
                    <table id="revenueTable">
                        <tr>
                            <th>Room Type</th>
                            <th>Season</th>
                            <th>Total Rooms</th>
                            <th>Available Rooms</th>
                            <th>Occupancy Rate (%)</th>
                        </tr>
                        
                        <?php
                        $conn = new mysqli("localhost", "root", "", "hotel_management");

                        // Check connection
                        if ($conn->connect_error) {
                            die("Connection failed: " . $conn->connect_error);
                        }

                        $query = "SELECT room.room_type, season.season_name, COUNT(*) AS total_rooms, 
                        SUM(room.room_available) AS available_rooms, ROUND((SUM(room.room_available) / COUNT(*) * 100), 2) AS occupancy_rate
                        FROM room
                        LEFT JOIN season ON room.season_id = season.season_id
                        GROUP BY room.room_type, season.season_name
                        ORDER BY 
                        CASE 
                            WHEN room.room_type = 'Standard' THEN 1
                            WHEN room.room_type = 'Deluxe' THEN 2
                            WHEN room.room_type = 'Suite' THEN 3
                            ELSE 4 
                        END, 
                        CASE season.season_name
                            WHEN 'Summer' THEN 1
                            WHEN 'Rainy' THEN 2
                            WHEN 'Winter' THEN 3
                            ELSE 4 
                        END";

                        $result = $conn->query($query);
                        $previous_room_type = '';

                        while ($row = $result->fetch_assoc()):
                            if ($previous_room_type !== $row['room_type']):
                                $previous_room_type = $row['room_type'];
                                ?>
                                <tr>
                                    <td rowspan="3"><?php echo $row['room_type']; ?></td>
                                    <td><?php echo $row['season_name']; ?></td>
                                    <td><?php echo $row['total_rooms']; ?></td>
                                    <td><?php echo $row['available_rooms']; ?></td>
                                    <td><?php echo number_format($row['occupancy_rate'], 2); ?></td>
                                </tr>
                            <?php else: ?>
                                <tr>
                                    <td><?php echo $row['season_name']; ?></td>
                                    <td><?php echo $row['total_rooms']; ?></td>
                                    <td><?php echo $row['available_rooms']; ?></td>
                                    <td><?php echo number_format($row['occupancy_rate'], 2); ?></td>
                                </tr>
                            <?php endif; ?>
                        <?php endwhile; ?>
                    </table>
                </div>
            </div>
        </div>

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