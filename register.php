<?php

    if(isset($_POST['submitButton'])) {
        $firstName = sanitizeFormString($_POST['firstName']);
    }

    function sanitizeFormString($inputText) {
        $inputText = strip_tags($inputText); //remove html characters
        $inputText = str_replace(" ", "", $inputText); // remove unwanted spaces
        $inputText = strtolower($inputText);
        $inputText = ucfirst($inputText);
        return $inputText;
    }


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Netflix</title>

    <link rel="stylesheet" type="text/css" href="assets/style/style.css"/>

</head>
<body>
    <div class="signin__container">
        <div class="column">

            <div class="header">
                <img src="assets/img/logo.png" alt="logo" title="logo">
                <h3>Sign Up</h3>
                <span>to continue to Netflix</span>
            </div>

            <form action="" method="POST">

                <input type="text" name="firstName" placeholder="first name" required>
                <input type="text" name="lastName" placeholder="last name" required>
                <input type="text" name="username" placeholder="username" required>
                <input type="email" name="email" placeholder="email" required>
                <input type="email" name="email2" placeholder="confirm email" required>
                <input type="password" name="password" placeholder="password" required>
                <input type="password" name="password2" placeholder="confirm password" required>
                <input type="submit" name="submitButton" value="SUBMIT">
            </form>

            <a href="login.php" class="signin__message">Already have an account? Sign in here</a>

        </div>
    </div>
</body>
</html>