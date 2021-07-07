<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Vendor Login</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style media="screen">
        body{
            //background-color: #81f5ff;
        }
        .login {
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
        .login:hover{
            box-shadow: 1px 1px 20px #000000;
        }

        .button {
            background-color: #1976D2;
            text-decoration: none;
            border: none;
            padding: 10px 10px;
            margin: 10px 10px;
            color: white;
            border-radius: 10px;
            cursor: pointer;
            transition: .5s;
        }
        .button:hover{
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

        a {
            text-decoration: none;
            color: #1976D2;
        }
        .error{
            color: RED;
            font-size: 20px;
        }
        .icon{
            color: dodgerblue;
        }
        @media only screen and (max-width: 1000px) {
            .login{
                width: 50%;
            }
        }
    </style>
</head>

<body>
    <br />
    <br />
    <br />
    <form name="myform" method="POST">
        <center><div align="center" class="login">
            <?php
                session_start();
                $timezone=date_default_timezone_set("Asia/Kolkata");
                $email=$pass=$err="";
                if($_SERVER["REQUEST_METHOD"]=="POST"){
                if(isset($_POST['submit'])){
                    $email=test_input($_POST["uname"]);
                    $pass=test_input($_POST["upass"]);

                    $conn=mysqli_connect('localhost','project','final_p@123','finalproject');
                    if(mysqli_connect_error()){
                        echo "Connection error".mysqli_connect_error();
                    }
                    $sql="SELECT Email, Password FROM vendorregis WHERE Email='{$email}' AND Password='{$pass}'";
                    $check=mysqli_query($conn,$sql) or die(mysqli_error($conn));
                    if(mysqli_num_rows($check)==true){
                        $_SESSION['user']=$email;
                        $cdate=date("y-m-d h:i:s");
                        $lastlog="UPDATE vendorregis SET lastlogin='$cdate' WHERE Email='$email'";

                        header("location:activity.php");
                    }
                    else{
                        $err= "In-correct Email or password";
                    }
            }
        }
                function test_input($data){
                    $data=trim($data);
                    $data=stripslashes($data);
                    $data=htmlspecialchars($data);
                    //$data=mysqli_real_escape_string($conn, $_POST['$data']);
                    return $data;
                }
            ?>
            <br>
            <b>
                <h1 align="center">Vendor Login</h1>
                    <br>
                    <b>
                        <h2 align="center">E-mail Id
                    </b><br>
                    <i class="fa fa-envelope icon"></i><input type="text" name="uname" placeholder="Enter E-mail/username" value="<?php echo $email?>" required /></h2>
                    <b>
                        <h2 align="center">Password
                    </b><br>
                    <i class="fa fa-key icon"></i><input type="password" name="upass" placeholder="Enter Password" value="<?php echo $pass?>" required/><span class="error"><br><?php echo $err?></span>
                    <br /><br />
                    <button name="submit" type="submit" value="Submit" class="button">Submit</button></h2></a>
                    <br />
                    <p align="center">Did You <a href="Forgetp.php">Forget Your Passsword ? </a></p>
                    <p align="center"><a href="venderreg.php">Create New Account</a></p>
                    <br>
        </div></center>
    </form>
</body>
</html>
