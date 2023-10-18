<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    
    session_start();

    if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"]){
        header("Location: controllers/read.php");
    }

    $invalidusername = false;
    $takenusername = false;
    $invalidpassword = false;
    $invalidcpassword = false;

# Only do this stuff in the case that the request method of the form is post.
if($_SERVER["REQUEST_METHOD"] == "POST")
    {
    # Include connections to the database noted in config
    include 'config.php';

    $username = $_POST["username"];
    $password = $_POST["password"];
    $cpassword = $_POST["cpassword"];
    
    # Validation that username is between 3 and 20 characters.
    if (strlen($username) < 3 || strlen($username) > 20){
        $invalidusername = true;
    }

    # Validation that password is between 10 and 25 characters.
    if (strlen($password) < 10 || strlen($password) > 25){
        $invalidpassword = true;
    }

    # Validation that the password matches the confirm password.
    if ($password !== $cpassword) {
        $invalidcpassword = true;
    }

    # Validation that the username is not already taken, also by parameterizing the string from post, we prevent SQL injection.
    $sql = "SELECT * FROM users WHERE username= ?";
    $stmt = $conn->stmt_init();
    if ( ! $stmt->prepare($sql)){
        die("SQL error: " . $conn->error);
    }
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $num = mysqli_num_rows($stmt->get_result());
    if ($num !== 0){
        $takenusername = true;
    }

    $password_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);

    if (!$takenusername && !$invalidcpassword && !$invalidpassword && !$invalidusername){
        # This chunk of code prevents SQL Injection
        $sql = "INSERT INTO users (username, password_hash) VALUES (?, ?)";
        $stmt = $conn->stmt_init();
        if ( ! $stmt->prepare($sql)){
            die("SQL error: " . $conn->error);
        }
        $stmt->bind_param("ss", $username, $password_hash);
        $stmt->execute();

        # This will start a session and bring you to read.php.
        session_start(['cookie_lifetime' => 86400,]);
            
        $_SESSION["username"] = $username;
        $_SESSION["loggedin"] = true;

        # Here we want to add where the page redirects the user after logging in.
        header("Location: controllers/read.php");
        exit;
    }
    
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="The latest and hottest music rated by users of Your Music Rater!" />
    <title>Your Music Rater - Sign Up</title>
    <!-- This is the blurb underneath search results -->
    <link rel="preload stylesheet" as="style" href="login.css" />   
</head>

<body>
    <div class="container">
        <a href="index.php" class="back-button">Go back</a>
        <form class="form" action="signup.php" method="post" id="signup">
            <h1 class="form__title">Sign Up</h1>
            <div class="form__message form__message--error"></div>
            <div class="form__input-group">
                <label for="username"></label>
                <input type="text" class="form__input" id="username" name="username" autofocus placeholder="Username" required
                minlength="3" maxlength="20" >

                <?php if ($invalidusername): ?>
                <div class="form__input-error-message">Enter a username with 3 to 20 characters</div>
                <?php endif; ?>
                <?php if ($takenusername): ?>
                <div class="form__input-error-message">Username taken :(</div>
                <?php endif; ?>

            </div>
            <div class="form__input-group">
                <input type="password" class="form__input" id="password" name="password" placeholder="Password" required
                minlength="10" maxlength="25">

                <?php if ($invalidpassword): ?>
                <div class="form__input-error-message">Enter a password with 10 to 25 characters</div>
                <?php endif; ?>

            </div>
            <div class="form__input-group">
                <input type="password" class="form__input" id="cpassword" name="cpassword" placeholder="Confirm Password" required
                minlength="10" maxlength="25">

                <?php if ($invalidcpassword): ?>
                <div class="form__input-error-message">Make sure passwords match.</div>
                <?php endif; ?>

            </div>
            <button class="form__button" type = "submit"> Continue</button>
            <button class="form__button" type = "reset"> Reset</button>
            <p class="form__text">
                <a class="form__link" href="login.php" id="linkLogin">Already have an accout? Sign in!</a>
            </p>
        </form>
    </div>

</body>

</html>