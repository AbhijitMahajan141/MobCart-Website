<?php
    session_start();
    $conn=mysqli_connect('localhost','project','final_p@123','finalproject');
    if (isset($_GET['id'])) {
        $id=$_GET['id'];
        $delq=mysqli_query($conn,"DELETE FROM addproduct WHERE userid='$id'");
        header('location:view.php');
    }
 ?>
 <!DOCTYPE html>
 <html lang="en" dir="ltr">
     <head>
         <meta charset="utf-8">
         <title>View Product</title>
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
                  padding-bottom: 20px;
                  padding-left: 220px;
                  padding-top: 20px;
              }
              table,th,tr{
                  color: rgb(65, 65, 65);
                  //border: 2px solid #a8a8a8;
                  border: none;
                  border-collapse: collapse;
                  text-align: center;
                  word-wrap:break-word;
                  text-overflow: ellipsis;
                  transition: .7s;
                  background-color: white;
              }
              table{
                  overflow-x: auto;
              }
              th{
                  background-image: linear-gradient(to bottom,#48c6ef  0%, #6f86d6 100%);
                  color: rgb(255, 255, 255);
                  font-size: 20px;
              }
              table:hover{
                  box-shadow: 1px 1px 20px rgb(0, 0, 0);
              }
              th,td{
                   border-bottom: 1px solid #ddd;
                   white-space: pre-wrap;
              }
              td{
                  width: 100px;
                  max-width: 100px;
                  word-break: break-all;
                  word-wrap: break-word;
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
              .delbtn{
                  background-color: rgb(175, 45, 45);
                  border: none;
                  padding: 10px;
                  border-radius: 10px;
                  padding:15px;
                  color: White;
                  cursor: pointer;
                  transition: .6s;
              }
              .delbtn:hover{
                  box-shadow: 1px 1px 20px rgb(0, 0, 0);
              }
              .delete{
                  padding-bottom: 10px;
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
                  .topnav{
                      padding-left: 200px;
                  }
                  .table{
                      padding-left: 200px;
                      overflow-x: auto;
                  }
                  table,th,tr{
                      width: 100%;
                  }
                  .delete{
                      padding-left: 100px;
                  }
              }
              </style>
     </head>
     <body>
     <div class="menu">
         <h1 class="logoname">MobCarT</h1><hr width="75%" noshade>
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
     <h2 style="text-align: center; padding-left: 230px; ">List of all Product's</h2>

     <div class="table">
         <center><table cellspacing="0px" cellpadding="5px" border="1">
             <col width="20">
             <tr>
                 <th>ProductName</th>
                 <th>Quantity</th>
                 <th>Rate</th>
                 <th>GST</th>
                 <th>Brandname</th>
                 <th>Color</th>
                 <th>Ram</th>
                 <th>Internal</th>
                 <th>Status</th>
                 <th>SKU</th>
                 <th>Description</th>
                 <th>Image</th>
                 <th>Date Added</th>
             </tr>
         <?php
             if ($conn -> connect_error) {
                 die("Connection failed:".$conn->connect_error);
             }

             $user=$_SESSION['user'];
             $query="Select * from vendorregis where Email='$user'";
             $sqli=mysqli_query($conn, $query);
             $row1=mysqli_fetch_array($sqli);
             $id=$row1['id'];
             $sql="SELECT * FROM addproduct where userid='$id'";
             $que=mysqli_query($conn, $sql);
             $rowcount=mysqli_num_rows($que);
             for($i=1;$i<=$rowcount;$i++){
                 $row=mysqli_fetch_array($que);
                 echo "</td><td>". $row["productname"] ."</td><td>". $row["quantity"] ."</td><td>". $row["rate"] ."</td><td>". $row["gst"] ."</td><td>". $row["brandname"] ."</td><td>". $row["color"] ."</td><td>".$row["Ram"]."</td><td>".$row["Internal"]."</td><td>". $row["status"] .
                 "</td><td>". $row["sku"] ."</td><td>". $row['description'] ."</td><td>".'<img src = "data:image/jpg;base64,'.base64_encode($row['image']).'" height="75px" width="75px"/>'."</td><td>". $row["Date"] ."</td></tr>";
             }
             echo "<div class='delete'><a href='view.php?id=".$row1['id']."'><button type='submit' class='delbtn' name='deleteall'>Delete All</button></a></div>";

             function sessend(){
                 session_destroy();
             }
             $conn->close();
         ?>
     </table></center>
     </div>
     </body>
 </html>
