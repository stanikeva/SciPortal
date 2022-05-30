<?php
session_start();
include 'test.php';

$title = $_POST['title'];
$subject = $_POST['subject'];
$content = $_POST['content'];

$userid = $_SESSION['id'];
$currentdate = date('y-m-d');
$url= $_SESSION['url'];

if (mysqli_num_rows(mysqli_query($conn,"SELECT * FROM Articles WHERE title='$title' AND subject='$subject' AND  Users_id!='$userid'"))>0){

    header("Location: $url?error3=This article has been submitted by a different author");
}
else{
    $sql = "INSERT INTO Pending_articles  (Users_id , title , subject , context, uploadDate ) VALUES ('$userid', '$title', '$subject', '$content', '$currentdate' )";
    mysqli_query($conn,$sql);
    header("Location: account.php");
}