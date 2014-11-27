<?php

session_start();

$username = '';
$password = '';
$email = '';
$username_Session = $_SESSION["USERNAME"];
$email_Session = $_SESSION["EMAIL"];
$usernameValid = false;
$passwordValid = false;
$emailValid = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST["username"]);
    $password = trim($_POST["password"]);
    $email = trim($_POST["email"]);
    if (isset($_POST["username"]) && isset($_POST["password"]) && isset($_POST["email"]) && !empty($username) && !empty($password) && !empty($email)) {
        $username = trim($_POST["username"]);
        $password = trim($_POST["password"]);
        $email = trim($_POST["email"]);

        if (empty($username)) {
            $usernameValid = false;
        }
        if (empty($password)) {
            $passwordValid = false;
        }
        if (empty($email)) {
            $emailValid = false;
        } else {
            $usernameValid = true;
            $passwordValid = true;
            $emailValid = true;
        }

        require_once('/protected/config.php');
        $connection = mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME);

        $error = mysqli_connect_error();
        if ($error != null) {
            $output = "<p>Unable to connect to database</p" . $error;
            exit($output);
        }
        echo "test";

        $sql = "SELECT * FROM user " .
                "WHERE UserName='$username'";

        $sql2 = "SELECT * FROM user " .
                "WHERE Email='$email'";

        $result = mysqli_query($connection, $sql);
        $result2 = mysqli_query($connection, $sql2);

        $num_rows = mysqli_num_rows($result);
        $num_rows2 = mysqli_num_rows($result2);

        if ($num_rows > 0 || $num_rows2 > 0) {
            echo "<script>alert('Username or email existed. Please try again.');window.location.href='editProfile.php';</script>";
        } else if ($num_rows == 0 && $num_rows2 == 0) {
            $passwordFromPost=$password;
            $password=password_hash($passwordFromPost,PASSWORD_BCRYPT); 
            $sql = "update user " .
                    "SET UserName='$username', Email='$email', Password='$password'" .
                    "where Username='$username_Session'";
            if ($result = mysqli_query($connection, $sql)) {
                $_SESSION["USERNAME"] = $username;
                mysqli_free_result($result);
                mysqli_close($connection);

                header('Location: editSuccess.php');
            }
        }
    } else if (isset($_POST["username"]) && isset($_POST["email"]) && !empty($username) && !empty($email)) {
        $username = trim($_POST["username"]);
        $password = trim($_POST["password"]);
        $email = trim($_POST["email"]);

        if (empty($username)) {
            $usernameValid = false;
        }
        if (empty($password)) {
            $passwordValid = false;
        }
        if (empty($email)) {
            $emailValid = false;
        } else {
            $usernameValid = true;
            $passwordValid = true;
            $emailValid = true;
        }

        require_once('/protected/config.php');
        $connection = mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME);

        $error = mysqli_connect_error();
        if ($error != null) {
            $output = "<p>Unable to connect to database</p" . $error;
            exit($output);
        }
        echo "test";

        $sql = "SELECT * FROM user " .
                "WHERE UserName='$username'";

        $sql2 = "SELECT * FROM user " .
                "WHERE Email='$email'";

        $result = mysqli_query($connection, $sql);
        $result2 = mysqli_query($connection, $sql2);

        $num_rows = mysqli_num_rows($result);
        $num_rows2 = mysqli_num_rows($result2);

        if ($num_rows > 0 || $num_rows2 > 0) {
            echo "<script>alert('Username or email existed. Please try again.');window.location.href='editProfile.php';</script>";
        } else if ($num_rows == 0 && $num_rows2 == 0) {
            $sql = "update user " .
                    "SET UserName='$username', Email='$email'" .
                    "where Username='$username_Session'";
            if ($result = mysqli_query($connection, $sql)) {
                $_SESSION["USERNAME"] = $username;
                mysqli_free_result($result);
                mysqli_close($connection);

                header('Location: editSuccess.php');
            }
        }
    } else if (isset($_POST["username"]) && isset($_POST["password"]) && !empty($username) && !empty($password)) {
        $username = trim($_POST["username"]);
        $password = trim($_POST["password"]);
        $email = trim($_POST["email"]);

        if (empty($username)) {
            $usernameValid = false;
        }
        if (empty($password)) {
            $passwordValid = false;
        }
        if (empty($email)) {
            $emailValid = false;
        } else {
            $usernameValid = true;
            $passwordValid = true;
            $emailValid = true;
        }

        require_once('/protected/config.php');
        $connection = mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME);

        $error = mysqli_connect_error();
        if ($error != null) {
            $output = "<p>Unable to connect to database</p" . $error;
            exit($output);
        }
        echo "test";

        $sql = "SELECT * FROM user " .
                "WHERE UserName='$username'";

        $result = mysqli_query($connection, $sql);

        $num_rows = mysqli_num_rows($result);

        if ($num_rows > 0) {
            echo "<script>alert('Username or email existed. Please try again.');window.location.href='editProfile.php';</script>";
        } else if ($num_rows == 0) {
            $sql = "update user " .
                    "SET UserName='$username', Password='$password'" .
                    "where Username='$username_Session'";
            if ($result = mysqli_query($connection, $sql)) {
                $_SESSION["USERNAME"] = $username;
                mysqli_free_result($result);
                mysqli_close($connection);

                header('Location: editSuccess.php');
            }
        }
    } else if (isset($_POST["password"]) && isset($_POST["email"]) && !empty($email) && !empty($password)) {
        $username = trim($_POST["username"]);
        $password = trim($_POST["password"]);
        $email = trim($_POST["email"]);

        if (empty($username)) {
            $usernameValid = false;
        }
        if (empty($password)) {
            $passwordValid = false;
        }
        if (empty($email)) {
            $emailValid = false;
        } else {
            $usernameValid = true;
            $passwordValid = true;
            $emailValid = true;
        }

        require_once('/protected/config.php');
        $connection = mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME);

        $error = mysqli_connect_error();
        if ($error != null) {
            $output = "<p>Unable to connect to database</p" . $error;
            exit($output);
        }
        echo "test";

        $sql = "SELECT * FROM user " .
                "WHERE Email='$email'";

        $result = mysqli_query($connection, $sql);

        $num_rows = mysqli_num_rows($result);

        if ($num_rows > 0) {
            echo "<script>alert('Username or email existed. Please try again.');window.location.href='editProfile.php';</script>";
        } else if ($num_rows == 0) {
            $sql = "update user " .
                    "SET Email='$email', Password='$password'" .
                    "where Username='$username_Session'";
            if ($result = mysqli_query($connection, $sql)) {
                $_SESSION["USERNAME"] = $username_Session;
                $_SESSION["EMAIL"] = $email;
                mysqli_free_result($result);
                mysqli_close($connection);

                header('Location: editSuccess.php');
            }
        }
    } else if (isset($_POST["username"]) && !empty($username)) {
        $username = trim($_POST["username"]);
        $password = trim($_POST["password"]);
        $email = trim($_POST["email"]);

        if (empty($username)) {
            $usernameValid = false;
        }
        if (empty($password)) {
            $passwordValid = false;
        }
        if (empty($email)) {
            $emailValid = false;
        } else {
            $usernameValid = true;
            $passwordValid = true;
            $emailValid = true;
        }

        require_once('/protected/config.php');
        $connection = mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME);

        $error = mysqli_connect_error();
        if ($error != null) {
            $output = "<p>Unable to connect to database</p" . $error;
            exit($output);
        }
        echo "test";

        $sql = "SELECT * FROM user " .
                "WHERE Username='$username'";

        $result = mysqli_query($connection, $sql);

        $num_rows = mysqli_num_rows($result);

        if ($num_rows > 0) {
            echo "<script>alert('Username or email existed. Please try again.');window.location.href='editProfile.php';</script>";
        } else if ($num_rows == 0) {
            $sql = "update user " .
                    "SET Username='$email'" .
                    "where Username='$username_Session'";
            if ($result = mysqli_query($connection, $sql)) {
                $_SESSION["USERNAME"] = $username;
                $_SESSION["EMAIL"] = $email_Session;
                mysqli_free_result($result);
                mysqli_close($connection);

                header('Location: editSuccess.php');
            }
        }
    } else if (isset($_POST["email"]) && !empty($email)) {
        $username = trim($_POST["username"]);
        $password = trim($_POST["password"]);
        $email = trim($_POST["email"]);

        if (empty($username)) {
            $usernameValid = false;
        }
        if (empty($password)) {
            $passwordValid = false;
        }
        if (empty($email)) {
            $emailValid = false;
        } else {
            $usernameValid = true;
            $passwordValid = true;
            $emailValid = true;
        }

        require_once('/protected/config.php');
        $connection = mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME);

        $error = mysqli_connect_error();
        if ($error != null) {
            $output = "<p>Unable to connect to database</p" . $error;
            exit($output);
        }
        echo "test";

        $sql = "SELECT * FROM user " .
                "WHERE Email='$email'";

        $result = mysqli_query($connection, $sql);

        $num_rows = mysqli_num_rows($result);

        if ($num_rows > 0) {
            echo "<script>alert('Username or email existed. Please try again.');window.location.href='editProfile.php';</script>";
        } else if ($num_rows == 0) {
            $sql = "update user " .
                    "SET Email='$email'" .
                    "where Username='$username_Session'";
            if ($result = mysqli_query($connection, $sql)) {
                $_SESSION["USERNAME"] = $username_Session;
                $_SESSION["EMAIL"] = $email;
                mysqli_free_result($result);
                mysqli_close($connection);

                header('Location: editSuccess.php');
            }
        }
    } else if (isset($_POST["password"]) && !empty($password)) {
        $username = trim($_POST["username"]);
        $password = trim($_POST["password"]);
        $email = trim($_POST["email"]);

        if (empty($username)) {
            $usernameValid = false;
        }
        if (empty($password)) {
            $passwordValid = false;
        }
        if (empty($email)) {
            $emailValid = false;
        } else {
            $usernameValid = true;
            $passwordValid = true;
            $emailValid = true;
        }

        require_once('/protected/config.php');
        $connection = mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME);

        $error = mysqli_connect_error();
        if ($error != null) {
            $output = "<p>Unable to connect to database</p" . $error;
            exit($output);
        }
        echo "test";

        $sql = "update user " .
                "SET Password='$password'" .
                "where Username='$username_Session'";
        
        if ($result = mysqli_query($connection, $sql)) {
            $_SESSION["USERNAME"] = $username_Session;
            $_SESSION["EMAIL"] = $email_Session;
            mysqli_free_result($result);
            mysqli_close($connection);

            header('Location: editSuccess.php');
        }
    }
}
?>