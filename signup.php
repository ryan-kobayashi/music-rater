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
        <a href="index.html" class="back-button">Go back</a>
        <form class="form" id="signup">
            <h1 class="form__title">Sign Up</h1>
            <div class="form__message form__message--error"></div>
            <div class="form__input-group">
                <input type="text" class="form__input" autofocus placeholder="Username" required
                minlength="3" maxlength="20" >
                <div class="form__input-error-message"></div>
            </div>
            <div class="form__input-group">
                <input type="password" class="form__input" placeholder="Password" required
                minlength="10" maxlength="25">
                <div class="form__input-error-message"></div>
            </div>
            <div class="form__input-group">
                <input type="password" class="form__input" placeholder="Confirm Password" required
                minlength="10" maxlength="25">
                <div class="form__input-error-message"></div>
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