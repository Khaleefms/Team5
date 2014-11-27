<html>
    <head>
        <meta charset="UTF-8">
        <link href="phpProject9.css" rel="stylesheet" type="text/css"/>
        <link href="bootstrap-3.2.0-dist/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <script src="Javascript-project.js" type="text/javascript"></script>
        <title></title>
    </head>
    <body>
        <?php include 'header.inc.php' ?>
        <?php include 'sidenav.inc.php' ?>
        <div class="container"> 
            <div class="col-md-9">
                <div>
                    <h3>Register</h3>
                    <form id="signupform" action="register-process.php" method="POST">
                        <div class="form-group has-feedback">
                            <label>Username</label>
                            <input type="text" class="form-control" id="username" name="username" required>
                        </div>
                        <div class="form-group has-feedback">
                            <label>Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="form-group has-feedback">
                            <label>Password</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <div class="form-group has-feedback">
                            <label>Confirm Password</label>
                            <input type="password" class="form-control" id="password_confirm" name="password_confirm" required>
                        </div>
                        <div class="checkbox">
                            <label><input type="checkbox" required> I agree to the <a href="#">privacy policy</a></label>
                        </div>
                        <button type="submit" class="btn btn-primary" id="submitRegisterButton">Register</button>
                    </form>
                </div>
            </div>
        </div>
        <?php include 'footer.inc.php' ?>
    </body>
</html>