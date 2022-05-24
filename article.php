<!DOCTYPE html>
<?php session_start(); ?>
<html lang="en">
<head>

  <meta charset="utf-8" />
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <title>SciPortal - Article Name</title>
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
    if (!isset($_GET['art_id']))
    {?>
            <div class="space100"></div>
        <center><h1> 404 <br> Article is unavailable (sorry) ... :( </h1></center>

    <?php }
    else
    {
        $art_id=$_GET['art_id'];
        $sql = "SELECT * FROM Articles WHERE id='$art_id'";
        $result = mysqli_query($conn,$sql);
        $row = mysqli_fetch_assoc($result);

        $user_id=$row['Users_id'];
        $sql2 = " SELECT first_name, last_name FROM Users, Articles WHERE Users.id='$user_id'";
        $result2 = mysqli_query($conn, $sql2);
        $row2 = mysqli_fetch_assoc($result2);

        $subject = $row['subject'];
        $sql3 = "SELECT * FROM Articles INNER JOIN Users ON Users_id=Users.id WHERE subject='$subject' AND Articles.id!='$art_id'";
        $result3 = mysqli_query($conn,$sql3);

    ?>





<div class="space100"></div>

<div class="container" id="layout1">
  <div class="row" >

    <div class="col-10" >

      <div class="row">
        <div class="col-md-8">
          <h1><?php echo $row['title']?> </h1>
          <h5><?php echo $row2['last_name']." ".$row2['first_name']?></h5>
        </div>
        <div class="col-md-4">
          <img    class="img-fluid float-right" src="images/<?php echo $row['subject']?>.jpg"  width="300" height="100">
        </div>
      </div>

      <a class="badge rounded-pill bg-dark a2" href="articles.php?subject=<?php echo $subject ?>"><?php echo $subject ?></a>


      <br><br>

      <p>
          <?php echo $row['context'] ?>
      </p>
    </div>

    <div class="col-2  border-start border-5 border-dark">
      <center>
      <main>
        <h1><u>Read Next</u></h1>
      </main>
    <?php
        $noOfRows = mysqli_num_rows($result3);

        if ($noOfRows<3)
            $i=$noOfRows;
        else
            $i=3;
        for ($x = 0; $x < $i; $x++)
        {
            $row3 = mysqli_fetch_assoc($result3) ?>
          <a  href="article.php?art_id=<?php echo $row3['id'] ?>" class="alert-secondary" style="text-decoration: none">
          <div class="card">
              <div class="card-image">
                  <img src="images/card2.png" width="100" height="100" class="responsive-img img-fluid">
              </div>
              <div class="card-content">
                  <br>
                  <p><?php echo $row3['title']; ?></p>
                  <p><?php echo "Author: ".$row3['last_name']." ".$row3['first_name']; ?></p>

              </div>

          </div>
          </a>

        <?php } ?>



      </center>
    </div>
  </div>
</div>

<?php } ?>


<br><br><br>

<?php include('footer.php') ?>

</body>
</html>