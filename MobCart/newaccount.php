<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Create New Account</title>
	<style media="screen">
		a {
			text-decoration: none;
			color: white;
		}

		.error {
			color: #ff0000;
		}

		.h {
			padding: 0;
			margin: 0;
		}

		* {
			margin-top: 0px;

		}

		.regis {
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
		.regis:hover{
            box-shadow: 1px 1px 20px #000000;
        }

		input[type=text],
		input[type=password] {

			display: inline-block;
			background-color: rgb(203, 202, 202);
			border: none;
			border-radius: 20px;
			padding: 10px;
		}

		input[type=text]:hover,
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
		@media only screen and (max-width: 768px){
			.regis{

			}
		}
	</style>
</head>

<center><body>
	<h1 align="center"> Create a New Account</h1>
		<form method="POST" name="myform">
			<div align="center" class="regis">
				<?php
			$errors=false;
			$name=$uid=$pass=$cpass=$contact="";
			$nameerr=$uiderr=$passerr=$match=$conerr="";
			if($_SERVER["REQUEST_METHOD"]=="POST"){
				if(isset($_POST['submit'])){
			$name=test_input($_POST["name"]);
			$uid=test_input($_POST["uid"]);
			$pass=test_input($_POST["password"]);
			$cpass=test_input($_POST["cpassword"]);
			$contact=test_input($_POST["contact"]);
			if(!preg_match("/^[a-zA-Z ]*$/",$name)){
			$nameerr="*Only letters and white space allowed!";
			$errors=true;
			}
			if(!filter_var($uid, FILTER_VALIDATE_EMAIL)){
			$uiderr="*Invalid E-mail Format!";
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
				$match="*Enter correct password!";
				$errors=true;
			}
			if(!preg_match("/^[0-9]{10}+$/",$contact)){
				$conerr="*Invalid Mobile number!";
				$errors=true;
			}
			$conn=mysqli_connect('localhost','project','final_p@123','finalproject');
			$cemail="SELECT * FROM register WHERE email='{$uid}'";
			$checkemail=mysqli_query($conn, $cemail) or die(mysqli_error($conn));
			if(mysqli_num_rows($checkemail)>0){
				$uiderr= "E-mail Already Taken";
				$errors=true;
			}
			if(!$errors){
			$name = mysqli_real_escape_string($conn, $_POST["name"]);
			$uid=mysqli_real_escape_string($conn, $_POST["uid"]);
			$pass=mysqli_real_escape_string($conn, $_POST["password"]);
			$cpass=mysqli_real_escape_string($conn, $_POST["cpassword"]);
			$contact=mysqli_real_escape_string($conn, $_POST["contact"]);

			$sql="INSERT INTO register(name,email,password,cpassword,mobileno) VALUES('$name','$uid','$pass','$cpass','$contact')";

			if(mysqli_query($conn, $sql)){
				//echo"You have been successfully registered!!";
				header("Location:loginpage.php");
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
				<p>
					<b>
						<h1 align="center" class="h">Name<br>
					</b> <input type="text" name="name" placeholder="Enter name" value="<?php echo $name?>" required>
					<h4><span class="error"><br><?php echo $nameerr?></span></h4>
					</h1>
					<b>
						<h1 align="center" class="h">E-mail id<br>
					</b> <input type="text" name="uid" placeholder="Enter E-mail id" value="<?php echo $uid?>" required>
					<h4><span class="error"><br><?php echo $uiderr;?></span></h4>
				</h1>
					<b>
						<h1 align="center" class="h">Password<br>
					</b> <input type="password" name="password" placeholder="Enter Password" value="<?php echo $pass?>" required>
					<h4><span class="error"><br><?php echo $passerr;?></span></h4>
				</h1>
					<b>
						<h1 align="center" class="h">Confirm password<br>
					</b> <input type="password" align="right" name="cpassword" placeholder="confirm password" value="<?php echo $cpass?>" required>
					<h4><span class="error"><br><?php echo $match;?></span></h4>
				</h1>
					<b>
						<h1 align="center" class="h">Mobile Number<br>
					</b><input type="text" name="contact" placeholder="Enter contact" value="<?php echo $contact?>" required>
					<h4><span class="error"><br><?php echo $conerr;?></span></h4>
				</h1>

					<button type="submit" value="Register" class="button" name="submit">Register</button>
					<h4 class="h">Already Have an Account?</h4>
					<a href="loginpage.php"><button type="button" value="Login" class="button"> Login</button></a>
			</div>
		</form>
</body></center>

</html>
