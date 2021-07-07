<?php
    session_start();
    //echo "<pre>";
    //print_r($_GET);
    $conn=mysqli_connect('localhost','project','final_p@123','finalproject');
    //if (isset($_GET['orderp'])) {
        //$vid=$_GET['id'];
        //$pname=$_GET['productname'];
        //$quantity=$_GET['qty'];
        //$mcolor=$_GET['color'];
        //$ram=$_GET['ram'];
        //$int=$_GET['int'];
    //}
    if (isset($_GET['coid'])) {
        $coid=$_GET['coid'];
        $cancelorderq=mysqli_query($conn,"DELETE FROM orders WHERE id='$coid'") or die(mysqli_error($conn));
        header("Location:viewcart.php");
    }
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Cart</title>
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
                background-color: rgb(0, 0, 0);
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
                background-color: #000000;
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
            .topdes{
                border-radius: 0px 0px 600px 600px;
                background: linear-gradient(to right, #11998e, #38ef7d);
                height: 300px;
                width: 100%;
                box-shadow: 1px 1px 30px rgb(37, 36, 36);
            }
            table{
                text-align: center;
                font-size: 20px;
                border-collapse: collapse;
                border-radius: 1em;
                overflow: hidden;rgb(22, 50, 26)
                margin-top: 50px;
                margin-bottom: 50px;
            }
            th{
                background-color: rgb(41, 129, 65);
                height: 40px;
                color: rgb(255, 255, 255);
                width: 30px;
            }
            td{
                padding-top: 10px;
                padding-bottom: 10px;
                color: rgb(0, 0, 0);
            }
            .remove-btn{
                text-decoration: none;
                color: Red;
            }
            .empty{
                text-align: center;
                color: rgb(36, 36, 36);
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
            .yc{
                font-size: 40px;
                color: rgb(56, 56, 56);
                padding-top: 20px;
            }
            .keeps{
                height: 50px;
                margin-bottom: 50px;
                border: none;
                border-radius: 100px;
                background: linear-gradient(to right, #11998e, #38ef7d);
                font-size: 20px;
                font-family: 'Gotu', sans-serif;
                color: white;
                cursor: pointer;
            }
            .keeps:hover{
                box-shadow: 1px 1px 30px rgb(37, 36, 36);
                transition: .5s;
            }
            .orderp{
                height: 50px;
                width: 50%;
                border: none;
                border-radius: 100px;
                background: linear-gradient(to right, #00d2ff, #3a7bd5);
                margin-top: 20px;
                margin-bottom: 50px;
                font-family: 'Gotu', sans-serif;
                font-size: 20px;
                color: white;
                cursor: pointer;
            }
            .orderp:hover{
                box-shadow: 1px 1px 30px rgb(37, 36, 36);
                transition: .5s;
            }
            .colorc{
                height: 30px;
                border-radius: 20px;
                border: none;
                background-color: black;
                color: white;
                font-family: 'Gotu', sans-serif;
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
            .notlogin{
                color: Red;
                font-size: 25px;
                text-align: center;
                margin-top: 20px;
                margin-bottom: 20px;
            }
            .yourorder{
                padding-top: 50px;
                padding-bottom: 50px;
                text-align: center;
                font-size: 20px;
            }
            .showorder{
                padding-bottom: 20px;
                padding-top: 10px;
                margin-left: 150px;
                margin-right: 150px;
                //background-color: rgb(20, 108, 77);
                background: linear-gradient(to right, #667db6, #0082c8, #0082c8, #667db6);
                margin-bottom: 10px;
                border-radius: 10px;
                transition: .5s;
            }
            .showorder:hover{
                box-shadow: 1px 1px 30px rgb(0, 0, 0);
                font-size: 25px;
            }
            .cancelo{
                padding: 10px 20px;
                border: none;
                border-radius: 50px;
                transition: .5s;
            }
            .cancelo:hover{
                background-color: rgb(210, 59, 59);
                box-shadow: 1px 1px 30px rgb(0, 0, 0);
                color: white;
                cursor: pointer;
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
    <center class="yc">Your Cart<br><i class="fa fa-shopping-cart" style="font-size:48px"></i></center>
    <?php
    if (isset($_GET['id'])) {
        $id=$_GET['id'];
        unset($_SESSION['productcart'][$id]);
        unset($_SESSION['qtycart'][$id]);
    }
if(isset($_SESSION['userc'])){
    $customer=$_SESSION['userc'];
    if (isset($_SESSION['productcart']) && !empty($_SESSION['productcart'])) {
        echo "<table width='90%' align='center' rules='rows' >";
        echo "<tr>";
        echo "<th>Image</th>";
        echo "<th>Name</th>";
        echo "<th>Description</th>";
        echo "<th>Quantity</th>";
        echo "<th>Color</th>";
        echo "<th>Ram</th>";
        echo "<th>Internal</th>";
        echo "<th>Rate</th>";
        echo "<th>Subtotal</th>";
        echo "<th>Action</th>";
        echo "</tr>";

        $grandtotal=array();
        foreach ($_SESSION['productcart'] as $key => $value) {

            $productq=mysqli_query($conn,"SELECT * FROM addproduct WHERE id='{$value}'") or die(mysqli_error($conn));
            $productd=mysqli_fetch_array($productq);
            $colors=explode(',',$productd['color']);
            $ram=explode(',',$productd['Ram']);
            $internal=explode(',',$productd['Internal']);
            $qty=$_SESSION['qtycart'][$key];
            $subtotal=$productd['rate']*$qty;
            echo "<form method='get' action='pinbox.php'>";
            echo "<input type='hidden' name='userid[]' value='{$productd['userid']}'/>";
            echo "<tr>";
            echo "<td><img src = 'data:image/jpg;base64,".base64_encode($productd['image'])."' height='200px' width='200px'/></td>";
            echo "<input type='hidden' name='id[]' value='{$productd['id']}'>";
            echo "<td><input type='hidden' name='productname[]' value='{$productd['productname']}'/>{$productd['productname']}</td>";
            echo "<td>{$productd['description']}</td>";
            echo "<td><input type='hidden' name='qty[]' value='{$qty}'/>$qty</td>";
            echo "<td><select name='color[]' class='colorc'>";
            foreach ($colors as $color) {
                echo "<option value='{$color}'>{$color}</option>";
            }
            echo "</select></td>";
            echo "<td><select name='ram[]' class='colorc'>";
            foreach ($ram as $r) {
                echo "<option value='{$r}'>{$r}</option>";
            }
            echo "</select></td>";
            echo "<td><select name='int[]' class='colorc'>";
            foreach ($internal as $int) {
                echo "<option value='{$int}'>{$int}</option>";
            }
            echo "</select></td>";
            echo "<td><input type='hidden' name='rate[]' value='{$productd['rate']}'/>{$productd['rate']}</td>";
            echo "<td>$subtotal</td>";
            echo "<td><a href='?id=$key' class='remove-btn'>Remove</a></td>";
            echo "<tr>";
            $grandtotal[]=$subtotal;

        }
    $finalsum=array_sum($grandtotal);
    echo "<tr>";
    echo "<td></td>";
    echo "<td></td>";
    echo "<td></td>";
    echo "<td></td>";
    echo "<td></td>";
    echo "<td></td>";
    echo "<td></td>";
    echo "<td>Total:</td>";
    echo "<td>$finalsum</td>";
    echo "</tr>";
    echo "</table>";
    echo "<center><button type='submit' name='orderp' class='orderp'>Place Order</button></center>";
    echo "</form>";
    echo "<center><a href='allprod.php'><button class='keeps'>Keep Shopping</button></a></center>";
    }
    else {
        echo "<center><div class='empty'><h1>Cart is Empty! Let's Buy Something<h1></div></center>";
        echo "<center><a href='allprod.php'><button class='keeps'>Keep Shopping</button></a></center>";
    }

    }
    else {
        echo "<center><div class='notlogin'>Please Login to Add items to cart</div></center>";
    }
    if(isset($_SESSION['userc'])){
    $getuid=mysqli_query($conn,"SELECT id FROM register WHERE email='$customer'");
    $getu=mysqli_fetch_array($getuid);
    $get=$getu['id'];
    if (!$getuid) {
        echo "error:".mysqli_error($conn);
    }
}
     ?>
     <div class="yourorder">
         <center style='font-size: 35px;'>Your Orders</center>
            <?php
                if(isset($_SESSION['userc'])){
                $getcid=mysqli_query($conn,"select id from register where email='".$_SESSION['userc']."'");
                $getc=mysqli_fetch_array($getcid);
                $customerid=$getc['id'];
                $getcorder=mysqli_query($conn,"select * from orders where customerid='$customerid'");
                $getcordnum=mysqli_num_rows($getcorder);
                if ($getcordnum != 0) {
                    while ($getcord=mysqli_fetch_array($getcorder)) {
                        echo "<div class='showorder'><b>Name:</b>".$getcord['name']."&nbsp&nbsp";
                        echo "<b>Quantity:</b>".$getcord['quantity']."&nbsp&nbsp";
                        echo "<b>Color:</b>".$getcord['color']."&nbsp&nbsp";
                        echo "<b>Ram:</b>".$getcord['ram']."&nbsp&nbsp";
                        echo "<b>Internal:</b>".$getcord['internal']."&nbsp&nbsp";
                        echo "<b>Rate:</b>".$getcord['rate']."&nbsp<br>";
                        if ($getcord['deldate']==true) {
                            echo "<b style='color:rgb(0, 255, 133)'>Order Placed!</b><br>";
                            echo "Delivered By: ".$getcord['deldate']."<br>";
                        }
                        echo "<a href='viewcart.php?coid=".$getcord['id']."'><button type='submit' class='cancelo' name='cancelorder'>Cancel</button></a>";
                        echo "</div>";
                    }
                }
                else {
                    echo "<b style='color:red'>No Previous Orders! Buy Something!!</b>";
                }

            }

             ?>
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
