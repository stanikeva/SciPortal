<!DOCTYPE html>
<?php
session_start();
if (!isset($_SESSION['id']))
    header('Location: index.php');

?>
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
    <?php
    include('modals.php');
    $id = $_SESSION['id'];
    $sql = "SELECT title, uploadDate FROM Pending_articles WHERE Users_id='$id' ORDER BY uploadDate";
    $result = mysqli_query($conn, $sql);
    $sql2 = "SELECT * FROM Articles WHERE Users_id='$id' ";
    $result2 = mysqli_query($conn, $sql2);
    $sql3="SELECT * FROM Pending_articles";
    $result3 = mysqli_query($conn, $sql3);
    $sql4="SELECT * FROM users WHERE id!='0'";
    $result4= mysqli_query($conn, $sql4);
    $sql5 = "SELECT * FROM Articles ";
    $result5 = mysqli_query($conn, $sql5);
    ?>

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

<?php if ($_SESSION['id']!=0) {?>
    <div class="container">
        <div class="row">
            <div class="col-2  border-end border-5 border-dark">

                <main>
                    <div class="space50"></div>
                    <h1 class="text-break">Personal Stats</h1>
                    <div class="space50"></div>

                    <h4 class="text-break">Posted:</h4>
                    <p class="text-break"><?php $posted= mysqli_num_rows($result2); echo $posted?></p>

                    <h4 class="text-break">Pending:</h4>
                    <p class="text-break"><?php $pending = mysqli_num_rows($result); echo $pending?></p>
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
                                <li class="nav-item"><button type="button" onclick="showContent('newArticle','pendingArticles','MyArticles')" class="btn btn-light2 btn-acc" data-bs-toggle="modal" >New article</button></li>
                                <li class="nav-item"><button type="button" onclick="showContent('pendingArticles','newArticle','MyArticles')" class="btn btn-light2 btn-acc" data-bs-toggle="modal" >Pending approval</button></li>
                            </ul>
                        </div>
                    </div>
                </nav>

                <div class="space50"></div>

                <div class="valign-wrapper" id="MyArticles" style="display: none">
                    <?php
                    while($rows = mysqli_fetch_assoc($result2))
                    {
                        ?>

                        <div class="container">
                            <div class="row">
                                <div class="col s12 m3">
                                    <center>
                                        <div class="card3">
                                            <div class="card-image ">
                                                <img src="images/card2.png" width="100" height="100" class="responsive-img">
                                            </div>
                                            <br>
                                            <div class="card-content">
                                                <a href="article.php?art_id=<?php echo $rows['id']?>" class="alert-secondary">

                                                    <p><?php echo $rows['title']; ?></p>
                                                </a>
                                                <a class="badge bg-dark a2" href="deleteArticle.php?id=<?php echo $rows['id']?>">Delete article</a>


                                            </div>

                                        </div>
                                    </center>
                                </div>

                            </div>
                        </div>

                        <div class="space50"> </div>

                        <?php
                    }
                    ?>
                </div>


                <form id="newArticle" style="display: none"  action="submitArticle.php" method="post">
                    <?php if (isset($_GET['error3'])) { ?>
                        <p class="error alert-danger"><?php echo $_GET['error3']; ?></p>
                        <script>showContent('newArticle','pendingArticles','MyArticles')</script>
                    <?php } ?>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Title</label>
                        <input class="form-control" id="title" name="title" required=""  placeholder="Title goes here..." >
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
                        <textarea class="form-control" name="content" required=""  rows="3"></textarea>

                        <p class="small-text text-warning">*You may alter the content of a previously submitted article by entering its existing title and subject and inserting the revised content in the   'Article goes here' text area.</p>
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
                    <?php   // LOOP TILL END OF DATA
                    $counter = 1;
                    while($row = mysqli_fetch_assoc($result))
                    {?>
                        <tr>
                            <td><?php echo $counter?></td>
                            <td><?php echo $row['title'];?></td>
                            <td><?php echo $row['uploadDate'];?></td>
                        </tr>

                        <?php
                        $counter++;
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?php } else if ($_SESSION['id']==0){?>

    <div class="container">
        <div class="row">
            <div class="col-2  border-end border-5 border-dark">

                <main>
                    <div class="space50"></div>
                    <h4 class="text-break">Posted:</h4>
                    <p class="text-break"><?php echo $_SESSION['Articles']?> </p>

                    <h4 class="text-break">Pending:</h4>
                    <p class="text-break"><?php $pending = mysqli_num_rows($result3); echo $pending?></p>
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
                                <li class="nav-item"><button type="button" onclick="showContent('ApproveArticles','DeleteArticles','ManageUsers')" class="btn btn-light2 btn-acc" data-bs-toggle="modal" >Approve Articles</button></li>
                                <li class="nav-item"><button type="button" onclick="showContent('DeleteArticles','ApproveArticles','ManageUsers')" class="btn btn-light2 btn-acc" data-bs-toggle="modal" >Delete Articles</button></li>
                                <li class="nav-item"><button type="button" onclick="showContent('ManageUsers','ApproveArticles','DeleteArticles')" class="btn btn-light2 btn-acc" data-bs-toggle="modal" >Manage Users</button></li>
                            </ul>
                        </div>
                    </div>
                </nav>

                <div class="space50"></div>

                <div class="valign-wrapper" id="ApproveArticles" style="display: none">
                    <?php
                    while($rows3 = mysqli_fetch_assoc($result3))
                    {
                        ?>

                        <div class="container">
                            <div class="row">
                                <div class="col s12 m3">
                                    <center>
                                        <div class="card3">
                                            <div class="card-image ">
                                                <img src="images/card2.png" width="100" height="100" class="responsive-img">
                                            </div>
                                            <br>
                                            <div class="card-content">
                                                <a href="previewArticle.php?art_id=<?php echo $rows3['id']?> " target="_blank" class="alert-secondary">

                                                    <p><?php echo $rows3['title']; ?></p>
                                                </a>
                                                <a class="badge bg-dark a2" href="approveArticles.php?id=<?php echo $rows3['id']?>">Approve</a>


                                            </div>

                                        </div>
                                    </center>
                                </div>

                            </div>
                        </div>

                        <div class="space50"> </div>

                        <?php
                    }
                    ?>
                </div>


                <div class="valign-wrapper" id="DeleteArticles" style="display: none">
                    <?php
                    while($rows = mysqli_fetch_assoc($result5))
                    {
                        ?>

                        <div class="container">
                            <div class="row">
                                <div class="col s12 m3">
                                    <center>
                                        <div class="card3">
                                            <div class="card-image ">
                                                <img src="images/card2.png" width="100" height="100" class="responsive-img">
                                            </div>
                                            <br>
                                            <div class="card-content">
                                                <a href="article.php?art_id=<?php echo $rows['id']?>" class="alert-secondary">

                                                    <p><?php echo $rows['title']; ?></p>
                                                </a>
                                                <a class="badge bg-dark a2" href="deleteArticle.php?id=<?php echo $rows['id']?>">Delete</a>


                                            </div>

                                        </div>
                                    </center>
                                </div>

                            </div>
                        </div>

                        <div class="space50"> </div>

                        <?php
                    }
                    ?>
                </div>

                <table class="table" id="ManageUsers" style="display: none; margin-left: 45px">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">First Name</th>
                        <th scope="col">Last Name</th>
                        <th scope="col">Manage User</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php   // LOOP TILL END OF DATA
                    $counter = 1;
                    while($row = mysqli_fetch_assoc($result4))
                    {?>
                        <tr>
                            <td><?php echo $counter?></td>
                            <td><?php echo $row['first_name'];?></td>
                            <td><?php echo $row['last_name'];?></td>
                            <td><a class="badge bg-dark a2" href="deleteUser.php?id=<?php echo $row['id']?>" >Delete User</a></td>
                        </tr>

                        <?php
                        $counter++;
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>





<?php } ?>
<div class="space100"></div>

<?php include('footer.php') ?>

</body>
</html>

<!--if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) }else{

header("Location: index.php");

exit();

}{-->

