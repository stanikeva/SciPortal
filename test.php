<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "accounts";

    // Create connection
    $conn = mysqli_connect($servername, $username, $password,$dbname);

if (!$conn) {

    echo "Connection failed!";

}


