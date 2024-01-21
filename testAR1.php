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

        h1 {
            text-align: center;
            margin-top: 20px;
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

        .summary-row {
            font-weight: bold;
        }

        .money-value {
            text-align: left;
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
							<h3 class="page-title mt-5">Revenue by Season and Room Type</h3> 
                        </div>
					</div>
                    
                    <table id="report-table">
                        <thead>
                            <tr>
                                <th>Season</th>
                                <th>Room Type</th>
                                <th>Room Price</th>
                                <th>Reservation Count</th>
                                <th>Total Revenue (Room)</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        // Function to fetch seasons data from the database
                        function getSeasonsDataFromDatabase($connection) {
                            $seasons = [];
                            $query = "SELECT * FROM season WHERE season_id IN (1, 2, 3)";
                            $result = $connection->query($query);

                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    $seasons[] = $row;
                                }
                            }

                            return $seasons;
                        }

                        // Function to fetch rooms data from the database
                        function getRoomsDataFromDatabase($connection) {
                            $rooms = [];
                            $query = "SELECT * FROM room WHERE room_type IN ('Standard', 'Deluxe', 'Suite')";
                            $result = $connection->query($query);

                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    $rooms[] = $row;
                                }
                            }

                            return $rooms;
                        }

                        // Function to calculate reservation count and revenue data from the database
                        function getReservationCountAndRevenueFromDatabase($connection) {
                            $data = [];
                            $query = "SELECT 
                                        s.season_id,
                                        CASE s.season_id
                                            WHEN 1 THEN 'Summer'
                                            WHEN 2 THEN 'Rainy'
                                            WHEN 3 THEN 'Winter'
                                        END AS season_name,
                                        r.room_type,
                                        COUNT(CASE WHEN r.room_available = 0 THEN 1 END) AS reservation_count,
                                        SUM(CASE WHEN r.room_available = 0 THEN r.room_price * s.rate_modifier ELSE 0 END) AS total_revenue
                                    FROM 
                                        season AS s
                                        JOIN room AS r ON r.season_id = s.season_id AND r.room_available = 0
                                    WHERE 
                                        r.room_type IN ('Standard', 'Deluxe', 'Suite')
                                        AND s.season_id IN (1, 2, 3)
                                    GROUP BY 
                                        s.season_id, r.room_type";

                            // Execute the query
                            $result = $connection->query($query);

                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    $seasonName = $row['season_name'];
                                    $roomType = $row['room_type'];
                                    $reservationCount = $row['reservation_count'];
                                    $totalRevenue = $row['total_revenue'];

                                    if (!isset($data[$seasonName])) {
                                        $data[$seasonName] = [];
                                    }

                                    $data[$seasonName][$roomType] = [
                                        'reservation_count' => $reservationCount,
                                        'total_revenue' => $totalRevenue
                                    ];
                                }
                            }

                            // Calculate the total revenue for each season
                            foreach ($data as $seasonName => $roomData) {
                                $seasonTotalRevenue = array_sum(array_column($roomData, 'total_revenue'));
                                $data[$seasonName]['season_total_revenue'] = $seasonTotalRevenue;
                            }

                            return $data;
                        }

                        // Function to get room details by type
                        function getRoomByType($roomsData, $roomType) {
                            foreach ($roomsData as $room) {
                                if ($room['room_type'] === $roomType) {
                                    return $room;
                                }
                            }
                            return null;
                        }

                        // Create a database connection
                        $connection = new mysqli("localhost", "root", "", "hotel_management");

                        // Check connection
                        if ($connection->connect_error) {
                            die("Connection failed: " . $connection->connect_error);
                        }

                        // Fetch seasons data from the database
                        $seasonsData = getSeasonsDataFromDatabase($connection);

                        // Fetch rooms data from the database
                        $roomsData = getRoomsDataFromDatabase($connection);

                        // Calculate and fetch reservation count and revenue data from the database
                        $data = getReservationCountAndRevenueFromDatabase($connection);

                        $roomTypes = ["Standard", "Deluxe", "Suite"];

                        // Loop through seasons
                        foreach ($seasonsData as $season) {
                            echo '<tr>';
                            echo '<td rowspan="' . count($roomTypes) . '">' . $season['season_name'] . '</td>';

                            $first = true;
                            foreach ($roomTypes as $roomType) {
                                $room = getRoomByType($roomsData, $roomType);

                                if (!$first) {
                                    echo '<tr>';
                                }

                                if ($room !== null) {
                                    $roomRate = $room['room_price'];
                                    $rateModifier = $season['rate_modifier'];
                                    $roomRatePrice = $roomRate * $rateModifier;

                                    // Check if the reservation count and total revenue are available for the current season and room type
                                    if (isset($data[$season['season_name']][$roomType])) {
                                        $reservationCount = $data[$season['season_name']][$roomType]['reservation_count'];
                                        $totalRevenue = $data[$season['season_name']][$roomType]['total_revenue'];
                                    } else {
                                        $reservationCount = 0;
                                        $totalRevenue = 0;
                                    }

                                    echo '<td>' . $roomType . '</td>';
                                    echo '<td>' . $roomRatePrice . ' Baht per night</td>';
                                    echo '<td>' . $reservationCount . '</td>';
                                    echo '<td class="money-value">' . $totalRevenue . ' Baht</td>';
                                } else {
                                    $reservationCount = 0;
                                    echo '<td>' . $roomType . '</td>';
                                    echo '<td colspan="2"></td>';
                                    echo '<td>' . $reservationCount . '</td>';
                                }

                                echo '</tr>';
                                $first = false;
                            }

                            $seasonTotalRevenue = isset($data[$season['season_name']]['season_total_revenue']) ? $data[$season['season_name']]['season_total_revenue'] : 0;
                            echo '<tr class="summary-row">';
                            echo '<td>Total Revenue</td>';
                            echo '<td colspan="3"></td>';
                            echo '<td class="money-value">' . $seasonTotalRevenue . ' Baht</td>';
                            echo '</tr>';
                        }

                        // Close the database connection
                        $connection->close();
                        ?>
                        </tbody>
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