
<?php

session_start();
include "test.php";


    $email = validate($_POST['email']);
    $pass = validate($_POST['password']);
    $url = $_SESSION['url'];

    if (empty($email)) {

        header("Location: $url?error=Email is required");
        exit();

    } else if (empty($pass)) {

        header("Location: $url?error=Password is required");
        exit();

    }

    $sql = "SELECT * FROM Users WHERE email='$email' AND passcode='$pass'";
    $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) >= 1) {

            $row = mysqli_fetch_assoc($result);


            if ($row['email'] === $email && $row['passcode'] === $pass) {



                $_SESSION['email'] = $row['email'];

                $_SESSION['name'] = $row['first_name'].' '.$row['last_name'];

                $_SESSION['id'] = $row['id'];

                header("Location: account.php");


            } else {

                header("Location: $url?error=Incorrect User name or password");

                exit();

            }

        }else{

            header("Location: $url?error=Incorrect User name or password");

            exit();
        }



//include_once 'test.php';
//
//$email = $_POST['email'];
//$password = $_POST['password'];
//
//
//$sql = mysqli_query($conn,"SELECT * FROM users WHERE email='$email' AND passcode ='$password'");
//if (mysqli_num_rows($sql)===1 )
//{
//    header("Location: index.php?login=success");
//}
//
//else
//{
//    header("Location: index.php#login");
//}
//