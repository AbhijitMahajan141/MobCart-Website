<?php
    session_start();
    $conn=mysqli_connect('localhost','project','final_p@123','finalproject');
    //if (isset($_GET['id'])) {
        //$id=$_GET['id'];
        //$delete="DELETE FROM addproduct WHERE id='$id'";
        //mysqli_query($conn,$delete);
        //header('Location:adminvp.php');
    //}
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
                  padding-left: 225px;
                  color: rgb(24, 24, 24);
                  width: 50%;
                  padding-top: 50px;
                  font-family:  'EB Garamond', serif;
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
                   font-size: 40px;
               }
               .table{
                   padding-top: 50px;
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
                   font-size: 32px;
               }
               table:hover{
                   box-shadow: 1px 1px 20px rgb(0, 0, 0);
               }
               th,td{
                    border-bottom: 1px solid #ddd;
               }
               td{
                   //word-break: break-all;
                   background-color: #eeeeee;
               }
               tr{
                   font-size: 20px;
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
               .allv{
                   padding-left: 450px;
                   font-size: 40px;
                   color: White;
               }
         </style>
     </head>
     <body>
         <div class="menu">
              <center><h1 class="logoname">MobCarT</h1></center><hr width="75%" noshade>
             <h1 style="color: #ffffff;font-family: 'Bellota';">MENU</h1><hr width="80%" noshade><br>
             <a href="adminp.php"><button type="button" name="ap" class="bt"> Home</button><br><br><br><br></a>
             <a href="adminv.php"><button type="button" name="ap" class="bt"> View Vendor's </button><br><br><br><br></a>
             <a href="adminvp.php"><button type="button" name="epd" class="bt"> View Product's</button><br><br><br><br></a>
             <a href="admino.php"><button type="button" name="vap" class="bt"> View Order's</button><br><br><br><br></a>
             <a href="feedback.php"><button type="button" name="vap" class="bt"> FeedBack's</button><br><br><br><br></a>
             <a href="loginpage.php"><button type="button" name="button" class="bt"> Logout</button></a>
         </div>
         <div class="topnav">
             <center><b><?php if(isset($_SESSION['admin']))  echo "WELCOME ".$_SESSION['admin']?></b></center>
         </div>
         <div class="main">
             <center><b class="allv">All Order's</b></center>
             <div class="table">
                 <table cellspacing="10px" cellpadding="5px" border="1">
                     <tr>
                         <th>Name</th>
                         <th>Quantity</th>
                         <th>Color</th>
                         <th>RamSize</th>
                         <th>InternalSize</th>
                         <th>Rate</th>
                         <th>Vendor</th>
                         <th>User</th>
                         <th>DeliveryDate</th>

                     </tr>
                 <?php
                     $query="Select * from orders";
                     $sqli=mysqli_query($conn, $query);
                     $rowcount=mysqli_num_rows($sqli);

                     for($i=1;$i<=$rowcount;$i++){
                         $row=mysqli_fetch_array($sqli);

                         $sql="SELECT email FROM vendorregis where id='{$row['vendorid']}'";
                         $que=mysqli_query($conn, $sql);
                         $row1=mysqli_fetch_array($que);

                         $sql2="SELECT email FROM register where id='{$row['customerid']}'";
                         $que2=mysqli_query($conn, $sql2);
                         $row2=mysqli_fetch_array($que2);

                         echo "</td><td>". $row["name"] ."</td><td>". $row["quantity"] ."</td><td>". $row["color"] ."</td><td>". $row["ram"] ."</td><td>". $row["internal"] ."</td><td>". $row["rate"] ."</td><td>". $row1["email"] ."</td><td>". $row2["email"] ."</td><td>". $row["deldate"] ."</td></tr>";
                     }


              ?>
          </table>
         </div>
     </div>
     </body>
 </html>
