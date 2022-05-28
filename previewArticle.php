<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link href="css/styles.css" rel="stylesheet" />
    <title>SciPortal - Preview Article</title>
</head>

<body>

<?php
    include 'test.php';
    $prev_art_id=$_GET['art_id'];
    $sql= "SELECT * FROM pending_Articles INNER JOIN users ON users.id=Users_id WHERE pending_Articles.id='$prev_art_id'";
    $prev_result=mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($prev_result);
?>

<center>
    <br>
    <h1><?php echo $row['title']?></h1>
    <br>
    <h2><?php echo $row['first_name']." ".$row['last_name'] ?></h2>
    <br><br><br>
    <p><?php echo $row['context']?></p>
</center>


</body>

</html>

