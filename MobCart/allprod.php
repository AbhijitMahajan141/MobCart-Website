<?php
    session_start();
    $conn=mysqli_connect('localhost','project','final_p@123','finalproject');

 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>All Product's</title>
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
                background-color: black;
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
                background-color: black;
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
            }
            .menucont{
                padding-top: 400px;
            }
            .main{
                padding-top: 50px;
                //padding-left: 100px;
            }
            .data{
                padding-bottom: 20px;
                //margin-left: 150px;
                margin-bottom: 50px;
                box-shadow: 1px 1px 30px rgb(80, 80, 80);
                width: 300px;
                height: 550px;
                padding-top: 10px;
                border-radius: 30px;
                font-size: 20px;
                transition: transform .3s;
                background: linear-gradient(to right, #a8ff78, #78ffd6);
                word-wrap: break-word;
                word-break: keep-all;
                overflow: auto;
                transition: .5s;
                scroll-behavior: smooth;

            }
            .data:hover{
                transform:scale(1.1);
            }
            .mainb:after {
                content: "";
                display: table;
                clear: both;
            }
            .search{
                //padding-left: 100px;
                //text-align: center;
                padding-top: 50px;
            }
            .searchb{
                padding: 15px;
                border: 1px solid;
                border-top-left-radius: 100px;
                border-bottom-left-radius: 100px;
                font-size: 15px;
                transition: .5s;
            }
            .searchbt{
                padding: 15px;
                border: 1px solid;
                border-bottom-right-radius: 100px;
                border-top-right-radius: 100px;
                font-size: 15px;
                transition: .5s;
            }
            .searchb:hover{
                box-shadow: 1px 1px 30px rgb(37, 36, 36);
            }
            .searchbt:hover{
                background: linear-gradient(to left, #11998e, #38ef7d);
                box-shadow: 1px 1px 30px rgb(37, 36, 36);
                cursor: pointer;
            }
            .grid{
                display: flex;
                flex-wrap: wrap;
                justify-content: space-around;
                float: left;
                width: 25%;
            }
            .atc{
                border-radius: 10px;
                border: none;
                background-color: white;
                border: 2px solid #4CAF50;
                padding: 15px;
                margin-top: 10px;
                transition: .5s;
                font-family: 'Gotu', sans-serif;
                font-size: 15px;
                cursor: pointer;
            }
            .atc:hover{
                background: linear-gradient(to right, #11998e, #38ef7d);
                box-shadow: 1px 1px 30px rgb(37, 36, 36);
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
            .qty{
                width: 100px;
                border: none;
                box-shadow: 1px 1px 30px rgb(37, 36, 36);
                border-radius: 300px;
                height: 20px;
                text-align: center;
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
        </style>
    </head>
    <body>
        <div class="topdes">
            <?php
            if(isset($_SESSION['userc'])){
                echo '<a href="userlogout.php" class="logout"><button class="logout-btn">LogOut</button></a>';
            }
            else {
                echo '<a href="userlogout.php" class="login"><button class="login-btn">LogIn</button></a>';
            }

             ?>
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

    <center><div class="search">
            <form class="form" action="allprod.php" method="post">
                <input type="text" name="search" placeholder="Search by Name..." class="searchb"><input type="submit" name="sea" value="submit" class="searchbt">
            </form>
        </div></center>
        <div class="mainb">
            <div class="main">
                <center><h1><b>All Product's</b></h1></center><br>

                <?php
                $query="SELECT id,productname,rate,brandname,color,image,description FROM addproduct ";
                $que=mysqli_query($conn, $query);
                $rowcount=mysqli_num_rows($que);

                if (isset($_POST['sea'])) {
                    $search=$_POST['search'];
                    $s="SELECT id,productname,rate,brandname,color,image,description FROM addproduct WHERE productname='$search'";
                    $sea=mysqli_query($conn, $s);
                    while($row=mysqli_fetch_array($sea)){
                        $id=$row['id'];
                        echo  "<form action='cart.php' method='get'><div class='grid'><div class='data'>".'<center><img src = "data:image/jpg;base64,'.base64_encode($row['image']).'" height="200px" width="100%"/><center><br>'."<b>Product's Name: <br></b>".$row["productname"]  ."<br><b>Product's Price: <br>&#x20b9</b>". $row["rate"] ."<br><b>Brand name: <br></b>". $row["brandname"] ."<br><b>Color's Available: <br></b>". $row["color"] ."<br><b>Description: <br></b>". $row['description']."<br>"."<b>Quantity</b>:<br><input type='hidden' name='pid' value='{$id}'><input type='number' name='qty' min='1' max='10' class='qty' required><br><hr><button type='submit' class='atc'>Add to Cart</button><br>"."</div></div></form>";
                    }
                }
                else {
                    for($i=1;$i<=$rowcount;$i++){
                        $row=mysqli_fetch_array($que);
                        $id=$row['id'];
                        echo  "<form action='cart.php' method='get'><div class='grid'><div class='data'>".'<center><img src = "data:image/jpg;base64,'.base64_encode($row['image']).'" height="200px" width="100%"/><center><br>'."<b>Product's Name: <br></b>".$row["productname"]  ."<br><b>Product's Price: <br>&#x20b9</b>". $row["rate"] ."<br><b>Brand name: <br></b>". $row["brandname"] ."<br><b>Color's Available: <br></b>". $row["color"] ."<br><b>Description: <br></b>". $row['description']."<br>"."<b>Quantity</b>:<br><input type='hidden' name='pid' value='{$id}'><input type='number' name='qty' min='1' max='10' class='qty' required><br><hr><button type='submit' class='atc'>Add to Cart</button><br>"."</div></div></form>";
                    }
                }

                 ?>
            </div>
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
