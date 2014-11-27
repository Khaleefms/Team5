<?php

$username = '';
$password = '';
$email = '';

$usernameValid = false;
$passwordValid = false;
$emailValid = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["username"]) && isset($_POST["password"]) && isset($_POST["email"])) {
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

        $sql = "SELECT * FROM user " .
                "WHERE UserName='$username'";
        $sql2 = "SELECT * FROM user " .
                "WHERE Email='$email'";
        $result = mysqli_query($connection, $sql);
        $result2 = mysqli_query($connection, $sql2);

        $num_rows = mysqli_num_rows($result);
        $num_rows2 = mysqli_num_rows($result2);
        
        if ($num_rows > 0 || $num_rows2 > 0) {
            echo "<script>alert('Username or email existed. Please try again.');window.location.href='index.php';</script>";
        } else if ($num_rows == 0 && $num_rows2 == 0) {
             $passwordFromPost=$password;
             $password=password_hash($passwordFromPost,PASSWORD_BCRYPT);   
            $sql = "INSERT INTO user " .
                    "(UserName,Email,Password,Admin) " .
                    "VALUES('$username','$email','$password','No')";
            if ($result = mysqli_query($connection, $sql)) {
                $_SESSION["USERNAME"] = $username;

                //Source : https://github.com/Synchro/PHPMailer
                require 'PHPMailer/PHPMailerAutoload.php';

                //Create a new PHPMailer instance
                $mail = new PHPMailer;
                //Tell PHPMailer to use SMTP
                $mail->isSMTP();
                //Enable SMTP debugging
                // 0 = off (for production use)
                // 1 = client messages
                // 2 = client and server messages
                $mail->SMTPDebug = 0;
                //Ask for HTML-friendly debug output
                $mail->Debugoutput = 'html';
                //Set the hostname of the mail server
                $mail->Host = 'smtp.gmail.com';
                //Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
                $mail->Port = 587;
                //Set the encryption system to use - ssl (deprecated) or tls
                $mail->SMTPSecure = 'tls';
                //Whether to use SMTP authentication
                $mail->SMTPAuth = true;
                //Username to use for SMTP authentication - use full email address for gmail
                $mail->Username = "sit.hobby.point@gmail.com";
                //Password to use for SMTP authentication
                $mail->Password = "12345abc12345";
                //Set who the message is to be sent from
                $mail->setFrom('sit.hobby.point@gmail.com', 'Admin');
                //Set who the message is to be sent to
                $mail->addAddress($email, $username);
                // Set email format to HTML
                $mail->isHTML(true);
                //Set the subject line
                $mail->Subject = 'Registration Successful!';
                $mail->Body = "<p>Registration was successful. Your details as follow:</p>" .
                        "<p>Username: $username </p>" .
                        "<p>Thank you.</p>";

                //send the message, check for errors
                if (!$mail->send()) {
                    echo "Mailer Error: " . $mail->ErrorInfo;
                } else {
                    mysqli_free_result($result);
                    mysqli_close($connection);
                    header('Location: registeredSuccess.php');
                }
            }
        }
    }
}
?>