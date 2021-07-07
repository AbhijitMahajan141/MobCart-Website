<?php
    session_start();
    $conn=mysqli_connect('localhost','project','final_p@123','finalproject');
    if (isset($_POST['deliby'])) {
        $recieveid=$_GET['id'];
        $deldate=$_POST['deliby'];
        $deliverydate="UPDATE orders SET deldate='$deldate' WHERE id='$recieveid' ";
        $delidate=mysqli_query($conn,$deliverydate) or die(mysqli_error($conn));
    }
    if (isset($_POST['ordercomp'])) {
        $getingid=$_GET['id'];
        $deleting="DELETE FROM orders WHERE id='$getingid'";
        $delete=mysqli_query($conn,$deleting) or die(mysqli_error($conn));
    }
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title></title>
        <style media="screen">
        @import url('https://fonts.googleapis.com/css?family=EB+Garamond|Bellota|Lobster|Slabo+27px&display=swap');
            body{
                overflow-x: hidden;
                background:#9dd5fa;
            }

            .menu{
                width: 200px;
                top: 0;
                left: 0;
                position: fixed;
                background-color: rgb(29, 40, 68);
                padding-left: 10px;
                color: #373737;
                height: 100%;
                box-shadow: 5px 10px 10px rgb(0, 0, 0);
                text-align: center;
            }
            .main{
                //text-align: center;
                color: rgb(255, 255, 255);
                font-size: 30px;
                padding-left: 220px;
            }
            .bt{
                background-color: rgb(29, 40, 68);
                border: none;
                cursor: pointer;
                font-size: 20px;
                color: #818181;
                position: fixed;
                border-radius: 10px;
                left: 0;
                padding: 10px 20px;
                text-align: left;
                width: 190px;
                transition-duration: 0.5s;
                font-family: 'Bellota';
            }
            .bt:hover{
                //background-color: rgb(123, 53, 156);
                //background: linear-gradient(to right, #7f7fd5, #86a8e7, #91eae4);
                background: linear-gradient(#8E2DE2, #4A00E0);
                box-shadow: 1px 1px 30px rgb(106, 106, 106);
                color: rgb(255, 255, 255);
             }
             .topnav{
                 background-color: rgb(30, 48, 93);
                 padding-left: 220px;
                 padding-bottom: 50px;
                 top: 0;
                 padding-top: 30px;
                 box-shadow: 10px 10px 10px rgb(37, 36, 36);
                 font-size: 25px;
                 color: rgb(255, 255, 255);
                 font-family: 'Bellota';
             }
             .user{
                 float: right;
                 background-color: rgb(255, 255, 255);
                 padding: 10px;
                 border: none;
                 margin-left: 0px;
                 font-size: 15px;
                 border-radius: 50%;
                 transition-duration: 0.5s;
             }
             .user:hover{
                 background-color: rgb(142, 142, 142);
                 box-shadow: 1px 1px 30px rgb(37, 36, 36);
                 color: rgb(255, 255, 255);
             }
             .hr{
                 padding-left: 215px;
                 padding-top: 20px;
             }
             .logoname{
                 font-family: 'Lobster';
                 background: -webkit-linear-gradient(#8E2DE2, #4A00E0);
                 -webkit-background-clip: text;
                 -webkit-text-fill-color: transparent;
                 font-size: 40px;
             }
             .porders{
                 //background-color: rgb(0, 112, 148);
                 background: linear-gradient(to right, #667db6, #0082c8, #0082c8, #667db6);
                 padding-top:40px;
                 padding-bottom:40px;
                 text-align: left;
                 padding-left: 30px;
                 font-size: 25px;
                 //font-family: 'Gotu', sans-serif;
                 border-radius: 100px;
                 margin-bottom: 20px;
                 transition: .5s;
             }
             .porders:hover{
                 box-shadow: 1px 1px 30px rgb(0, 0, 0);
             }
             .accbtn{
                 padding: 10px 20px;
                 border-radius: 100px;
                 border:none;
                 cursor: pointer;
                 background-color: rgb(198, 198, 198);
                 transition: .5s;
                 margin-top: 10px;
                 margin-right: 10px;
             }
             .accbtn:hover{
                 background-color: rgb(31, 108, 46);
                 box-shadow: 1px 1px 30px rgb(0, 0, 0);
                 color: white;
             }
             .rejbtn{
                 padding: 10px 20px;
                 border-radius: 100px;
                 border:none;
                 cursor: pointer;
                 background-color: rgb(198, 198, 198);
                 transition: .5s;
                 margin-top: 10px;
                 margin-right: 10px;
             }
             .rejbtn:hover{
                 background-color: rgb(110, 32, 32);
                 box-shadow: 1px 1px 30px rgb(0, 0, 0);
                 color: white;
             }
             .deliby{
                 width: 150px;
                 height: 20px;
                 border-radius: 10px;
                 border:none;
             }
             .orderc{
                 padding: 10px 20px;
                 border-radius: 100px;
                 border:none;
                 cursor: pointer;
                 background-color: rgb(198, 198, 198);
                 transition: .5s;
                 margin-top: 10px;
                 margin-right: 10px;
             }
             .orderc:hover{
                 background: linear-gradient(to right, #11998e, #38ef7d);
                 box-shadow: 1px 1px 30px rgb(0, 0, 0);
                 color: white;
             }
        </style>
    </head>
    <body>
        <div class="menu">
            <b><h1 class="logoname">MobCarT</h1></b><hr width="75%" noshade>
            <h1 style="color: #ffffff;font-family: 'Bellota';">MENU</h1>
            <a href="activity.php"><button type="button" name="ap" class="bt"> <img src="calendar.png" alt=""> Home</button><br><br><br></a>
            <a href="add.php"><button type="button" name="ap" class="bt"> <img src="addfile.png" alt=""> Add Product</button><br><br><br></a>
            <a href="edit.php"><button type="button" name="epd" class="bt"> <img src="pencil.png" alt=""> Edit Product</button><br><br><br></a>
            <a href="view.php"><button type="button" name="vaprgb(0, 0, 0)" class="bt"> <img src="visibility.png" alt=""> View product</button><br><br><br><br><br><br><br><br><br></a>
            <a href="inbox.php"><button type="button" name="button" class="bt"> <img src="inbox.png" alt=""> Inbox</button><br><br><br></a>
            <a href="vendorlogin.php"><button type="button" name="button" class="bt"> <img src="logout.png" alt="LogOut"> Logout</button></a>
        </div>
        <div class="topnav">
            <b><?php echo "Welcome ".$_SESSION['user']?></b>
            <a href="profile.php"><button type="button" name="button" class="user"><img src="user.png" alt="wheel"></button></a>
        </div>
        <div class="hr"><hr width="50%" noshade></div>

        <div class="main">
            <center><h2 style="font-family:'Gotu', sans-serif;">Orders</h2></center>
            <?php
            $user=$_SESSION['user'];
            $sql="Select * from vendorregis where Email='$user'";
            $sqli=mysqli_query($conn, $sql);
            $row=mysqli_fetch_array($sqli);
            $id=$row['id'];

            $query="SELECT * FROM orders WHERE vendorid='$id'";
            $que=mysqli_query($conn,$query);
            $q=mysqli_num_rows($que);
            while($row1=mysqli_fetch_array($que)) {
                echo "<div class='porders'>";
                echo "<form method='post' action='inbox.php?id=".$row1['id']."'>";
                echo "Name: ".$row1['name']."&nbsp&nbsp";
                echo "Quantity: ".$row1['quantity']."&nbsp&nbsp";
                echo "Color: ".$row1['color']."&nbsp&nbsp";
                echo "RamSize: ".$row1['ram']."gb&nbsp&nbsp";
                echo "InternalSize: ".$row1['internal']."gb&nbsp&nbsp";
                echo "Rate: Rs.".$row1['rate']."<br>";
                echo "<center>Delivered By: <input type='text' name='deliby' class='deliby' placeholder='eg:01-02-2020' required/></center>";
                if ($row1['deldate']==true) {
                    echo "<center><b style='color:rgb(0, 255, 133)'>Delivery date Saved!</b></center>";
                }
                echo "<center><button type='submit' name='accept' class='accbtn'>Accept/update</button><br>";
                echo "</form>";
                echo "<form method='post' action='inbox.php?id=".$row1['id']."'>";
                echo "<button type='submit' name='ordercomp' class='orderc'>Order Completed</button></center>";
                echo "</form>";
                echo "</div>";
            }
             ?>

        </div>
    </body>
</html>
