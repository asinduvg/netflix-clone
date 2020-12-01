<?php

if (isset($_POST['submitButton'])) {
    echo 'Form was submitted!';
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
                <h3>Sign In</h3>
                <span>to continue to Netflix</span>
            </div>

            <form action="" method="POST">
                <input type="text" name="username" placeholder="username" required>
                <input type="password" name="password" placeholder="password" required>
                <input type="submit" name="submitButton" value="SUBMIT">
            </form>

            <a href="register.php" class="signin__message">Need an account? Sign up here</a>

        </div>
    </div>
</body>
</html>
