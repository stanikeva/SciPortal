<!DOCTYPE html>
<html lang="en">
<head>
    <script type="text/javascript" src="js/scripts.js"></script>


</head>

<body>
<div class="modal fade" id="login" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalLabel">Log In</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="loginsql.php" method="post">
                <div class="mb-3">
                        <p class="text-danger" style="display: none" id="combWrong">Email or password is incorrect.</p>
                        <label class="form-label">Email Address</label>
                        <input type="text" class="form-control" id="username" name="username" placeholder="Username" />
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password"/>
                    </div>
                    <div class="modal-footer d-block">
                        <button type="submit" class="btn btn-dark float-end" data-bs-dismiss="modal">Log In</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="signup" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalLabel2">Sign Up</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="signupsql.php" method="post">
                    <div class="mb-3">
                        <label class="form-label">Email Address</label>
                        <input type="text" class="form-control" id="email" name="email" placeholder="Email" />
                        <p class="text-danger" style="display: none" id="emailUsed">Email is already in use.</p>
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
                    <div>
                        <label for="birthday">Date of Birth:</label>
                        <input type="date" id="birthday" name="date">
                    </div>
                    <div class="modal-footer d-block">
                        <button type="submit" class="btn btn-dark float-end" data-bs-dismiss="modal">Sign Up</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>

