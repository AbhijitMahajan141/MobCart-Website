<?php
    session_start();
    $conn=mysqli_connect('localhost','project','final_p@123','finalproject');
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>About Us</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <style media="screen">
        @import url('https://fonts.googleapis.com/css?family=Courgette|Gotu|Lobster&display=swap');
        body{
            padding: 0;
            top: 0;
            margin-top: 0;
            margin-left: 0;
            margin-right: 0;
            margin-bottom: 0;
            font-family: 'Gotu', sans-serif;
        }
            ul{
                position: absolute;
                top:200px;
                left: 50%;
                transform: translate(-50%,-50%);
                display: flex;
            }
            ul li{
                list-style: none;
            }
            ul li a{
                position: relative;
                text-decoration: none;
                display: block;
                padding: 10px 15px;
                transition: .5s;
                color: rgb(0, 0, 0);
                margin-top: 90px;
            }
            ul li a:before{
                content: "";
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 2px;
                background: #262626;
                z-index: -1;
                transform: scaleX(0);
                transform-origin: left;
                transition: .5s;
                background-color: Black;
            }
            ul li a:hover:before{
                transform: scaleX(1);
                transform-origin: right;
            }
            ul li a:after{
                content: "";
                position: absolute;
                bottom: 0;
                right: 0;
                width: 100%;
                height: 2px;
                background: #262626;
                z-index: -1;
                transform: scaleX(0);
                transform-origin: right;
                transition: .5s;
                background-color: Black;
            }
            ul li a:hover:after{
                transform: scaleX(1);
                transform-origin: left;
            }
            .menu{
                font-size: 30px;
                display: flex;
                justify-content:space-around;
                font-family: 'Courgette', cursive;
                cursor: pointer;
            }
            .menucont{
                padding-top: 400px;
            }
            .topdes{
                border-radius: 0px 0px 600px 600px;
                background: linear-gradient(to right, #11998e, #38ef7d);
                height: 300px;
                width: 100%;
                box-shadow: 1px 1px 30px rgb(37, 36, 36);
            }
            .logoname{
                padding-top: 0;
                margin-top: 0;
                font-family: 'Lobster';
                font-size: 150px;
                background: -webkit-linear-gradient(#8E2DE2, #4A00E0);
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;
                margin-left: 150px;
            }
            footer {
                width: 100%;
                background-color: grey;
                height: 100px;
                text-align: center;
                box-shadow: 1px 1px 30px rgb(37, 36, 36);
                padding-top: 30px;
                font-size: 25px;
                //margin-top: -100px;
                //position: relative;
                //clear: both;
                font-family: 'Courgette', cursive;
            }
            footer a{
                text-decoration: none;
                color: white;
                padding: 10px 15px;
            }
            footer a:hover{
                background-color: rgb(50, 50, 50);
                box-shadow: 1px 1px 30px rgb(37, 36, 36);
            }
            ::-webkit-scrollbar {
                width: 5px;
            }
            .logout-btn{
                float: right;
                display: block;
                margin-top: 100px;
                margin-right: 50px;
                border: none;
                border-radius: 100px;
                background-color: black;
                color: white;
                font-family: 'Courgette', cursive;
                padding: 10px 10px;
                font-size: 20px;
            }
            .logout-btn:hover{
                box-shadow: 1px 1px 30px rgb(37, 36, 36);
                transition: .5s;
            }

            .login-btn{
                float: right;
                display: block;
                margin-top: 100px;
                margin-right: 50px;
                border: none;
                border-radius: 100px;
                background-color: orange;
                color: white;
                font-family: 'Courgette', cursive;
                padding: 10px 10px;
                font-size: 20px;
            }
            .login-btn:hover{
                box-shadow: 1px 1px 30px rgb(37, 36, 36);
                transition: .5s;
            }
            .main{
                text-align: center;
                background-color: rgb(35, 138, 221);
                margin-top: 30px;
                margin-left: 150px;
                margin-right: 150px;
                margin-bottom: 50px;
                border-radius: 50px;
                transition: .5s;
            }
            .main:hover{
                box-shadow: 1px 1px 30px rgb(0, 0, 0);
            }
            .main b{
                font-size: 40px;
                color: rgb(255, 255, 255);
            }
            .main p{
                font-size: 25px;
                color: rgb(221, 221, 221);
                padding-left: 100px;
                padding-right: 100px;
            }
            label{
                font-size: 25px;
                color: rgb(189, 189, 189);
            }
            .feed{
                border-radius: 50px;
                border: none;
                padding: 10px;
                text-align: center;
                margin-bottom: 15px;
                transition: .5s;
                font-size: 15px;
            }
            .feed:focus{
                box-shadow: 1px 1px 30px rgb(0, 0, 0);
            }
            .submitbtn{
                padding: 20px;
                border: none;
                border-radius: 50px;
                margin-bottom: 30px;
                margin-top: 20px;
                transition: .5s;
            }
            .submitbtn:hover{
                box-shadow: 1px 1px 30px rgb(0, 0, 0);
                background: linear-gradient(to right, #11998e, #38ef7d);
                color: white;
            }
            .fa-instagram{
                color: rgb(255, 99, 0);
            }
            .fa-facebook{
                color: rgb(1, 88, 255);
            }
            .err{
                color: Red;
            }
            .done{
                color: rgb(233, 212, 99);
            }
            </style>
    </head>
    <body>
        <?php
        if(isset($_SESSION['userc'])){
            echo '<a href="userlogout.php" class="logout"><button class="logout-btn">LogOut</button></a>';
        }
        else {
            echo '<a href="userlogout.php" class="login"><button class="login-btn">LogIn</button></a>';
        }

        ?>
        <div class="topdes">
        <!--<center><img src="logo2.png" alt="" width="200px" height="200px" ></center>-->
        <center><b><h1 class="logoname">MobCarT</h1></b></center>
        <div class="menucont">
            <div class="menu">
            <ul>
                <li><a href="uhome.php">Home</a></li>
                <li><a href="allprod.php">All Product's</a></li>
                <li><a href="aboutus.php">About Us</a></li>

            </ul>
            </div>
        </div>
    </div><br>
    <center><a href="viewcart.php"><i class="fa fa-shopping-cart" style="font-size:48px"></i></a></center>
    <div class="main">

        <b>About Us</b>
        <p>MobCart is your own Shopping Cart to Buy Android Devices that you Love. We try to Provide you
        with the Best Service Possible. Our Vendor's are trusted and Authorized, we keep tract of your orders so that you dont need to worry about it. We want our User's to Have
        full Control and want them to have a great experience overall.<br/>Our Team is putting a Lot of effort to give you an unforgettable experience.<br/>Regard's:<br/><b style="font-size:25px;">Abhijit Mahajan. <a href="#"><i class="fa fa-instagram"></i></a> <a href="#"><i class="fa fa-facebook"></i></a></br> Rushikesh Sose. <a href="#"><i class="fa fa-instagram"></i></a> <a href="#"> <i class="fa fa-facebook"></i></a></b><br/>
        You can Help us Grow by sending your Feedback to Us.</p>
        <!--<hr width="80%">
        <h2><b>Our Location</b></h2>
        <div id="googleMap" style="width:100%;height:400px;"></div>
        <script type="text/javascript">
        function myMap() {
        var mapProp= {
          center:new google.maps.LatLng(51.508742,-0.120850),
          zoom:5,
        };
        var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);
        }
        </script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDSmjrawrr-aTyxO9tXZeo89jY8sCigDlM&callback=myMap"></script>-->
        <hr width="80%">
        <h3><b>Get In Touch!</b></h3>
        <?php
        $errors=false;
        $err=$done="";
        if (isset($_POST['submit'])) {
            $name=test_input($_POST['name']);
            $email=test_input($_POST['email']);
            $exp=test_input($_POST['exp']);
            $cc=test_input($_POST['cc']);
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                $err="*Invalid E-mail format!";
                $errors=true;
            }
            if (!$errors) {
            $sql="insert into feedback(name,email,experience,comment) values('$name','$email','$exp','$cc')";
            if (!mysqli_query($conn,$sql)) {
                echo "Error".mysqli_error($conn);
            }
            else {
                $done="Feedback Sent Successfully!";
            }
            }
        }
        function test_input($data){
            $data=trim($data);
            $data=stripslashes($data);
            $data=htmlspecialchars($data);
            return $data;
        }
         ?>
        <form method="post" action="aboutus.php">
            <label>Your Name:</label><br/><input type="text" name="name" placeholder="Enter Your Name..." class="feed" required/><br/><br/>
            <label>Your Email:</label><br/><input type="text" name="email" placeholder="Enter Your Email..." class="feed" required></br><span class="err"><?php echo $err;?></span><br/>
            <label>Your Experience:</label><br/><input type="text" name="exp" placeholder="Experience..." class="feed"><br/><br/>
            <label>Comment/Complaint:</label><br/><textarea name="cc" rows="6" cols="60" placeholder="Comment/Complaint..." class="feed"></textarea><br/><span class="done"><?php echo $done;?></span><br/>
            <input type="submit" name="submit" value="Submit" class="submitbtn"><br/>
        </form>
    </div>
    <footer>
        <a href="uhome.php">Home</a>
        <a href="allprod.php">All Product's</a>
        <a href="aboutus.php">About Us</a>
        <hr width="95%">
        Copyright &copy; 2020 MobCart. All Rights reserved
    </footer>
    </body>
</html>
