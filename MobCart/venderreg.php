<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Vender Registeration</title>
    <style media="screen">
        .h {
            padding: 20px;
            margin: 10px;
        }

        .vreg {
            box-sizing: border-box;
            background-color: #08AEEA;
            background-image: linear-gradient(to bottom, #08AEEA 0%, #2AF598 50%, #00ff99 100%);
            text-decoration: none;
            border-radius: 20px;
            text-align: center;
            width: 50%;
            align-items: center;
            transition: .5s;

        }
        .vreg:hover{
            box-shadow: 1px 1px 20px #000000;
        }

        input[type=text],
        input[type=textarea],
        input[type=select],
        input[type=tel],
        input[type=password] {
            display: inline-block;
            background-color: rgb(203, 202, 202);
            border: none;
            border-radius: 20px;
            padding: 10px;
        }

        input[type=text]:hover,
        input[type=tel]:hover,
        input[type=textarea]:hover,
        input[type=select]:hover,
        input[type=password]:hover {
            background-color: #ddd;
            outline: none;
        }

        .button {
            background-color: #1976D2;
            text-decoration: none;
            border: none;
            padding: 10px 10px;
            margin: 10px 10px;
            color: white;
            border-radius: 10px;
        }

        .select {
            background-color: rgb(203, 202, 202);
            border-radius: 10px;
            padding: 5px 5px;
            font-size: 15px;
        }
        .error {
			color: #ff0000;
            font-size: 15px;
		}
        @media only screen and (min-width: 768px) {
            .login{
                width: 55%;
            }
        }
    </style>
</head>

<center><body align="center">
    <h1>Vendor Registration</h1>
    <form name="myform" method="POST">
        <div class="vreg">
            <?php
                    $company=$comptype=$compstat=$gstno=$country=$state=$city=$address=$website=$pass=$cpass=$mobile=$cperson=$dperson="";
                    $cerr=$cityerr=$weberr=$passerr=$cpasserr=$moberr=$adderr=$cperr=$dperr=$gsterr="";
                    $errors=false;
                    if($_SERVER["REQUEST_METHOD"]=="POST"){
        				if(isset($_POST['submit'])){
                            $company=test_input($_POST["company"]);
                            $comptype=test_input($_POST["comptype"]);
                            $compstat=test_input($_POST["compstat"]);
                            $gstno=test_input($_POST["gstno"]);
                            $country=test_input($_POST["country"]);
                            $state=test_input($_POST["state"]);
                            $city=test_input($_POST["city"]);
                            $address=test_input($_POST["address"]);
                            $website=test_input($_POST["website"]);
                            $pass=test_input($_POST["pass"]);
                            $cpass=test_input($_POST["cpass"]);
                            $mobile=test_input($_POST["mobile"]);
                            $cperson=test_input($_POST["cperson"]);
                            $dperson=test_input($_POST["dperson"]);
                            if(!preg_match("/^[a-zA-Z ]*$/",$company)){
                			$cerr="*Only letters and white space allowed!";
                            }
                            if(!preg_match("/^[a-zA-Z ]*$/",$city)){
                			    $cityerr="*Only letters!";
                                $errors=true;
                            }
                            if(!preg_match("/^([0-5]){2}([a-zA-Z]){5}([0-9]){4}([a-zA-Z]){1}([a-zA-Z0-9]){1}([a-zA-Z]){1}([0-9]){1}?$/", $gstno)) {
                                $gsterr = "*Invalid GST number";
                                $errors=true;
                            }
                            if(!filter_var($website, FILTER_VALIDATE_EMAIL)){
                                $weberr="*Invalid E-mail format!";
                                $errors=true;
                            }
                            if(strlen($pass) <= 5){
                                $passerr="*Password should be atleast 6 characters!";
                                $errors=true;
                            }
                            elseif(!preg_match("/[0-9]/",$pass)){
                                $passerr="*Password must contain atleast 1 number!";
                                $errors=true;
                            }
                            if($pass==$cpass){

                			}
                			else{
                				$cpasserr="*Enter correct password!";
                                $errors=true;
                            }
                            if(!preg_match("/^[0-9]{10}+$/",$mobile)){
                				$moberr="*Invalid Mobile number!";
                                $errors=true;
                            }
                            if(isset($_POST["address"])){
                                $adderr= $address;
                            }
                            if(preg_match("/[0-9]/",$cperson)){
                                $cperr="*Only letters allowed!";
                                $errors=true;
                            }
                            if(preg_match("/[0-9]/",$dperson)){
                                $dperr="*Only letters allowed!";
                                $errors=true;
                            }
                            $conn=mysqli_connect('localhost','project','final_p@123','finalproject');
                            $cemail="SELECT * FROM vendorregis WHERE Email='{$website}'";
                			$checkemail=mysqli_query($conn, $cemail) or die(mysqli_error($conn));
                			if(mysqli_num_rows($checkemail)>0){
                				$weberr= "E-mail Already Taken";
                				$errors=true;
                			}
                            if(!$errors){
                                $company=mysqli_real_escape_string($conn, $_POST["company"]);
                                $comptype=mysqli_real_escape_string($conn, $_POST["comptype"]);
                                $compstat=mysqli_real_escape_string($conn, $_POST["compstat"]);
                                $gstno=mysqli_real_escape_string($conn, $_POST["gstno"]);
                                $country=mysqli_real_escape_string($conn, $_POST["country"]);
                                $state=mysqli_real_escape_string($conn, $_POST["state"]);
                                $city=mysqli_real_escape_string($conn, $_POST["city"]);
                                $address=mysqli_real_escape_string($conn, $_POST["address"]);
                                $website=mysqli_real_escape_string($conn, $_POST["website"]);
                                $pass=mysqli_real_escape_string($conn, $_POST["pass"]);
                                $cpass=mysqli_real_escape_string($conn, $_POST["cpass"]);
                                $mobile=mysqli_real_escape_string($conn, $_POST["mobile"]);
                                $cperson=mysqli_real_escape_string($conn, $_POST["cperson"]);
                                $dperson=mysqli_real_escape_string($conn, $_POST["dperson"]);

                                $sql="INSERT INTO vendorregis(ShopName,ShopType,ShopStatus,Gstno,Country,State,City,Address,Email,Password,Cpassword,Contact,Contactpersonname,Contactpersondesignation) VALUES('$company','$comptype','$compstat','$gstno','$country','$state','$city','$address','$website','$pass','$cpass','$mobile','$cperson','$dperson')";
                                if(mysqli_query($conn, $sql)){
                    				//echo"You have been successfully registered!!";
                    				header("Location:vendorlogin.php");
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
            <h1 class="h">Name of Shop <br> <input type="text" name="company" placeholder="Enter Company Name" value="<?php echo $company?>" autocomplete="off" required /><br> <span class="error"><?php echo $cerr?></span> </h1>
            <h1 class="h">Type of Shop <br> <select required class="select" name="comptype" value="<?php echo $comptype?>"></h1>
            <option value="">--Select--</option>
            <option value="public">PublicLimitedCo</option>
            <option value="partner">ParternshipCo</option>
            <option value="proprietorship">Proprietorship</option>
            <option value="gov">Govit.Sector</option>
            </select><br>
            <h1 class="h">Status of Shop <br> <select class="select" name="compstat" value="<?php echo $compstat?>" required></h1>
            <option value="">--Select--</option>
            <option value="manu">Manufacturer</option>
            <option value="authodealer">AuthorisedDealer</option>
            <option value="trader">Trader</option>
            <option value="servicepro">ServiceProvider</option>
            </select><br>
            <h1 class="h"> GST No. <br> <input type="text" name="gstno" placeholder="Enter your GST No." value="<?php echo $gstno?>" autocomplete="off" required><br><span class="error"><?php echo $gsterr?></span></h1>
            <h1 class="h">Country <br> <input type="text" name="country" value="INDIA" autocomplete="off" readonly><br></h1>
            <h1 class="h">State <br> <input type="text" name="state" value="Maharashtra" autocomplete="off" readonly><br></h1>
            <h1 class="h">City <br> <input type="text" name="city" placeholder="Enter your City" value="<?php echo $city?>" autocomplete="off" required><br> <span class="error"><?php echo $cityerr?></span></h1>
            <h1 class="h">Address <br> <textarea name="address" rows="3" cols="25" class="select" value="<?php echo $adderr?>" autocomplete="off" required></textarea><br></h1>
            <h1 class="h">E-mail/Username <br> <input type="text" name="website" placeholder="Enter your E-mail" value="<?php echo $website?>" autocomplete="off" required><br> <span class="error"><?php echo $weberr?></span></h1>
            <h1 class="h">Password <br> <input type="password" name="pass" placeholder="Enter Password" value="<?php echo $pass?>" autocomplete="off" required><br> <span class="error"><?php echo $passerr?></span></h1>
            <h1 class="h">Confirm Password <br> <input type="password" name="cpass" placeholder="Re-enter Password" value="<?php echo $cpass?>" autocomplete="off" required><br> <span class="error"><?php echo $cpasserr?></span></h1>
            <h1 class="h">Mobile <br> <input type="tel" name="mobile" placeholder="Enter your mobile" value="<?php echo $mobile?>" autocomplete="off" required><br> <span class="error"><?php echo $moberr?></span></h1>
            <h1 class="h">Name of contact person <br> <input type="text" name="cperson" placeholder="Enter Contact person's Name" value="<?php echo $cperson?>" autocomplete="off" required><br><span class="error"><?php echo $cperr?></span></h1>
            <h1 class="h">Designation of Contact person <br><input type="text" name="dperson" placeholder="Enter Designation of person" value="<?php echo $dperson?>" autocomplete="off" required><br><span class="error"><?php echo $dperr?></span></h1>
            <button type="submit" name="submit" class="button" value="Register">Register</button>
            <h4 class="h">Already Have an Account?</h4>
            <a href="vendorlogin.php"><button type="button" value="Login" class="button"> Login</button></a>
        </div>
    </form>
</body></center>
</html>
