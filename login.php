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
                    <h3>Login</h3>
                    <form id="signinform" action="login-process.php" method="POST">
                            <div class="form-group has-feedback">
                                <label>Username</label>
                                <input type="text" class="form-control" id="username" name="username" required>
                            </div>
                            <div class="form-group has-feedback">
                                <label>Password</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                            <button type="submit" class="btn btn-primary" id="loginButton">Login</button>
                        </form>
                </div>
            </div>
        </div>
        <?php include 'footer.inc.php' ?>
    </body>
</html>