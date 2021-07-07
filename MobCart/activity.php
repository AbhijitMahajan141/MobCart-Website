<?php
    session_start();
    $conn=mysqli_connect('localhost','project','final_p@123','finalproject');
    $user=$_SESSION['user'];
    $query="Select * from vendorregis where Email='$user'";
    $sqli=mysqli_query($conn, $query);
    $row=mysqli_fetch_array($sqli);
    $id=$row['id'];
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        if(isset($_POST['save'])){
            $shopn=test_input($_POST["ShopName"]);
            $shopt=test_input($_POST["ShopType"]);
            $shops=test_input($_POST["ShopStatus"]);
            $gstno=test_input($_POST["Gstno"]);
            $country=test_input($_POST["Country"]);
            $state=test_input($_POST["State"]);
            $city=test_input($_POST["City"]);
            $address=test_input($_POST["Address"]);
            $email=test_input($_POST["Email"]);
            $contact=test_input($_POST["Contact"]);
            $conpn=test_input($_POST["Contactpersonname"]);
            $conpd=test_input($_POST["Contactpersondesignation"]);
            //$idd=$_GET['id'];
            $q="update vendorregis set ShopName='$shopn',ShopType='$shopt',ShopStatus='$shops',Gstno='$gstno',Country='$country',State='$state',City='$city',Address='$address',Email='$email',Contact='$contact',Contactpersonname='$conpn',Contactpersondesignation='$conpd' WHERE id='$id'";
            $qu=mysqli_query($conn, $q);
        }
    }


 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Home page</title>
        <style media="screen">
        @import url('https://fonts.googleapis.com/css?family=EB+Garamond|Bellota|Lobster|Slabo+27px&display=swap');
            body{
                overflow: auto;
                background:#9dd5fa;
            }
            #menu{
                width: 200px;
                top: 0;
                left: 0;
                position: fixed;
                background-color: rgb(29, 40, 68);
                padding-left: 10px;
                color: #373737;
                height: 100%;
                text-align: center;
                box-shadow: 5px 10px 10px rgb(0, 0, 0);
                display: block;
            }
            .main{
                padding-left: 450px;
                color: rgb(24, 24, 24);
                padding-right: 200px;
                width: 50%;
                padding-top: 0px;
            }
            .bt{
                background-color: rgb(29, 40, 68);
                border: none;
                cursor: pointer;
                font-size: 20px;
                color: #ffffff;
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
                background: linear-gradient(#8E2DE2, #4A00E0);
                //background: linear-gradient(to right, #7f7fd5, #86a8e7, #91eae4);
                //background: linear-gradient(to left, #11998e, #38ef7d);
                box-shadow: 1px 1px 30px rgb(106, 106, 106);
                color: rgb(255, 255, 255);
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
             #topnav{
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
            // .items{
                // flex: 1;
                // flex-flow: row;
            //     display: flex;
            //     flex-direction: row;
            // }
             .totalp{
                 margin-top: 30px;
                 padding: 20px;
                 margin-left: 250px;
                // margin-right: 0px;
                 font-size: 25px;
                 border-radius: 10px;
                 //background-color: rgb(41, 53, 103);
                 box-sizing: border-box;
                 position: absolute;
                 //align-self: flex-end;
                 transition: .7s;
                 color: White;
                 font-family:  'EB Garamond', serif;
             }
             .totalp:hover{
                 box-shadow: 1px 1px 20px rgb(37, 36, 36);
                 background-color:rgb(37, 37, 37);
             }
             .profile{
                 padding-left: 470px;
                 padding-top: 150px;
                 box-sizing: border-box;
                 //border-radius: 10px;
                // align-self: flex-start;
                font-family:  'EB Garamond', serif;
             }
             table,th,tr{
                 color: rgb(65, 65, 65);
                 //border: 2px solid #a8a8a8;
                 border: none;
                 border-collapse: collapse;
                 transition: .7s;
                 background-color: white;
                 text-align: center;
                 width: 600px;
             }
             th{
                 background-image: linear-gradient(to bottom,#48c6ef  0%, #6f86d6 100%);
                 color: rgb(255, 255, 255);
                 font-size: 40px;
             }
             table:hover{
                 box-shadow: 1px 1px 30px rgb(80, 80, 80);
             }
             th,td{
                  border-bottom: 1px solid #ddd;
             }
             td{
                 font-size: 20px;
                 transition: .5s;
             }
             td:hover{
                 width: 600px;
                 font-size: 35px;
             }
             .edit{
                 background-color: rgb(240, 207, 68);
                 border: none;
                 padding: 15px 15px;;
                 border-radius: 10px;
                 cursor: pointer;
                 transition: .9s;
             }
             .edit:hover{
                 box-shadow: 1px 1px 30px rgb(80, 80, 80);
                 color: rgb(56, 56, 56);
             }
             .forma{
                 padding-left: 450px;
                 color: rgb(24, 24, 24);
                 padding-right: 200px;
                 width: 50%;
                 padding-top: 50px;
                 padding-bottom: 10px;
                 font-family:  'EB Garamond', serif;
             }
             .form{
                 box-sizing: border-box;
                 text-align: center;
                 border-radius: 10px;
                 font-size: 25px;
                 padding-top: 10px;
                 padding-bottom: 5px;
                 transition: .7s;
             }
             .form:hover{
                  box-shadow: 1px 1px 20px rgb(0, 0, 0);
             }
             label{
                 width:300px;
                 clear:left;
                 text-align:right;
                 padding-right:10px;
             }
             input,label{
                 float:left;
             }
             input{
                 border: none;
                 border-radius: 10px;
                 padding: 5px;
                 border: 0.5px solid;
             }
             .addbt{
                 padding: 15px 15px;
                 border: none;
                 border-radius: 10px;
                 transition: .9s;
                 font-family:  'EB Garamond', serif;
                 font-size: 20px;
             }
             .addbt:hover{
                 background: linear-gradient(to left, #11998e, #38ef7d);
                 cursor: pointer;
                 box-shadow: 1px 1px 20px 3px gray;
                 color: white;
             }
             .edtbtn{
                 width: 600px;
             }
             .lastlog{
                 margin-top: 30px;
                 padding: 20px;
                 margin-left: 625px;
                 //margin-right: 0px;
                 font-size: 21px;
                 border-radius: 10px;
                 //background-color: rgb(198, 212, 89);
                 box-sizing: border-box;
                 position: absolute;
                 align-self: flex-end;
                 transition: .7s;
                 color: white;
                 font-family:  'EB Garamond', serif;
             }
             .lastlog:hover{
                 box-shadow: 1px 1px 30px rgb(37, 36, 36);
                 background-color:rgb(37, 37, 37);
             }
             .tpinbox{
                 margin-top: 30px;
                 padding: 20px;
                 margin-left: 1000px;
                 //margin-right: 0px;
                 font-size: 21px;
                 border-radius: 10px;
                 //background-color: rgb(198, 212, 89);
                 box-sizing: border-box;
                 position: absolute;
                 align-self: flex-end;
                 transition: .7s;
                 color: white;
                 font-family:  'EB Garamond', serif;
             }
             .tpinbox:hover{
                 box-shadow: 1px 1px 30px rgb(37, 36, 36);
                 background-color:rgb(37, 37, 37);
             }
             .logoname{
                 font-family: 'Lobster';
                 background: -webkit-linear-gradient(#8E2DE2, #4A00E0);
                 -webkit-background-clip: text;
                 -webkit-text-fill-color: transparent;
                 font-size: 40px;
             }
             .togbtn{
                 border-radius: 10px;
                 border:none;
                 background-color: rgb(217, 195, 81);
                 cursor: pointer;
                 transition: .5s;
                 padding: 7px 7px;
             }
             .togbtn:hover{
                 box-shadow: 1px 1px 10px rgb(37, 36, 36);
                 padding: 10px 10px;
             }
             @media only screen and (max-width: 968px) {
                 body{
                     overflow-x: hidden;
                 }
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
                 .topnav{
                     padding-left: 200px;
                 }
                 .totalp{
                     margin-left: 400px;
                     //padding-left: 0px;
                 }
                 .profile{
                     padding-left: 200px;
                 }
                 .totalp{
                     margin-top: 100px;
                     margin-left: 300px;
                 }
                 .forma{
                     padding-left: 250px;
                     padding-top: 150px;
                 }
                 input,label{
                     float: none;
                 }
             }
             </style>
    </head>
    <body>

    <div id="menu">
        <b><h1 class="logoname">MobCarT</h1></b><hr width="75%" noshade>
        <h1 style="color: #ffffff;font-family: 'Bellota';">MENU</h1>
        <a href="activity.php"><button type="button" name="ap" class="bt"> <img src="calendar.png" alt=""> Home</button><br><br><br></a>
        <a href="add.php"><button type="button" name="ap" class="bt"> <img src="addfile.png" alt=""> Add Product</button><br><br><br></a>
        <a href="edit.php"><button type="button" name="epd" class="bt"> <img src="pencil.png" alt=""> Edit Product</button><br><br><br></a>
        <a href="view.php"><button type="button" name="vap" class="bt"> <img src="visibility.png" alt=""> View product</button><br><br><br><br><br><br><br><br><br></a>
        <a href="inbox.php"><button type="button" name="button" class="bt"> <img src="inbox.png" alt=""> Inbox</button><br><br><br></a>
        <a href="vendorlogin.php"><button type="button" name="button" class="bt"> <img src="logout.png" alt="LogOut"> Logout</button></a>
    </div>
    <div id="topnav">
        <button type="button" name="togmenu" class="togbtn" onclick="togbtn()"> <img src="burger.png" alt=""> </button>
        <b><?php echo "Welcome ".$_SESSION['user']?></b>
        <button type="button" name="button" class="user"><img src="user.png" alt="wheel"></button>
    </div>
    <div class="hr"><hr width="50%" noshade></div>
<div class="items">
    <div class="totalp">
    <?php
        //$que=mysqli_query($conn, "SELECT id FROM vendorregis");
        $que1=mysqli_query($conn, "SELECT userid FROM addproduct WHERE userid='$id'");
        $data=mysqli_num_rows($que1);
        echo "Total Product's Added: " . $data;
    ?>
    </div>
    <div class="lastlog">
        <?php
            //$lt= date("y-m-d h:i:s");
            $llq="select lastlogin from vendorregis where Email='{$_SESSION['user']}' ";
            $llr=mysqli_query($conn, $llq);
            //$sess=$_SESSION['lastlog'];
            $lla=mysqli_fetch_array($llr);
            $timed=strtotime($lla['lastlogin']);
            echo "Last Login: " . date("y-m-d h:i:s",$timed);
         ?>
    </div>
    <div class="tpinbox">
        <?php
            $tpinbox="select * from orders where vendorid='{$id}' ";
            $tpinb=mysqli_query($conn, $tpinbox) or die(mysqli_error($conn));
            $tpib=mysqli_num_rows($tpinb);
            echo "Order's in Inbox: " . $tpib;
         ?>
    </div>
    <div class="profile">
        <table cellspacing="10px" cellpadding="5px" border="1">
            <th>Your Profile </th>
        <?php
            $rdata=mysqli_query($conn,"SELECT id,ShopName,ShopType,ShopStatus,Gstno,Country,State,City,Address,Email,Contact,Contactpersonname,Contactpersondesignation FROM vendorregis WHERE id='$id'");
            $rc=mysqli_num_rows($rdata);
            for($i=1;$i<=$rc;$i++){
                $arr=mysqli_fetch_array($rdata);
                echo "<tr><td><b>ShopName:<br></b>  ".$arr['ShopName']."</td></tr>";
                echo "<tr><td><b>ShopType:<br></b>  ".$arr['ShopType']."</td></tr>";
                echo "<tr><td><b>ShopStatus:<br></b>  ".$arr['ShopStatus']."</td></tr>";
                echo "<tr><td><b>Gstno:<br></b>  ".$arr['Gstno']."</td></tr>";
                echo "<tr><td><b>Country:<br></b>  ".$arr['Country']."</td></tr>";
                echo "<tr><td><b>State:<br></b>  ".$arr['State']."</td></tr>";
                echo "<tr><td><b>City:<br></b>  ".$arr['City']."</td></tr>";
                echo "<tr><td><b>Address:<br></b>  ".$arr['Address']."</td></tr>";
                echo "<tr><td><b>Email:<br></b>  ".$arr['Email']."</td></tr>";
                echo "<tr><td><b>Contact:<br></b>  ".$arr['Contact']."</td></tr>";
                echo "<tr><td><b>Contact person Name:<br></b>  ".$arr['Contactpersonname']."</td></tr>";
                echo "<tr><td><b>Contact person Designation:<br></b>  ".$arr['Contactpersondesignation']."</td></tr>";
                echo '<tr><td><a href="activity.php?id=' . $arr["id"] . '"><button type="submit" name="edit" class="edit" onclick="dis()"><img src="pencil.png"> Edit Profile </button></a></td></tr>';
            }
            if (isset($_GET['id'])) {
                $id=$_GET['id'];
                $cdata=mysqli_query($conn,"SELECT ShopName,ShopType,ShopStatus,Gstno,Country,State,City,Address,Email,Contact,Contactpersonname,Contactpersondesignation FROM vendorregis WHERE id='$id'");
                $cd=mysqli_fetch_array($cdata);
                $sn=$cd['ShopName'];
                $st=$cd['ShopType'];
                $ss=$cd['ShopStatus'];
                $gs=$cd['Gstno'];
                $co=$cd['Country'];
                $sta=$cd['State'];
                $ci=$cd['City'];
                $addr=$cd['Address'];
                $em=$cd['Email'];
                $cont=$cd['Contact'];
                $cpn=$cd['Contactpersonname'];
                $cpd=$cd['Contactpersondesignation'];
            }


            function test_input($data){
                $data=trim($data);
                $data=stripslashes($data);
                $data=htmlspecialchars($data);
                return $data;
            }
         ?>
         </table>
    </div>

    </div>

    <div class="forma">
        <form class="form" action="activity.php" method="post">
            <h3>Edit Profile</h3>
            <hr width="50%" noshade>
            <label>ShopName:</label><input type="text" name="ShopName" value="<?php echo (isset($sn))?$sn:""?>" required id="dis" ><br>
            <label>ShopType:</label><input type="text" name="ShopType" value="<?php echo (isset($st))?$st:""?>" required id="dis" ><br>
            <label>ShopStatus:</label><input type="text" name="ShopStatus" value="<?php echo (isset($ss))?$ss:""?>" required><br>
            <label>Gstno:</label><input type="text" name="Gstno" value="<?php echo (isset($gs))?$gs:""?>" required><br>
            <label>Country:</label><input type="text" name="Country" value="<?php echo (isset($co))?$co:""?>" required><br>
            <label>State:</label><input type="text" name="State" value="<?php echo (isset($sta))?$sta:""?>" required><br>
            <label>City:</label><input type="text" name="City" value="<?php echo (isset($ci))?$ci:""?>" required><br>
            <label>Address:</label><input type="text" name="Address" value="<?php echo (isset($addr))?$addr:""?>" required><br>
            <label>Email:</label><input type="text" name="Email" value="<?php echo (isset($em))?$em:""?>" required><br>
            <label>Contact:</label><input type="tel" name="Contact" value="<?php echo (isset($cont))?$cont:""?>" required><br>
            <label>Contact person Name:</label><input type="text" name="Contactpersonname" value="<?php echo (isset($cpn))?$cpn:""?>" required><br>
            <label>Contact person Designation:</label><input type="text" name="Contactpersondesignation" value="<?php echo (isset($cpd))?$cpd:""?>" required><br>
            <hr width="50%" noshade>
            <button type="submit" name="save" value="submit" class="addbt">Save Changes</button><br>
        </form>
        <!--<script type="text/javascript">
            function dis(){
                if(document.getElementById('dis').disabled==true){
                    document.getElementById('dis').disabled= false;
                }
            }
        </script>-->
        <script type="text/javascript">
            x=document.getElementById('menu');
            function togbtn(){
                if (x.style.display === "none") {
                    x.style.display = "block";
                }
                else {
                    x.style.display = "none";

                }
            }
        </script>
    </div>
    </body>
</html>
