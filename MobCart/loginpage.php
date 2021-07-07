<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Login Page</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style media="screen">
        .login {
            box-sizing: border-box;
            background-color: #08AEEA;
            background-image: linear-gradient(to bottom, #08AEEA 0%, #2AF598 50%, #00ff99 100%);
            text-decoration: none;
            border-radius: 20px;
            text-align: center;
            width: 50%;
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
        @media only screen and (min-width: 768px) {
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
                $email=$pass=$err="";
                if($_SERVER["REQUEST_METHOD"]=="POST"){
                if(isset($_POST['submit'])){
                    $email=test_input($_POST["uname"]);
                    $pass=test_input($_POST["upass"]);
                    $conn=mysqli_connect('localhost','project','final_p@123','finalproject');
                    if(mysqli_connect_error()){
                        echo "Connection error".mysqli_connect_error();
                    }

                    $sql="SELECT name,email, password FROM register WHERE email='{$email}' AND password='{$pass}'";
                    $check=mysqli_query($conn,$sql) or die(mysqli_error($conn));
                    $row=mysqli_num_rows($check);
                    $row1=mysqli_fetch_array($check);
                    if( mysqli_num_rows($check)== true){
                        $_SESSION['userc']=$email;
                        header("Location:uhome.php");
                    }
                    else{
                        $err= "In-correct Email or password";
                    }
                    if ($row1['email']=="admin@123.com" && $row1['password']=="admin123") {
                        $_SESSION['admin']=$row1['email'];
                        header("Location:adminp.php");
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
                <h1 align="center">Login</h2>
                    <br>
                    <b>
                        <h2 align="center">E-mail Id
                    </b><br>
                    <i class="fa fa-envelope icon"></i><input type="text" name="uname" placeholder="Enter E-mail/username" value="<?php echo $email?>" required/></h2>
                    <b>
                        <h2 align="center">Password
                    </b><br>
                    <i class="fa fa-key icon"></i><input type="password" name="upass" placeholder="Enter Password" value="<?php echo $pass?>" required/><span class="error"><br><?php echo $err?></span>
                    <br /><br />
                    <button name="submit" type="submit" value="Submit" class="button">Submit</button></h2></a>
                    <br />
                    <p align="center">Did You <a href="ForgetPassword.html">Forget Your Passsword? </a></p>
                    <p align="center"><a href="NewAccount.php">Create New Account</a></p>
                    <br>
        </div></center>
    </form>
</body>

</html>
