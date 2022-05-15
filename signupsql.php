<?php
    include_once 'test.php';


    $email = $_POST['email'];
    $password = $_POST['password'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $date = $_POST['date'];
    $id=1;

    $sql = "INSERT INTO accounts(email, passcode, first_name, last_name, birth_date) VALUES ('$email', '$password','$first_name','$last_name','$date' );";

    mysqli_query($conn,$sql );

    header("Location: index.php?signup=success");


