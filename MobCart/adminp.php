<?php
    session_start();
    $conn=mysqli_connect('localhost','project','final_p@123','finalproject');
?>

 <!DOCTYPE html>
 <html lang="en" dir="ltr">
     <head>
         <meta charset="utf-8">
         <title>Admin Panel</title>
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
                  color: rgb(24, 24, 24);
                  padding-right: 200px;
                  width: 50%;
                  padding-top: 0px;
                  display: flex;

              }
              .bt{
                  background-color: rgb(29, 40, 68);
                  border: none;
                  cursor: pointer;
                  font-size: 20px;
                  color: #818181;
                  position: fixed;
                  border-radius: 10px;
                  left: 10px;
                  padding: 10px 20px;
                  text-align: center;
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
               .logoname{
                   font-family: 'Lobster';
                   background: -webkit-linear-gradient(#8E2DE2, #4A00E0);
                   -webkit-background-clip: text;
                   -webkit-text-fill-color: transparent;
                   font-size: 130px;
               }
               .totalvendor{
                   margin-top: 30px;
                   padding: 20px;
                   margin-left: 250px;
                   font-size: 25px;
                   border-radius: 10px;
                   box-sizing: border-box;
                   position: absolute;
                   transition: .7s;
                   color: White;
                   font-family:  'EB Garamond', serif;

               }
               .totalvendor:hover{
                   box-shadow: 1px 1px 20px rgb(37, 36, 36);
                   background-color:rgb(37, 37, 37);
               }

               .totaluser{
                   margin-top: 30px;
                   padding: 20px;
                   margin-left: 550px;
                   font-size: 25px;
                   border-radius: 10px;
                   box-sizing: border-box;
                   position: absolute;
                   transition: .7s;
                   color: White;
                   font-family:  'EB Garamond', serif;

               }
               .totaluser:hover{
                   box-shadow: 1px 1px 20px rgb(37, 36, 36);
                   background-color:rgb(37, 37, 37);
               }

               .totalp{
                   margin-top: 30px;
                   padding: 20px;
                   margin-left: 800px;
                   font-size: 25px;
                   border-radius: 10px;
                   box-sizing: border-box;
                   position: absolute;
                   transition: .7s;
                   color: White;
                   font-family:  'EB Garamond', serif;
               }
               .totalp:hover{
                   box-shadow: 1px 1px 20px rgb(37, 36, 36);
                   background-color:rgb(37, 37, 37);
               }
               .tpinbox{
                   margin-top: 30px;
                   padding: 20px;
                   margin-left: 1100px;
                   font-size: 25px;
                   border-radius: 10px;
                   box-sizing: border-box;
                   position: absolute;
                   transition: .7s;
                   color: white;
                   font-family:  'EB Garamond', serif;

               }
               .tpinbox:hover{
                   box-shadow: 1px 1px 30px rgb(37, 36, 36);
                   background-color:rgb(37, 37, 37);
               }
         </style>
     </head>
     <body>
         <div class="menu">

             <h1 style="color: #ffffff;font-family: 'Bellota';">MENU</h1><hr width="80%" noshade><br>
             <a href="adminp.php"><button type="button" name="ap" class="bt"> Home</button><br><br><br><br></a>
             <a href="adminv.php"><button type="button" name="ap" class="bt"> View Vendor's </button><br><br><br><br></a>
             <a href="adminvp.php"><button type="button" name="epd" class="bt"> View Product's</button><br><br><br><br></a>
             <a href="admino.php"><button type="button" name="vap" class="bt"> View Order's</button><br><br><br><br></a>
             <a href="feedback.php"><button type="button" name="vap" class="bt"> FeedBack's</button><br><br><br><br></a>
             <a href="loginpage.php"><button type="button" name="button" class="bt"> Logout</button></a>
         </div>
         <div class="topnav">
             <center><h1 class="logoname">MobCarT</h1></center><hr width="75%" noshade>
             <center><b><?php if(isset($_SESSION['admin']))  echo "WELCOME ".$_SESSION['admin']?></b></center>
         </div>
         <div class="main">
             <div class="totalvendor">
                 <?php
                    $totalvendo=mysqli_query($conn,"SELECT email FROM vendorregis ");
                    $totalv=mysqli_num_rows($totalvendo);
                    echo "Total Vendor's: ". $totalv;
                  ?>
             </div>

             <div class="totaluser">
                 <?php
                    $totaluser=mysqli_query($conn,"SELECT email FROM register ");
                    $totalu=mysqli_num_rows($totaluser);
                    echo "Total User's: ". $totalu;
                  ?>
             </div>

             <div class="totalp">
                 <?php
                    $que1=mysqli_query($conn, "SELECT userid FROM addproduct ");
                    $data=mysqli_num_rows($que1);
                    echo "Total Product's: " . $data;
                ?>
             </div>

             <div class="tpinbox">
                 <?php
                     $tpinbox="select * from orders ";
                     $tpinb=mysqli_query($conn, $tpinbox) or die(mysqli_error($conn));
                     $tpib=mysqli_num_rows($tpinb);
                     echo "Order's in Inbox: " . $tpib;
                  ?>
             </div>
         </div>
     </body>
 </html>
