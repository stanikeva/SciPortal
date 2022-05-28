<?php
    include 'test.php';
    $user_id=$_GET['id'];
    mysqli_query($conn,"DELETE FROM Articles WHERE Users_id='$user_id'");
    mysqli_query($conn,"DELETE FROM pending_Articles WHERE Users_id='$user_id'");
    mysqli_query($conn,"DELETE FROM users WHERE id='$user_id'");

    header("Location: account.php");

?>
