<!DOCTYPE HTML>
<?php session_start(); ?>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>SciPortal - Search Results</title>
    <link rel="icon" type="image/x-icon" href="images/logo.png" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" type="text/css" />
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="js/scripts.js"></script>
    <link href="css/styles.css" rel="stylesheet" />
    <?php include('modals.php') ?>
</head>

<body>
<?php
    include('navbarsimple.php');
    $url = substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);
    $_SESSION['url']=$url;

    $subject = $_GET['subject'];
    $sql = "SELECT * FROM Articles WHERE subject='$subject'";
    $result = mysqli_query($conn, $sql);
?>



<div class="space50"></div>
    <center>
        <h3>Results:</h3>
    </center>
<div class="space50"></div>



<?php
    $i=0;
    while($rows = mysqli_fetch_assoc($result))
    {

        if ($i%3==0)
        {?>
            <div class="valign-wrapper">
                <div class="container">
                    <div class="row">

        <?php } ?>


                    <div class="col-4 s12 m3">
                        <a href="article.php?art_id=<?php echo $rows['id']?>" class="alert-secondary">
                        <center>
                            <div class="card">
                                <div class="card-image ">
                                    <img src="images/card2.png" width="100" height="100" class="responsive-img">
                                </div>
                                <br>
                                <div class="card-content">
                                    <p><?php echo $rows['title']; ?></p>
                                    <p>
                                        <?php
                                        $user_id=$rows['Users_id'];
                                        $sql2 = " SELECT first_name, last_name FROM Users, Articles WHERE Users.id='$user_id'";
                                        $result2 = mysqli_query($conn, $sql2);
                                        $row = mysqli_fetch_assoc($result2);
                                        echo "Author: ".$row['first_name']." ".$row['last_name'];
                                        ?>

                                    </p>
                                </div>
                            </div>
                        </center>
                        </a>
                    </div>

                        <?php

                        if ($i%3==2)
                        {?>
                                    </div>
                                </div>
                            </div>
                            <br>


                        <?php
                            }
                            $i++;
                        ?>
<?php
    }
?>

<div class="space"></div>

<nav aria-label="Page navigation example">
    <ul class="pagination justify-content-center">
        <li class="page-item disabled">
            <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
        </li>
        <li class="page-item"><a class="btn btn-outline-dark" class="page-link"  href="#">1</a></li>
        <li class="page-item"><a class="btn btn-outline-dark" href="#">2</a></li>
        <li class="page-item"><a class="btn btn-outline-dark" href="#">3</a></li>
        <li class="page-item">
            <a class="btn btn-outline-dark" href="#">Next</a>
        </li>
    </ul>
</nav>

<br><br><br>

<?php include('footer.php') ?>

</body>
</html>