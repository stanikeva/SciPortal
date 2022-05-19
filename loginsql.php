<?php
    include_once 'test.php';

    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = mysqli_query($conn,"SELECT * FROM bruh WHERE email='$email' AND passcode ='$password'");
    if (mysqli_num_rows($sql)==1)
    {
        header("Location: index.php?login=success");
    }
    else
    {
        header("Location: index.php#login");
    }
    ?>