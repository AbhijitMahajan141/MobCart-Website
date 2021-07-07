<?php
    session_start();
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Home</title>
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
            .welcometm{
                margin-top: 10px;
                font-size: 70px;
                margin-bottom: 0px;
            }
            .welcometm b{
                color: Green;
                font-size: 100px;
                animation: glow 2s ease-in-out infinite alternate;
            }
            @keyframes glow {
                from {
                    text-shadow: 0 0 50px #adadad;
                }
                to {
                    text-shadow: 0 0 50px #4f4f4f, 0 0 10px #0f0f0f;
                }
            }
            .welcome{
                font-size: 25px;
                margin-top: 0;
                margin-bottom: 50px;
            }
            .cont{
                display: grid;
                grid-template-columns: 25% 25% 25%;
                margin-left: 250px;
            }
            .flip-card {
              background-color: transparent;
              width: 240px;
              height: 240px;
              perspective: 1000px;
              margin-bottom: 50px;
              margin-left: 50px;
            }

            .flip-card-inner {
              position: relative;
              width: 100%;
              height: 100%;
              text-align: center;
              font-size: 30px;
              transition: transform 0.6s;
              transform-style: preserve-3d;
              box-shadow: 1px 1px 30px rgb(37, 36, 36);
              border-radius: 100%;
            }

            .flip-card:hover .flip-card-inner {
              transform: rotateY(180deg);
            }

            .flip-card-front, .flip-card-back {
              position: absolute;
              width: 100%;
              height: 100%;
              -webkit-backface-visibility: hidden;
              backface-visibility: hidden;
              border-radius: 100%;
            }

            .flip-card-front {
              background-color: #ffffff;
              color: black;
            }

            .flip-card-back {
                background-color: #63c1ff;
                color: white;
                transform: rotateY(180deg);
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

            <center><p class="welcometm">Welcome To <b>MobCart!</b></p><br>
            <p class="welcome">Your own Cart to buy Mobile devices you Like!!<br>
            Our Customer's are very important to us, We make sure to provide you with the best and fastest experience possible! </p>
            <br/><h1 style="font-size:50px;">Top Companies in India</h1>
            </center>
            <center>
                <div class="cont">
                <div class="flip-card">
                <div class="flip-card-inner">
                    <a href="#">
                    <div class="flip-card-front">
                        <img src="xiaomi.png" alt="" style="padding-top:50px;">
                    </div>
                    <div class="flip-card-back">
                        <b>Xiaomi</b>
                    </div>
                </a>
                </div>
            </div>

            <div class="flip-card">
            <div class="flip-card-inner">
                <a href="#">
                <div class="flip-card-front">
                    <img src="sam.svg" alt="">
                </div>
                <div class="flip-card-back">
                    <b>Samsung</b>
                </div>
            </a>
            </div>
        </div>

        <div class="flip-card">
        <div class="flip-card-inner">
            <a href="#">
            <div class="flip-card-front">
                <br/><img src="oneplus.png" alt="" style="margin-left:20px;">
            </div>
            <div class="flip-card-back">
                <b>OnePlus</b>
            </div>
        </a>
        </div>
    </div>

    <div class="flip-card">
    <div class="flip-card-inner">
        <a href="#">
        <div class="flip-card-front">
            <img src="motorola.png" alt="" height="200" width="200">
        </div>
        <div class="flip-card-back">
            <b>MotoRola</b>
        </div>
    </a>
    </div>
</div>

<div class="flip-card">
<div class="flip-card-inner">
    <a href="#">
    <div class="flip-card-front">
        <img src="oppo.png" alt="" width="235">
    </div>
    <div class="flip-card-back">
        <b>Oppo</b>
    </div>
</a>
</div>
</div>

<div class="flip-card">
<div class="flip-card-inner">
    <a href="#">
    <div class="flip-card-front">
        <img src="vivo.png" alt="" width="235">
    </div>
    <div class="flip-card-back">
        <b>Vivo</b>
    </div>
</a>
</div>
</div>

    </div>
        </center>

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
