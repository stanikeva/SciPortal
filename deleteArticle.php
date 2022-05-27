<?php
    include 'test.php';
    $id=$_GET['id'];
    mysqli_query($conn,"DELETE from Articles WHERE id IN ('$id')");
    header('Location:account.php');
?>
