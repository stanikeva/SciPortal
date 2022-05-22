<?php
    session_start();
    include 'test.php';

    $title = $_POST['title'];
    $subject = $_POST['subject'];
    $content = $_POST['content'];

    $userid = $_SESSION['id'];

    $sql = "INSERT INTO Pending_articles  (Users_id , title , subject , context ) VALUES ('$userid', '$title', '$subject', '$content')";

    mysqli_query($conn,$sql);
    header("Location: account.php");

