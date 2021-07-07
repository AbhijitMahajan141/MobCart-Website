 <?php
    session_start();
    $conn=mysqli_connect('localhost','project','final_p@123','finalproject');
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
            $id=$_GET['id'];
            $q="update addproduct set id=$id,productname='$pname',quantity='$quantity',rate='$rate',gst='$gst',brandname='$cbrand',color='$color',Ram='$ram',Internal='$internal',status='$status',sku='$sku',description='$desc',image='$image' where id=$id";
            $qu=mysqli_query($conn, $q);
            //header('location:edit.php');
        }
    }
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Edit Product</title>
        <style media="screen">
        @import url('https://fonts.googleapis.com/css?family=EB+Garamond|Bellota|Lobster|Slabo+27px&display=swap');
            body{
                overflow: auto;
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
            a{
                text-decoration: none;
                color: #818181;
            }
            .main{
                padding-left: 270px;
                color: rgb(65, 65, 65);
                font-size: 25px;
                padding-bottom: 20px;
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
                padding-bottom: 30px;
                padding-left: 220px;
            }
            table,th,tr{
                color: rgb(65, 65, 65);
                //border: 2px solid #a8a8a8;
                border: none;
                border-collapse: collapse;
                text-align: center;
                transition: .5s;
                overflow-x: auto;
            }
            th{
                //background-color: rgb(52, 52, 52);
                background-image: linear-gradient(to bottom,#48c6ef  0%, #6f86d6 100%);
                //background-color: #222831;
                background-color: #0f4c75;
                color: rgb(255, 255, 255);
                font-size: 30px;
            }
            table:hover{
                box-shadow: 1px 1px 30px rgb(80, 80, 80);
            }
            th,td{
                 border-bottom: 1px solid #ddd;
            }
            td{
                width: 100px;
                max-width: 100px;
                word-break: break-all;
                background-color: #eeeeee;
            }
            tr{
                font-size: 20px;
            }
            tr:hover{
                font-size: 30px;
            }
            .table{
                padding-left: 215px;
            }
            .edit{
                background-color: rgb(240, 207, 68);
                border: none;
                padding: 10px;
                border-radius: 10px;
                transition: .5s;
            }
            .edit:hover{
                box-shadow: 1px 1px 10px rgb(0, 0, 0);
                padding: 15px 15px;
            }

            .main2{
                padding-left: 450px;
                color: rgb(24, 24, 24);
                padding-right: 200px;
                width: 50%;
                padding-top: 10px;

            }
            #edit{
                box-sizing: border-box;

                text-align: center;
                border-radius: 10px;
                font-size: 25px;
                padding-top: 0px;
                padding-bottom: 5px;
                //display: none;
                //background: linear-gradient(to right, #a1ffce, #faffd1);
                //background: linear-gradient(to right, #76b852, #8dc26f);
                background-color: rgb(72, 181, 250);
                font-family:  'EB Garamond', serif;
                color: rgb(0, 0, 0);
                transition: .7s;
            }
            #edit:hover{
                box-shadow:  1px 1px 20px rgb(0, 0, 0);
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
                transition: .5s;
            }
            .addbt:hover{
                background: linear-gradient(to left, #11998e, #38ef7d);
                cursor: pointer;
                box-shadow: 1px 1px 20px 3px gray;
                color: white;
            }
            .delete{
                background-color: rgb(175, 45, 45);
                border: none;
                padding: 10px;
                border-radius: 10px;
                transition: .5s;
            }
            .delete:hover{
                box-shadow: 1px 1px 10px rgb(0, 0, 0);
                padding: 15px 15px;
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
            .search{
                padding-left: 250px;
                text-align: center;
                padding-bottom: 30px;
            }
            .searchb{
                padding: 15px;
                border: 1px solid;
                border-top-left-radius: 10px;
                border-bottom-left-radius: 10px;
                font-size: 15px;
                transition: .5s;
            }
            .searchb:hover{
                box-shadow: 1px 1px 30px rgb(37, 36, 36);;
            }
            .searchbt{
                padding: 15px;
                border: 1px solid;
                border-bottom-right-radius: 10px;
                border-top-right-radius: 10px;
                font-size: 15px;
                transition: .5s;
            }
            .searchbt:hover{
                background: linear-gradient(to left, #11998e, #38ef7d);
                box-shadow: 1px 1px 30px rgb(37, 36, 36);
                cursor: pointer;
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
                .bt{
                    width:200px;
                }
                .main{
                    padding-left: 200px;
                }
                .table{
                    padding-left: 200px;
                    overflow-x: auto;
                }
                table,th,tr{
                    //width: 100%;
                }
                .topnav{
                    padding-left: 200px;
                }
                .main2{
                    padding-left: 270px;
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
            <a href="vendorlogin.php"><button type="button" name="button" class="bt" onclick="sessend()"> <img src="logout.png" alt=""> Logout</button></a>
        </div>
        <div class="topnav">
            <b><?php echo "Welcome ".$_SESSION['user']?></b>
            <a href="profile.php"><button type="button" name="button" class="user"><img src="user.png" alt="wheel"></button></a>
        </div>
        <div class="main">
        </div><div class="hr"><hr width="50%" noshade></div>
        <h2 style="text-align: center; padding-left: 230px; font-size:30px;">Product List</h2>
        <div class="search">
        <form class="form" action="edit.php" method="post">
            <input type="text" name="search" placeholder="Search by SKU..." class="searchb"><input type="submit" name="sea" value="submit" class="searchbt">
        </form>
    </div>

        <div class="table">
            <table cellspacing="10px" cellpadding="5px" border="1">
                <tr>
                    <th>ProductName</th>
                    <th>Quantity</th>
                    <th>Rate</th>
                    <th>GST</th>
                    <th>Brandname</th>
                    <th>Color</th>
                    <th>Status</th>
                    <th>SKU</th>
                    <th>Description</th>
                    <th>Action</th>
                </tr>
            <?php
                $user=$_SESSION['user'];
                $query="Select * from vendorregis where Email='$user'";
                $sqli=mysqli_query($conn, $query);
                $row1=mysqli_fetch_array($sqli);
                $id=$row1['id'];
                $sql="SELECT * FROM addproduct where userid='$id'";
                $que=mysqli_query($conn, $sql);
                $rowcount=mysqli_num_rows($que);

                if (isset($_POST['sea'])) {
                    $search=$_POST['search'];
                    $s="SELECT * FROM addproduct WHERE userid='$id' AND sku='$search' LIMIT 1";
                    $sea=mysqli_query($conn, $s);
                    while($row=mysqli_fetch_array($sea)){
                    echo "</td><td>". $row["productname"] ."</td><td>". $row["quantity"] ."</td><td>". $row["rate"] ."</td><td>". $row["gst"] ."</td><td>". $row["brandname"] ."</td><td>". $row["color"] ."</td><td>". $row["status"] .
                        "</td><td>". $row["sku"] ."</td><td>".$row["description"]."</td>".'<td><a href="edit.php?id=' . $row["id"] . '"><button type="submit" name="edit" class="edit" ><img src="pencil.png"></button></a><a href="delete.php?id=' . $row["id"] . '"><button class="delete"><img src="trash.png"></button></a></td></tr>';
                    }
                }
                else {
                    for($i=1;$i<=$rowcount;$i++){
                        $row=mysqli_fetch_array($que);
                        echo "</td><td>". $row["productname"] ."</td><td>". $row["quantity"] ."</td><td>". $row["rate"] ."</td><td>". $row["gst"] ."</td><td>". $row["brandname"] ."</td><td>". $row["color"] ."</td><td>". $row["status"] .
                        "</td><td>". $row["sku"] ."</td><td>".$row["description"]."</td>".'<td><a href="edit.php?id=' . $row["id"] . '"><button type="submit" name="edit" class="edit" ><img src="pencil.png"></button></a><a href="delete.php?id=' . $row["id"] . '"><button class="delete"><img src="trash.png"></button></a></td></tr>';
                    }
                }

                if (isset($_GET['id'])) {
                    $id=$_GET['id'];
                    $rec=mysqli_query($conn, "SELECT * FROM addproduct where id=$id");
                    $record=mysqli_fetch_array($rec);
                    $pname=$record['productname'];
                    $quantity=$record['quantity'];
                    $rate=$record['rate'];
                    //$cbrand=$record['cbrand'];
                    $color=$record['color'];
                    $ram=$record['Ram'];
                    $internal=$record['Internal'];
                    $status=$record['status'];
                    $sku=$record['sku'];
                    $gst=$record['gst'];
                    $desc=$record['description'];
                    $image=$record['image'];
                    $img=base64_encode($image);
                    $id=$record['id'];
                }


                function test_input($data){
                    $data=trim($data);
                    $data=stripslashes($data);
                    $data=htmlspecialchars($data);
                    return $data;
                }
                function sessend(){
                    session_destroy();
                }
                $conn->close();
            ?>
        </table>
        </div>
        <br><br>

        <div class="main2">
            <div id="edit">
                <h2 style="text-align: center;">Edit Product Detail's</h2>
                <form class="form2" name="form2" method="post" enctype="multipart/form-data">
                Product Name:<br/><input type="text" name="pname" placeholder="Enter Product" value="<?php echo (isset($pname))?$pname:""?>" class="addp" required><br><br>
                Quantity:<br/><input type="number" name="quantity" placeholder="Enter Quantity" value="<?php echo $quantity?>" class="addp" required><br><br>
                Rate:<br/><input type="number" name="rate" placeholder="Enter Rate" value="<?php echo $rate?>" class="addp" required><br><br>
                GST Rate:<br><input type="number" name="gst" placeholder="Enter GST Amount" value="<?php echo $gst?>" class="addp" required><br><br>
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
                Color's Available:</br> <input type="text" name="color" placeholder="Enter Color" value="<?php echo (isset($color))?$color:""?>"  class="addp" required><br><br>
                Ram Size's available:<br> <input type="text" name="rams" placeholder="Enter Rams Size's available for Device..." value="<?php echo (isset($ram))?$ram:""?>" class="addp" required><br><br>
                Internal storage Size's available:<br> <input type="text" name="internals" placeholder="Enter Internal Size's available for Device..." value="<?php echo (isset($internal))?$internal:""?>" class="addp" required><br><br>
                Status:</br> <select class="addp" name="status" required>
                            <option value="">--SELECT--</option>
                            <option value="available">Available</option>
                            <option value="not-available">Not-Available</option>
                        </select><br><br>
                SKU Unit:<br><input type="text" name="sku" placeholder="Enter SKU number" value="<?php echo (isset($sku))?$sku:""?>" class="addp" required><br><br>
                Select Image:<br><input type="file" name="image" accept="image/*" value="<?php echo $_FILES['image']['name'];?>" class="addp" required /><br><br>
                Description:<br><textarea name="desc" rows="3" cols="25" class="addp" autocomplete="off" placeholder="Enter Specification's... " required><?php echo (isset($desc))?$desc:"";?></textarea><br><br>
                <button type="submit" name="submit" value="submit" class="addbt">Save Changes</button><br>
            </form>
        </div>
    </div>
    </body>
</html>
