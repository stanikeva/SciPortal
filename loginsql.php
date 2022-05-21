
<?php

session_start();
include "test.php";


if (isset($_POST['email']) && isset($_POST['password'])) {

    function validate($data)
    {

        $data = trim($data);

        $data = stripslashes($data);

        return htmlspecialchars($data);

    }

    $email = validate($_POST['email']);
    $pass = validate($_POST['password']);

    if (empty($email)) {

        header("Location: index.php?error=User Name is required");
        exit();

    } else if (empty($pass)) {

        header("Location: index.php?error=Password is required");
        exit();

    }

    $sql = "SELECT * FROM Users WHERE email='$email' AND passcode='$pass'";
    $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) === 1) {

            $row = mysqli_fetch_assoc($result);


            if ($row['email'] === $email && $row['passcode'] === $pass) {



                $_SESSION['email'] = $row['email'];

                $_SESSION['name'] = $row['first_name'].' '.$row['last_name'];

                $_SESSION['id'] = $row['idAccounts'];




                header("Location: account.php");


            } else {

                header("Location: index.php?error=Incorrect User name or password");

                exit();

            }

        }else{

            header("Location: index.php?error=Incorrect User name or password");

            exit();
        }
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