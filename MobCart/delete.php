<?php
    $conn=mysqli_connect('localhost','project','final_p@123','finalproject');
    $id=$_GET['id'];
    $query="DELETE FROM addproduct WHERE id='$id'";
    mysqli_query($conn,$query);
    header('Location:edit.php');
 ?>
 
