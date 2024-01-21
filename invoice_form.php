<?php
$con = mysqli_connect("localhost", "root", "", "hotel_management");

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_POST['search'])) {
    $reservation_id = $_POST['reservation_id'];

    // Retrieve the unpaid payment IDs for the selected reservation ID
    $unpaidPaymentSql = "SELECT DISTINCT payment_method_id FROM charge WHERE charge_status = 'Unpaid' AND reservation_id = '$reservation_id'";
    $unpaidPaymentResult = mysqli_query($con, $unpaidPaymentSql);

    $paymentOptions = '';
    while ($row = mysqli_fetch_assoc($unpaidPaymentResult)) {
      $paymentOptions .= "<option value='{$row['payment_method_id']}'>{$row['payment_method_id']}</option>";
    }

    // Calculate the invoice amount as the sum of charge amounts with status 'Unpaid'
    $invoiceAmountSql = "SELECT SUM(charge_amount) AS total_amount FROM charge WHERE charge_status = 'Unpaid' AND reservation_id = '$reservation_id'";
    $invoiceAmountResult = mysqli_query($con, $invoiceAmountSql);
    $row = mysqli_fetch_assoc($invoiceAmountResult);
    $invoice_amount = $row['total_amount'];

    if ($invoice_amount === null) {
      $invoice_amount = 0;
    }
  }

  if (isset($_POST['submit_invoice'])) {
    $invoice_date = $_POST['invoice_date'];
    $invoice_status = $_POST['invoice_status'];
    $invoice_description = $_POST['invoice_description'];
    $reservation_id = $_POST['reservation_id'];
    $payment_method_id = $_POST['payment_method_id'];
    $invoice_amount = $_POST['invoice_amount'];

    // Convert empty invoice_description to NULL
    if ($invoice_description === '') {
      $invoice_description = null;
    }

    // Insert data into invoice table
    $invoiceSql = "INSERT INTO invoice (reservation_id, payment_method_id, invoice_date, invoice_amount, invoice_status, invoice_description)
      VALUES ('$reservation_id', '$payment_method_id', '$invoice_date', '$invoice_amount', '$invoice_status', " . ($invoice_description !== null ? "'$invoice_description'" : "NULL") . ")";
    if (!mysqli_query($con, $invoiceSql)) {
      die('Error: ' . mysqli_error($con));
    }

    // Update charge_status in the charge table
    $updateChargeSql = "UPDATE charge SET charge_status = '$invoice_status' WHERE reservation_id = '$reservation_id' AND payment_method_id = '$payment_method_id'";
    if (!mysqli_query($con, $updateChargeSql)) {
      die('Error: ' . mysqli_error($con));
    }
  }
}

// Retrieve the unpaid reservation IDs from the charge table
$reservationSql = "SELECT DISTINCT reservation_id FROM charge WHERE charge_status = 'Unpaid'";
$reservationResult = mysqli_query($con, $reservationSql);

$reservationOptions = '';
while ($row = mysqli_fetch_assoc($reservationResult)) {
  $selected = (isset($_POST['reservation_id']) && $_POST['reservation_id'] === $row['reservation_id']) ? 'selected' : '';
  $reservationOptions .= "<option value='{$row['reservation_id']}' $selected>{$row['reservation_id']}</option>";
}

mysqli_close($con);
?>

<!DOCTYPE html>
<html>

<head>
    <title>Hotel Invoice Form</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <style>
  .center {
    text-align: center;
  }

  body {
    font-family: Arial, sans-serif;
    background-color: #f2f2f2;
  }

  .container {
    max-width: 500px;
    margin-top: 25px;
    padding: 20px;
    background-color: #fff;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  }

  .container h2 {
    text-align: center;
    margin-top: 50px;
  }

  form {
    width: 80%;
    margin: 0 auto;
    display: flex;
    flex-direction: column;
    align-items: center;
  }

  label {
    display: block;
    margin-bottom: 8px;
    font-weight: bold;
    width: 100%;
  }

  input[type="datetime-local"],
  input[type="varchar"],
  input[type="decimal"],
  select {
    width: 100%;
    padding: 8px;
    margin-bottom: 15px;
    box-sizing: border-box;
    border: 1px solid #ccc;
    border-radius: 4px;
    background-color: #f8f8f8;
    font-size: 16px;
  }

  input[type="submit"] {
    background-color: #4CAF50;
    color: white;
    padding: 8px 16px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 14px;
    width: auto;
    margin-top: 10px;
    margin-bottom: 10px;
  }

  input[type="submit"]:hover {
    background-color: #45a049;
  }

  #search-container {
    width: 100%;
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    align-items: center;
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
            <h2 class="center">Invoice Form</h2>

            <form name="inform" method="post" action="">
              <div id="search-container">
                <label for="reservation_id">Reservation ID:</label>
                <select name="reservation_id">
                  <option value="">Select Reservation ID</option>
                  <?php echo $reservationOptions; ?>
                </select>

                <input name="search" type="submit" value="Search">
              </div>
            </form>

            <?php if (isset($_POST['search']) && isset($_POST['reservation_id'])) : ?>
              <form name="invoice-form" method="post" action="">
                <div id="invoice-container">
                  <input type="hidden" name="reservation_id" value="<?php echo $_POST['reservation_id']; ?>">

                  <label for="payment_method_id">Payment ID:</label>
                  <select name="payment_method_id">
                    <option value="">Select Payment ID</option>
                    <?php echo $paymentOptions; ?>
                  </select>

                  <label for="invoice_amount">Invoice Amount:</label>
                  <input name="invoice_amount" type="decimal" id="invoice_amount" value="<?php echo isset($invoice_amount) ? $invoice_amount : ''; ?>" readonly required>

                  <label for="invoice_date">Invoice Date:</label>
                  <input name="invoice_date" type="datetime-local" id="invoice_date" required>

                  <label for="invoice_status">Invoice Status:</label>
                  <select name="invoice_status">
                    <option value="Pending">Pending</option>
                    <option value="Paid">Paid</option>
                  </select>

                  <label for="invoice_description">Invoice Description:</label>
                  <input name="invoice_description" type="varchar" id="invoice_description">

                  <input name="submit_invoice" type="submit" id="SUBMIT" value="SUBMIT">
                </div>
              </form>
            <?php endif; ?>
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