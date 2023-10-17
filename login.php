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
        <form class="form" id="login">
            <h1 class="form__title">Login</h1>
            <div class="form__message form__message--error"></div>
            <div class="form__input-group">
                <input type="text" class="form__input" autofocus placeholder="Username" required>
                <div class="form__input-error-message"></div>
            </div>
            <div class="form__input-group">
                <input type="password" class="form__input" placeholder="Password" required>
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