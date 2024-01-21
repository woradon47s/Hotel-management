<?php
$con = mysqli_connect("localhost", "root", "", "hotel_management");
// Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}

$reservation_id = "";
$staff_email = "";
$staff_id = "";
$guest_email = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST['reservation_id']) && !empty($_POST['guest_email'])) {
        $reservation_id = $_POST["reservation_id"];
        $guest_email = $_POST["guest_email"];

        $query = "SELECT r.*, g.guest_firstname, g.guest_lastname, g.guest_email, g.guest_phone
        FROM reservation AS r
        JOIN guest AS g ON r.guest_id = g.guest_id
        WHERE r.reservation_id = ? AND g.guest_email = ?";
        $stmt = mysqli_prepare($con, $query);
        mysqli_stmt_bind_param($stmt, "is", $reservation_id, $guest_email);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if (mysqli_num_rows($result) > 0) {
            // Reservation ID and guest email match, fetch the details
            $row = mysqli_fetch_assoc($result);
            $reservationDetails = "Reservation ID: " . $row["reservation_id"] . "<br>";
            $reservationDetails .= "Guest First Name: " . $row["guest_firstname"] . "<br>";
            $reservationDetails .= "Guest Last Name: " . $row["guest_lastname"] . "<br>";
            $reservationDetails .= "Guest Email: " . $row["guest_email"] . "<br>";
            $reservationDetails .= "Guest Phone: " . $row["guest_phone"] . "<br>";
            $reservationDetails .= "Check-in Date: " . $row["checkIn_date"] . "<br>";
            $reservationDetails .= "Check-out Date: " . $row["checkOut_date"] . "<br>";

            // Redirect to guest.php with reservation details as URL parameters
            $url = "guest.php?reservationDetails=" . urlencode($reservationDetails);
            header("Location: $url");
            exit();
        } else {
            echo "Invalid reservation ID or guest email. Please try again.";
        }
    } elseif (!empty($_POST['staff_email']) && !empty($_POST['staff_id'])) {
        $staff_email = $_POST["staff_email"];
        $staff_id = $_POST["staff_id"];

        $query = "SELECT * FROM staff WHERE staff_email = ? AND staff_id = ?";
        $stmt = mysqli_prepare($con, $query);
        mysqli_stmt_bind_param($stmt, "ss", $staff_email, $staff_id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if (mysqli_num_rows($result) > 0) {
            // Email and staff ID match, redirect to admin.php
            header("Location: admin.php");
            exit();
        } else {
            echo "Email or password is incorrect. Please try again.";
        }
    } else {
        echo "Invalid input. Please fill in all the required fields.";
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Management System</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header>
        <h2><img src="image/logo.png"></h2>
        <nav class="navigation">
            <a href="#">HOME</a>
            <a href="#">ABOUT</a>
            <a href="#">SERVICE</a>
            <a href="#">ROOM</a>
            <a href="#">CONTACT</a>
        </nav>
    </header>

    <!---------------Content---------------->

    <div class="text-box">
        <h1>Hotel Management System</h1>
        <p>A hotel property management system was defined as a system that enabled
            a hotel to manage front-office capabilities, <br>such as booking reservations,
            guest check-in/checkout, room assignment, managing room rates, and billing.</p>
        <div>
            <button id="guest-login-btn" type="button" class="btnLogin-popup"><span></span>GUEST</button>
            <button id="admin-login-btn" type="button" class="btnLogin-popup"><span></span>ADMIN</button>
        </div>
    </div>

    <!-------------login admin------------->

    <div class="wrapper">
        <span class="icon-close"><ion-icon name="close"></ion-icon></span>

        <div class="login-form" id="guest-login">
            <h2>Login as Guest</h2>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                <div class="input-box">
                    <span class="icon"><ion-icon name="person"></ion-icon></span>
                    <input type="text" name="guest_email" required>
                    <label>Email</label>
                </div>
                <div class="input-box">
                    <span class="icon"><ion-icon name="mail"></ion-icon></span>
                    <input type="text" name="reservation_id" required>
                    <label>Reservation ID</label>
                </div>
                <button type="submit" class="btn">Login</button>
            </form>
        </div>

        <div class="login-form" id="admin-login">
            <h2>Login as Admin</h2>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                <div class="input-box">
                    <span class="icon"><ion-icon name="mail"></ion-icon></span>
                    <input type="email" name="staff_email" required>
                    <label>Email</label>
                </div>
                <div class="input-box">
                    <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
                    <input type="password" name="staff_id" required>
                    <label>Password</label>
                </div>
                <div class="remember-forgot">
                    <label><input type="checkbox">Remember me</label>
                    <a href="#">Forget Password?</a>
                </div>
                <button type="submit" class="btn">Login</button>
            </form>
        </div>
    </div>

    <script type="module"
        src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule
        src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

    <!-------------Javascript--------------->
    <script src="script.js"></script>

</body>

</html>