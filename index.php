<!DOCTYPE html>
<?php session_start(); ?>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>SciPortal - Home</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="images/logo.png" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" type="text/css" />
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script type="text/javascript" src="js/scripts.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <link href="css/styles.css" rel="stylesheet" />
    <?php
        include('modals.php');
        $url = substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);
        $_SESSION['url']=$url;

        $sql = "SELECT * FROM Users";
        $result = mysqli_query($conn, $sql);

        $sql2 = "SELECT * FROM Articles";
        $result2 = mysqli_query($conn, $sql2);
        $_SESSION['Articles']= mysqli_num_rows($result2);

        $sqlcogsci = "SELECT * FROM Users INNER JOIN Articles ON Users_id=Users.id WHERE subject='Cognitive Science' ORDER BY Articles.id DESC ";
        $resultcogsci = mysqli_query($conn, $sqlcogsci);

        $sqlmath = "SELECT * FROM Users INNER JOIN Articles ON Users_id=Users.id WHERE subject='Mathematics' ORDER BY Articles.id DESC ";;
        $resultmath = mysqli_query($conn, $sqlmath);

        $sqlchem = "SELECT * FROM Users INNER JOIN Articles  ON Users_id=Users.id WHERE subject='Chemistry' ORDER BY Articles.id DESC ";
        $resultchem = mysqli_query($conn, $sqlchem);


    ?>
</head>
<body >
<?php include('navbarsimple.php') ?>




<!-- Carousel -->
<div id="demo" class="carousel slide" data-bs-ride="carousel">

    <!-- Indicators/dots -->
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
        <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
        <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
    </div>

    <!-- The slideshow/carousel -->
    <div class="carousel-inner">
        <div class="carousel-item active" >
            <img src="images/cognitive Science.jpg" alt="Los Angeles" class="d-block w-100" width="125" height="700">
            <div class="carousel-caption" id="carItem">
                <div class="valign-wrapper">
                    <div class="container">
                        <div class="row">
                            <?php
                                for ($x = 0; $x<4;$x++)
                                {
                                    $rowcogsci = mysqli_fetch_assoc($resultcogsci);

                            ?>
                            <div class="col s12 m3">
                                <a class="a2" href="article.php?art_id=<?php echo $rowcogsci['id']?>">
                                <center>
                                    <div class="card2">
                                        <div class="card-image">
                                            <br>
                                            <img src="images/card.png" width=research"200" height="60" class="responsive-img">
                                            <br><br>
                                        </div>
                                        <div class="card-content">
                                            <p><?php echo $rowcogsci['title'] ?></p>
                                            <p><?php echo "Author: ".$rowcogsci['first_name']." ".$rowcogsci['last_name']?></p>


                                        </div>
                                        <div class="card-action">

                                        </div>
                                    </div>
                                </center>
                                </a>
                            </div>
                            <?php } ?>

                        </div>
                    </div>
                </div>
                <h3>Cognitive Science</h3>
                <br><br>
            </div>
        </div>
        <div class="carousel-item">
            <img src="images/mathematics.jpg" alt="Chicago" class="d-block w-100" width="125" height="700">
            <div class="carousel-caption ">
                <div class="valign-wrapper">
                    <div class="container">
                        <div class="row">
                            <?php
                            for ($x = 0; $x<4;$x++)
                            {
                                $rowmath = mysqli_fetch_assoc($resultmath);

                                ?>
                                <div class="col s12 m3">
                                    <a class="a2" href="article.php?art_id=<?php echo $rowmath['id']?>" >
                                        <center>
                                            <div class="card2">
                                                <div class="card-image">
                                                    <br>
                                                    <img src="images/card.png" width=research"200" height="60" class="responsive-img">
                                                    <br><br>
                                                </div>
                                                <div class="card-content">
                                                    <p><?php echo $rowmath['title'] ?></p>
                                                    <p><?php echo "Author: ".$rowmath['first_name']." ".$rowmath['last_name']?></p>
                                                </div>
                                                <div class="card-action">

                                                </div>
                                            </div>
                                        </center>
                                    </a>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <h3>Mathematics</h3>
                <br><br>
            </div>
        </div>
        <div class="carousel-item">
            <img src="images/chemistry.jpg" alt="New York" class="d-block w-100" width="125" height="700">
            <div class="carousel-caption">
                <div class="valign-wrapper">
                    <div class="container">
                        <div class="row">
                            <?php
                            for ($x = 0; $x<4;$x++)
                            {
                                $rowchem = mysqli_fetch_assoc($resultchem);

                                ?>
                                <div class="col s12 m3">
                                    <a class="a2" href="article.php?art_id=<?php echo $rowchem['id']?>" >
                                        <center>
                                            <div class="card2">
                                                <div class="card-image">
                                                    <br>
                                                    <img src="images/card.png" width=research"200" height="60" class="responsive-img">
                                                    <br><br>
                                                </div>
                                                <div class="card-content">
                                                    <p><?php echo $rowchem['title'] ?></p>
                                                    <p><?php echo "Author: ".$rowchem['first_name']." ".$rowchem['last_name']?></p>
                                                </div>
                                                <div class="card-action">

                                                </div>
                                            </div>
                                        </center>
                                    </a>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <h3>Chemistry</h3>
                <br><br>
            </div>
        </div>
    </div>

    <!-- Left and right controls/icons -->
    <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
        <span class="carousel-control-prev-icon"></span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
        <span class="carousel-control-next-icon"></span>
    </button>
</div>

<!-- Left and right controls -->
<a class="left carousel-control" href="#myCarousel" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
    <span class="sr-only">Previous</span>
</a>
<a class="right carousel-control" href="#myCarousel" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
    <span class="sr-only">Next</span>
</a>
</div>

<div class="container">
    <div id="content">
        <form class='form-inline' action="searchFunc.php" method="post">
            <div class="input-group">
                <input type='text' id="search" name="search" class="form-control search-form" placeholder="Scooby Doo">
                <span class="input-group-btn" style="width:39px">
              <button id="search-this" type="submit"  class=" btn btn-default search-btn">
                  <i class="fa fa-search" ></i>
              </button>
            </span>
            </div>
        </form>
        <p class="text-center">Search for articles</p>
    </div>
</div>

<div class="space"></div>

<section class="page-section" id="statistics">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase">Statistics</h2>
            <br>
        </div>
        <div class="row text-center">
            <div class="col-md-4">
                <p class="fa fa-user fa-4x"></p>
                <h4 class="my-3">Users</h4>
                <h1 class="my-0"><?php echo mysqli_num_rows($result) ?></h1>
            </div>
            <div class="col-md-4">
                <p class="fa fa-book fa-4x"></p>
                <h4 class="my-3">Fields</h4>
                <h1>10</h1>
            </div>
            <div class="col-md-4">
                <p class="fa fa-laptop fa-4x"></p>
                <h4 class="my-3">Articles</h4>
                <h1><?php echo $_SESSION['Articles'] ?></h1>
            </div>
        </div>
    </div>
</section>


<?php include('footer.php') ?>


</body>
</html>