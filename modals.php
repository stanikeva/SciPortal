<?php
include "test.php";
?>

<script type="text/javascript" src="js/scripts.js"></script>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>




<div class="modal fade" id="login" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalLabel">Log In</h5>
                <button type="button" class="btn-close" data-dismiss="modal" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="loginsql.php" method="post">
                    <?php if (isset($_GET['error'])) { ?>

                        <p class="error alert-danger"><?php echo $_GET['error']; ?></p>
                        <script>
                            $("#login").modal()
                        </script>
                    <?php } ?>
                    <div class="mb-3">
                        <label class="form-label">Email Address</label>
                        <input type="text" class="form-control" id="email" name="email" placeholder="Email" />
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password" />
                    </div>
                    <div class="modal-footer d-block">
                       <!--href="account.php" onclick="navbarContent('accountVuittons','logInCreds')"
                        -->
                        <button type="submit"  class="btn btn-dark float-end" data-bs-dismiss="modal"> Log in</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="signup" name="signup" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalLabel2">Sign Up</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="signupsql.php" METHOD="post">
                    <div class="mb-3">
                        <label class="form-label">Email Address</label>
                        <input type="text" class="form-control" id="email" name="email" placeholder="Email" />
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" class="form-control" id="password1" name="password" placeholder="Password" />
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" id="password2" name="cpassword" placeholder="Confirm Password" />
                    </div>
                    <div class="mb-3">
                        <label class="form-label">First Name</label>
                        <input type="text" class="form-control" id="firstname" name="first_name" placeholder="First Name" />
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Last Name</label>
                        <input type="text" class="form-control" id="lastname" name="last_name" placeholder="Last Name" />
                    </div>
                    <form action="/action_page.php">
                        <label for="birthday">Date of Birth:</label>
                        <input type="date" id="birthday" name="date">
                    </form>
                    <div class="modal-footer d-block">
                        <button type="submit"  class="btn btn-dark float-end" data-bs-dismiss="modal">Sign Up</button>
                        <!--onclick="navbarContent('accountVuittons','logInCreds')"-->
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>