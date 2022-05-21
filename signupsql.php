<?php

session_start();

include 'test.php';


//&& isset($_POST['password']) && isset($_POST['first_name']) && isset($_POST['last_name']) && isset($_POST['date'])


$email = validate($_POST['email']);
$password = validate($_POST['password']);
$cpassword = validate($_POST['cpassword']);
$first_name = validate($_POST['first_name']);
$last_name = validate($_POST['last_name']);
$date = validate($_POST['date']);


if (empty($email)) {

    header("Location: index.php?error2=Email is required");
    exit();
}
else if (empty($password)) {

    header("Location: index.php?error2=Password is required");
    exit();
}

else if ($password!=$cpassword) {

    header("Location: index.php?error2=Passwords do not match");
    exit();
}

else if (empty($first_name) || empty($last_name))
{
    header("Location: index.php?error2=Name cannot be empty");
    exit();
}

else if (empty($date))
{
    header("Location: index.php?error2=Please specify a date");
    exit();
}



$sql = "INSERT INTO Users(email, passcode, first_name, last_name, birth_date) VALUES ('$email', '$password','$first_name','$last_name','$date');";

$checkemail= mysqli_query($conn,"SELECT * FROM Users WHERE email ='$email'");

if (mysqli_num_rows($checkemail)>0)
{
    header("Location: index.php#signup");
}
else
{
    //$_SESSION['email'] = $email;
    mysqli_query($conn,$sql);

    $_SESSION['email'] = $email;

    $_SESSION['name'] = $first_name.' '.$last_name;

    $_SESSION['id'] = $row['idAccounts'];

    header("Location: account.php");
}



?>




