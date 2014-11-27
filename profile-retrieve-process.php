<?php

session_start();
$username = $_SESSION["USERNAME"];

$usernameValid = false;

if (isset($username)) {
    if (empty($username)) {
        $usernameValid = false;
    } else {
        $usernameValid = true;
    }

    if ($usernameValid) {
        require_once('/protected/config.php');
        $connection = mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME);

        $error = mysqli_connect_error();
        if ($error != null) {
            $output = "<p>Unable to connect to database</p" . $error;
            exit($output);
        }

        $sql = "SELECT email FROM user " .
                "WHERE UserName = '$username'";
        if ($result = mysqli_query($connection, $sql)) {
            mysqli_data_seek($result, 399);

            $row = mysqli_fetch_row($result);
                   $_SESSION["EMAIL"] = $row[0];      
            mysqli_free_result($result);
            mysqli_close($connection);
            header('Location: editProfile.php');
        }
    }
}
?>