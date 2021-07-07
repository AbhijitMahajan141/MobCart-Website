<?php
    session_start();
    $conn=mysqli_connect('localhost','project','final_p@123','finalproject');
    $user=$_SESSION['user'];
    $query="Select * from vendorregis where Email='$user'";
    $sqli=mysqli_query($conn, $query);
    $row=mysqli_fetch_array($sqli);
    $id=$row['id'];

    $pname=$quantity=$rate=$cbrand=$color=$ram=$internal=$status=$cpname=$cproname=$sku="";
    $msg=$err="";
    $errors=false;
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        if(isset($_POST['submit'])){
            $pname=test_input($_POST["pname"]);
            $quantity=test_input($_POST["quantity"]);
            $rate=test_input($_POST["rate"]);
            $cbrand=test_input($_POST["cbrand"]);
            $color=test_input($_POST["color"]);
            $ram=test_input($_POST["rams"]);
            $internal=test_input($_POST["internals"]);
            $status=test_input($_POST["status"]);
            $sku=test_input($_POST["sku"]);
            $gst=test_input($_POST["gst"]);
            $desc=test_input($_POST["desc"]);
            $file=$_FILES['image']['name'];
            $path="image/".$file;
            $image=addslashes(file_get_contents($_FILES['image']['tmp_name']));
            move_uploaded_file($image,$path);

            $cpname="SELECT * FROM addproduct WHERE userid='$id' AND productname='{$pname}'";
            $cproname=mysqli_query($conn, $cpname) or die(mysqli_error($conn));
            if(mysqli_num_rows($cproname) > 0){
                $err= "Product Already Added!!";
                $errors=true;
            }

            if(!$errors){
            $pname=mysqli_real_escape_string($conn, $_POST["pname"]);
            $quantity=mysqli_real_escape_string($conn, $_POST["quantity"]);
            $rate=mysqli_real_escape_string($conn, $_POST["rate"]);
            $cbrand=mysqli_real_escape_string($conn, $_POST["cbrand"]);
            $color=mysqli_real_escape_string($conn, $_POST["color"]);
            $ram=mysqli_real_escape_string($conn, $_POST["rams"]);
            $internal=mysqli_real_escape_string($conn, $_POST["internals"]);
            $status=mysqli_real_escape_string($conn, $_POST["status"]);
            $sku=mysqli_real_escape_string($conn, $_POST["sku"]);
            $gst=mysqli_real_escape_string($conn, $_POST["gst"]);
            $date=date("y/m/d");
            $desc=mysqli_real_escape_string($conn, $_POST["desc"]);

            $sql="INSERT INTO addproduct(productname,quantity,rate,gst,brandname,color,Ram,Internal,status,sku,image,description,userid,Date) VALUES('$pname','$quantity','$rate','$gst','$cbrand','$color','$ram','$internal','$status','$sku','$image','$desc','$id','$date')";

            if(mysqli_query($conn, $sql)){
                $msg="New Product Added!!";
                //echo "<script type='text/javascript'>alert('New Product added');</script>";
            }
            else{
                echo "Error:" . mysqli_error($conn);
            }
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
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Add Product</title>
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
                padding-left: 450px;
                color: rgb(255, 255, 255);
                padding-right: 200px;
                width: 50%;
                padding-top: 0px;
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
             input[type=text]:focus,input[type=number]:focus{
                 box-shadow: 1px 1px 30px rgb(106, 106, 106);
             }
            a{
                text-decoration: none;
                color: #818181;
            }
            #add{
                box-sizing: border-box;
                text-align: center;
                border-radius: 10px;
                font-size: 20px;
                padding-top: 0px;
                padding-bottom: 5px;
                //background-color: rgba(0, 0, 0, 0.31);
                background-color: rgb(72, 181, 250);
                font-family:  'EB Garamond', serif;
                transition: .7s;
            }
            #add:hover{
                box-shadow: 1px 1px 20px rgb(0, 0, 0);
            }
            .addp{
                border: none;
                border-radius: 10px;
                padding: 8px;
                border: 0.5px solid;
            }
            .addbt{
                padding: 15px 15px;
                border: none;
                border-radius: 10px;
            }
            .addbt:hover{
                //background-color: rgb(64, 140, 62);
                background: linear-gradient(to left, #11998e, #38ef7d);
                cursor: pointer;
                box-shadow: 1px 1px 20px 3px gray;
                color: white;
                transition: .5s;
            }
            .form1{
                font-size: 25px;
                height: 100%;
            }
            .msg{
                color: rgb(73, 167, 76);
            }
            .err{
                color: RED;
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
                padding-bottom: 20px;
                padding-left: 220px;
                padding-top: 20px;
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
            .logoname{
                font-family: 'Lobster';
                background: -webkit-linear-gradient(#8E2DE2, #4A00E0);
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;
                font-size: 40px;
            }
            @media only screen and (max-width: 768px) {
                .menu{
                    width: 200px;
                    padding-left: 0px;
                }
                .main{
                    width: 50%;
                    padding-left: 250px;
                    padding-right: 100px;
                }
                .bt{
                    width:200px;
                }
                .bname{
                    padding-left: 200px;
                }
                .topnav{
                    padding-left: 200px;
                }
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
            <a href="view.php"><button type="button" name="vap" class="bt"> <img src="visibility.png" alt=""> View product</button><br><br><br><br><br><br><br><br><br></a>
            <a href="inbox.php"><button type="button" name="button" class="bt"> <img src="inbox.png" alt=""> Inbox</button><br><br><br></a>
            <a href="vendorlogin.php"><button type="button" name="button" class="bt"> <img src="logout.png" alt="LogOut"> Logout</button></a>
        </div>
        <div class="topnav">
            <b><?php echo "Welcome ".$_SESSION['user']?></b>
            <a href="profile.php"><button type="button" name="button" class="user"><img src="user.png" alt="wheel"></button></a>
        </div>
        <div class="hr"><hr width="50%" noshade></div>
        <div class="main">
            <div id="add">
                    <h1>Add new Product</h1><hr width="75%" >
                <form class="form1" name="form1" method="post" action="add.php" enctype="multipart/form-data">
                Product Name:<br/><input type="text" name="pname" placeholder="Enter Product" value="<?php echo isset($_POST['pname'])?$_POST['pname']:"";?>" class="addp" required><br><br>
                Quantity(In Stock):<br/><input type="number" name="quantity" placeholder="Enter Quantity" value="<?php echo $_POST['quantity']?>" class="addp" required><br><br>
                Price(with Gst):<br/><input type="number" name="rate" placeholder="Enter Rate" value="<?php echo $_POST['rate']?>" class="addp" required><br><br>
                Base Price:<br><input type="number" name="gst" placeholder="Enter GST Amount" value="<?php echo $_POST['gst']?>" class="addp" required><br><br>
                Choose Brand:</br> <select class="addp" name="cbrand" required>
                                <option value="">--SELECT--</option>
                                <option value="samsung">Samsung</option>
                                <option value="xiaomi">Xiaomi</option>
                                <option value="oneplus">OnePlus</option>
                                <option value="motorola">Motorola</option>
                                <option value="realme">Realme</option>
                                <option value="apple">Apple</option>
                                <option value="vivo">Vivo</option>
                                <option value="Google">Google</option>
                              <select><br><br>
                Color's Available:</br> <input type="text" name="color" placeholder="Enter Color" value="<?php echo isset($_POST['color'])?$_POST['color']:"";?>"  class="addp" required><br><br>
                Ram Size's available:<br> <input type="text" name="rams" placeholder="Enter Rams Size's available for Device..." value="<?php echo isset($_POST['rams'])?$_POST['rams']:"";?>" class="addp" required><br><br>
                Internal storage Size's available:<br> <input type="text" name="internals" placeholder="Enter Internal Size's available for Device..." value="<?php echo isset($_POST['internals'])?$_POST['internals']:"";?>" class="addp" required><br><br>
                Status:</br> <select class="addp" name="status" required>
                            <option value="">--SELECT--</option>
                            <option value="available">Available</option>
                            <option value="not-available">Not-Available</option>
                        </select><br><br>
                SKU Number:<br><input type="text" name="sku" placeholder="Enter SKU number" value="<?php echo isset($_POST['sku'])?$_POST['sku']:"";?>" class="addp" required><br><br>
                Select Image:<br><input type="file" name="image" value="" class="addp" required /><br><br>
                Description:<br><textarea name="desc" rows="3" cols="25" class="addp" value="<?php echo isset($_POST['desc'])?$_POST['desc']:"";?>" autocomplete="off" placeholder="Enter Specification's... " required></textarea><br><br>
                <span class="msg"><?php echo $msg;?></span> <span class="err"><?php echo $err?></span> <br>
                <button type="submit" name="submit" value="submit" class="addbt">Save Data</button><br>
                </form>
            </div>
        </div>
    </body>
</html>
