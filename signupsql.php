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
$url = $_SESSION['url'];



if (empty($email)) {

    header("Location: $url?error2=Email is required");
    exit();
}
else if (empty($password)) {

    header("Location: $url?error2=Password is required");
    exit();
}

else if ($password!=$cpassword) {

    header("Location: $url?error2=Passwords do not match");
    exit();
}

else if (empty($first_name) || empty($last_name))
{
    header("Location: $url?error2=Name cannot be empty");
    exit();
}

else if (empty($date))
{
    header("Location: $url?error2=Please specify a date");
    exit();
}



$sql = "INSERT INTO Users(email, passcode, first_name, last_name, birth_date) VALUES ('$email', '$password','$first_name','$last_name','$date');";

$checkemail= mysqli_query($conn,"SELECT * FROM Users WHERE email ='$email'");

if (mysqli_num_rows($checkemail)>0)
{
    header("Location: $url?error2=Email is already in use");
}
else
{
    //$_SESSION['email'] = $email;
    mysqli_query($conn,$sql);
    $getId = mysqli_query($conn,"SELECT id FROM Users WHERE email = $email");
    $row = mysqli_fetch_assoc($getId);

    $_SESSION['id'] = $row['id'];

    $_SESSION['email'] = $email;

    $_SESSION['name'] = $first_name.' '.$last_name;



    header("Location: account.php");
}



?>




