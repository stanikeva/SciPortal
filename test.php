<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "accounts";

global $conn;
// Create connection
$conn = mysqli_connect($servername, $username, $password,$dbname);
// Check connection
