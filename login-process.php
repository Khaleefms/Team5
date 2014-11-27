<?php

session_start();
$username = '';
$password = '';

$usernameValid = false;
$passwordValid = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["username"]) && isset($_POST["password"])) {
        $username = trim($_POST["username"]);
        $password = trim($_POST["password"]);

        if (empty($username)) {
            $usernameValid = false;
        }
        if (empty($password)) {
            $passwordValid = false;
        } else {
            $usernameValid = true;
            $passwordValid = true;
        }

        if ($usernameValid && $passwordValid) {
            require_once('/protected/config.php');
            $connection = mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME);

            $error = mysqli_connect_error();
            if ($error != null) {
                $output = "<p>Unable to connect to database</p" . $error;
                exit($output);
            }
            $sql = "SELECT Password FROM user " .
            "WHERE UserName='$username'";
            $result = mysqli_query($connection, $sql);
            $row= mysqli_fetch_assoc($result);
            $HashPassword=$row['Password'];
            if(password_verify($password,$HashPassword)){
                $PasswordVerfiy='1';
            }
            else{
                $PasswordVerfiy='0';}
                
            if ($PasswordVerfiy == 0) {
                echo "<script>alert('Invalid username or password. Please try again.');window.location.href='login.php';</script>";
            } else if ($PasswordVerfiy==1) {
                $_SESSION["USERNAME"] = $username;

                $sql = "SELECT UserID, Admin FROM user " .
                        "WHERE UserName = '$username'";
                $result = mysqli_query($connection, $sql);
                mysqli_data_seek($result, 399);

                $row = mysqli_fetch_row($result);
                $_SESSION["USERID"] = $row[0];
                $_SESSION["ADMIN"] = $row[1];

                mysqli_free_result($result);
                mysqli_close($connection);
                header('Location: index.php');
            }
        }
    }
}
?>