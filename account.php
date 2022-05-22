<!DOCTYPE html>
<?php session_start(); ?>
<html lang="en">
  <head>
    <meta charset="utf-8" />
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>SciPortal - My Account</title>
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
      <?php include('modals.php') ?>

  </head>

  <body>
     <?php
         include('navbarsimple.php');
         $url = substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);
         $_SESSION['url']=$url;
     ?>


  <div class="px-5 pt-0 pb-4 bg-image"  style="background: url('images/account_bg.jpg'); background-size: 100%">
    <div class="media align-items-end profile-header">
      <center>
      <div class="profile position-relative mr-3"><img src="images/img_avatar.png" alt="..." width="130" height="130" class="rounded mb-2 img-thumbnail">
        <div class="media-body mb-5 text-white">
          <h4 class="mt-0 mb-0"><?php echo $_SESSION['name']?></h4>
          <p class="small mb-4"> <i class="fa fa-map-marker mr-2"></i>Location</p>
        </div>
      </div>
      </center>
    </div>
  </div>

  <div class="container">
    <div class="row">
      <div class="col-2  border-end border-5 border-dark">
        <main>
          <div class="space50"></div>
          <h1 class="text-break">Personal Stats</h1>
          <div class="space50"></div>

          <h4 class="text-break">Posted:</h4>
          <p class="text-break">3</p>

          <h4 class="text-break">Pending:</h4>
          <p class="text-break">3</p>
        </main>
      </div>
      <div class="col-10">

        <div class="space50"></div>
        <nav class="navbar navbar-expand-lg navbar-dark">
          <div class="container pt-0 pb-0">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#btnacc" aria-controls="navbarResponsive"
                    aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="btnacc">
              <ul>
                <li class="nav-item"><button type="button" onclick="showContent('MyArticles','newArticle','pendingArticles')" class="btn btn-light2 btn-acc" data-bs-toggle="modal" >My articles</button></li>
                <li class="nav-item"><button type="button" onclick="showContent('newArticle','MyArticles','pendingArticles')" class="btn btn-light2 btn-acc" data-bs-toggle="modal" >New article</button></li>
                <li class="nav-item"><button type="button" onclick="showContent('pendingArticles','newArticle','myArticles')" class="btn btn-light2 btn-acc" data-bs-toggle="modal" >Pending approval</button></li>
              </ul>
            </div>
          </div>
        </nav>

        <div class="space50"></div>

        <div id="MyArticles" style="display: none;">
          <div class="col s12 m3">
            <center>
              <div class="card3">
                <div class="card-image">
                  <img src="images/card2.png" width="100" height="100" class="responsive-img">
                </div>
                <div class="card-content">
                  <p>I am a very simple card. I am good at containing small bits of information. </p>
                </div>
                <div class="card-action">
                  <a href="article.php">This is a link</a>
                </div>
              </div>
            </center>
          </div>
          <div class="col s12 m3">
            <center>
              <div class="card3">
                <div class="card-image">
                  <img src="images/card2.png" width="100" height="100" class="responsive-img">
                </div>
                <div class="card-content">
                  <p>I am a very simple card. I am good at containing small bits of information.</p>
                </div>
                <div class="card-action">
                  <a href="article.php">This is a link</a>
                </div>
              </div>
            </center>
          </div>
          <div class="col s12 m3">
            <center>
              <div class="card3">
                <div class="card-image">
                  <img src="images/card2.png" width="100" height="100" class="responsive-img">
                </div>
                <div class="card-content">
                  <p>I am a very simple card. I am good at containing small bits of information. </p>
                </div>
                <div class="card-action">
                  <a href="article.php">This is a link</a>
                </div>
              </div>
            </center>
          </div>
        </div>

        <form id="newArticle" style="display: none"  action="submitArticle.php" method="post">
            <?php if (isset($_GET['error3'])) { ?>

            <p class="error alert-danger"><?php echo $_GET['error3']; ?></p>
            <?php }?>
          <div class="form-group">
            <label for="exampleFormControlInput1">Title</label>
            <input class="form-control" id="title" name="title" required="required" placeholder="Title goes here...">
          </div>
          <div class="form-group">
            <label for="exampleFormControlSelect1">Subject</label>
            <select class="form-control" id="subject" name="subject">
              <option>Economics</option>
              <option>Cognitive Science</option>
              <option>Biology</option>
              <option>Chemistry</option>
              <option>Physics</option>
              <option>Computer Science</option>
              <option>Mathematics</option>
              <option>Engineering</option>
              <option>Architecture</option>
              <option>Law</option>
            </select>
          </div>

          <div class="form-group">
            <label for="exampleFormControlTextarea1">Article goes here</label>
              <textarea class="form-control" id="content" name="content" rows="3"></textarea>

              <div class="space50"></div>
            <center>
              <button type="submit" class="btn btn-dark mb-2">Submit Article</button>
            </center>
          </div>
        </form>

        <table class="table" id="pendingArticles" style="display: none; margin-left: 45px">
          <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Date of submission</th>
          </tr>
          </thead>
          <tbody>
          <tr>
            <th scope="row">1</th>
            <td>Title1</td>
            <td>DD/MM/YYYY</td>
          </tr>
          <tr>
            <th scope="row">2</th>
            <td>Title2</td>
            <td>DD/MM/YYYY</td>
          </tr>
          <tr>
            <th scope="row">3</th>
            <td>Title3</td>
            <td>DD/MM/YYYY</td>
          </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <div class="space100"></div>

  <?php include('footer.php') ?>

  </body>
</html>

<!--if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) }else{

header("Location: index.php");

exit();

}{-->

