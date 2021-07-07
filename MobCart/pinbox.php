<?php
    session_start();

    $conn=mysqli_connect('localhost','project','final_p@123','finalproject');

    $customerq=mysqli_query($conn,"select * from register where email='".$_SESSION['userc']."'");
    $custq=mysqli_fetch_array($customerq);
    $cust=$custq['id'];
    //echo $noofrec;
    //echo "<pre>";
    //print_r($_GET);
    for($i=0;$i< count($_GET['productname']);$i++){
        $query="insert into orders(name,quantity,color,ram,internal,rate,vendorid,customerid) values('".$_GET['productname'][$i]."','".$_GET['qty'][$i]."','".$_GET['color'][$i]."','".$_GET['ram'][$i]."','".$_GET['int'][$i]."','".$_GET['rate'][$i]."','".$_GET['userid'][$i]."','".$cust."')";
        if(!mysqli_query($conn,$query)){
            echo "error:",mysqli_error($conn);
        }
        else {
            header('location:viewcart.php');
        }
        echo $query;
}


 ?>
