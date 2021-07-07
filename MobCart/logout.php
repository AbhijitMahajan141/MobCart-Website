<?php
    session_start();
    $_SESSION['lastlog'];
    session_unset();
    session_destroy();
    header('Location:vendorlogin.php');
?>
