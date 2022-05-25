<html lang="en">
<script type="text/javascript" src="js/scripts.js"></script>
<body>



<nav class="navbar navbar-expand-lg navbar-dark bg-light navbar-custom sticky-top" >
    <div class="container px-0 pt-0 pb-0">
        <a class="navbar-brand" href="#">
            <img class="img-fluid" src="images/logo2.png" alt="..." width="120" height="50" />
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarPrimary" aria-controls="navbarResponsive"
                aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarPrimary">
            <ul class="navbar-nav ms-auto" id="accountVuittons"  <?php if(isset($_SESSION['name'])):?> style="display: none" <?php  else : ?> style="display: inherit" <?php endif; ?> >
                <li><button type="button"  class="btn btn-light" data-bs-toggle="modal" data-bs-target="#signup">Sign Up</button></li>
                <li><button type="button"  class="btn btn-light" data-bs-toggle="modal" data-bs-target="#login">Log In</button></li>
            </ul>

            <ul class="navbar-nav ms-auto" id="logInCreds"  <?php if(isset($_SESSION['name'])):?> style="display: inherit" <?php  else : ?> style="display: none" <?php endif; ?>>
                <a href="account.php"><img src="images/img_avatar.png" alt="pfp" style="width:42px;height:42px;border-radius: 24px"></a>
                <div class="dropdown">
                    <button class="dropbtn">...</button>
                    <div class="dropdown-content">
                        <a href="index.php">Home</a>
                        <a href="account.php">My account</a>
                        <a href="logout.php" >Log out</a>
                    </div>
                </div>
            </ul>
        </div>
    </div>
    </div>
</nav>


<nav class="navbar navbar-expand-lg navbar-dark  bg-dark ">
    <div class="container pt-0 pb-0">
        <a class="navbar-brand" href="index.php">
            <img class="img-fluid" src="images/home.ico" alt="..." width="25" height="25" />
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSecondary" aria-controls="navbarResponsive"
                aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon2"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSecondary">
            <div class="dropdown">
                <button class="btn btn-clr  dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                    Humanities
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    <li><a class="dropdown-item" href="articles.php?subject=economics">Economics</a></li>
                    <li><a class="dropdown-item" href="articles.php?subject=Cognitive Science">Cognitive Science</a></li>
                </ul>
            </div>
            <div class="dropdown">
                <button class="btn btn-clr  dropdown-toggle" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">
                    Natural Sciences
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton2">
                    <li><a class="dropdown-item" href="articles.php?subject=biology">Biology</a></li>
                    <li><a class="dropdown-item" href="articles.php?subject=chemistry">Chemistry</a></li>
                    <li><a class="dropdown-item" href="articles.php?subject=physics">Physics</a></li>
                </ul>
            </div>
            <div class="dropdown">
                <button class="btn btn-clr dropdown-toggle" type="button" id="dropdownMenuButton3" data-bs-toggle="dropdown" aria-expanded="false">
                    Formal Sciences
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton3">
                    <li><a class="dropdown-item" href="articles.php?subject=Computer Science">Computer Science</a></li>
                    <li><a class="dropdown-item" href="articles.php?subject=Mathematics">Mathematics</a></li>
                </ul>
            </div>
            <div class="dropdown">
                <button class="btn btn-clr dropdown-toggle" type="button" id="dropdownMenuButton4" data-bs-toggle="dropdown" aria-expanded="false">
                    Applied Sciences
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton4">
                    <li><a class="dropdown-item" href="articles.php?subject=engineering">Engineering</a></li>
                    <li><a class="dropdown-item" href="articles.php?subject=architecture">Architecture</a></li>
                    <li><a class="dropdown-item" href="articles.php?subject=law">Law</a></li>
                </ul>
            </div>
        </div>
        <div class="search" <?php if (strpos($_SERVER["SCRIPT_NAME"],"index.php")): ?> style="display: none" <?php endif; ?> >
            <form class='form-inline' action="searchFunc.php" method="post">
            <input type="text"
                   placeholder=" Scooby Doo "
                   name="search">
                <button id="search-this" type="submit"  class="btn-light">
                    <i class="fa fa-search"
                       style="font-size:18px;">
                    </i>
                </button>

            </form>
        </div>
    </div>
</nav>


</body>
</html>