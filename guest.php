
<!DOCTYPE html>
<html lang="en">

<head>
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;700&display=swap');
    *{
    box-sizing: border-box;
    padding: 0;
    margin: 0;
    }
    body{
        font-family: 'Poppins', sans-serif;
    }
    .banner{
        min-height: 100vh;
        background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url("banner-contact.jpg") center/cover no-repeat;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        color: #fff;
        padding-bottom: 20px;
    }
    .reservation-details{
        display: grid;
        grid-template-columns: 420px 420px;
    }
    .card-img{
        background: url("image/card-img.jpg") center/cover no-repeat;
    }
    .banner h2{
        padding-bottom: 40px;
        margin-bottom: 20px;
        font-size: 32px;
    }
    .card-content{
        background: #fff;
        height: 330px;
    }
    .card-content h3{
        text-align: center;
        color: #000;
        padding: 25px 0 10px 0;
        font-size: 26px;
        font-weight: 500;
    }
    .form-row{
        display: flex;
        width: 90%;
        margin: 0 auto;
        color: #000;
        font-size: 22px;
        padding: 20px;
    }
    
    
    </style>
    
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guest Page</title>

</head>

<body>
    <section class="banner">
        <h2>RESERVATION DETAILS</h2>
        <div class="reservation-details">
            <div class="card-img">
                
            </div>
            <div class="card-content">
                <form>
                    <div class="form-row">
                        <?php
                        // Retrieve the reservation details from the URL parameters
                        $reservationDetails = $_GET['reservationDetails'];

                        // Display the reservation details
                        echo $reservationDetails;
                        ?>
                    </div>
                </form>
            </div>
        </div> 
    </section>
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