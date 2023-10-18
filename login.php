<?php

# A checker to see if the username/password combo is valid
$is_invalid = false;

# If the submitted form is of type post, then run the php
if ($_SERVER["REQUEST_METHOD"] == "POST"){

    include 'config.php';
    $username = $_POST["username"];
    $password = $_POST["password"];

    # Find the user that the username section of the form is referring to
    $sql = "SELECT * FROM users WHERE username= ?";
    $stmt = $conn->stmt_init();
    if ( ! $stmt->prepare($sql)){
        die("SQL error: " . $conn->error);
    }
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    # If the user exists and the password is correct, start a session and set the global session "user" variable to the user's username
    if ($user) {

        if (password_verify($_POST["password"], $user["password_hash"])){
            
            session_start();
            
            $_SESSION["username"] = $user["username"];
            $_SESSION["loggedin"] = true;
            # Here we want to add where the page redirects the user after logging in.
            header("Location: controllers/read.php");
            exit;
        }
    }
    
    $is_invalid = true;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="The latest and hottest music rated by users of Your Music Rater!" />
    <title>Your Music Rater - Login</title>
    <!-- This is the blurb underneath search results -->
    <link rel="preload stylesheet" as="style" href="login.css"/>
    <link rel="stylesheet" href="iconfontstyle.css"/>   
</head>

<body>
    <!-- contains the form and the back button -->
    <div class="container">
        <a href="signup.php" class="back-button">Go back</a>
        <form class="form" action="login.php" method="post" id="login">
            <h1 class="form__title">Login</h1>

            <?php if ($is_invalid): ?>
            <div class="form__message form__message--error">Invalid login.</div>
            <?php endif; ?>

            <div class="form__input-group">
                <input type="text" 
                       class="form__input" 
                       id="username" 
                       name="username" 
                       autofocus 
                       placeholder="Username" 
                       value="<?= htmlspecialchars($_POST["username"] ?? "") ?>"
                       required>
                <div class="form__input-error-message"></div>
            </div>
            <div class="form__input-group">
                <input type="password" class="form__input" id="password" name="password" placeholder="Password" required>
                <div class="form__input-error-message"></div>
            </div>
            <button class="form__button" type = "submit"> Continue</button>
            <button class="form__button" type = "reset"> Reset</button>
            <p class="form__text">
                <a class="form__link" href="signup.php" id="linkCreateAccount">Don't have an account? Create an account!</a>
            </p>
        </form>
    </div>

</body>

</html>