<?php
    include_once 'test.php';


//&& isset($_POST['password']) && isset($_POST['first_name']) && isset($_POST['last_name']) && isset($_POST['date'])

        $email = $_POST['email'];
        $password = $_POST['password'];
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $date = $_POST['date'];


        $sql = "INSERT INTO bruh(email, passcode, first_name, last_name, birth_date) VALUES ('$email', '$password','$first_name','$last_name','$date');";

        $checkemail= mysqli_query($conn,"SELECT * FROM bruh WHERE email ='$email'");
        if (mysqli_num_rows($checkemail)>0)
        {
            header("Location: index.php#signup");
        }
        else
        {
            $_SESSION['email'] = $email;
            mysqli_query($conn,$sql);
            header("Location: index.php?signup=success");
        }


   ?>



