<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>index</title>
    <link rel="stylesheet" href="style.css">
    <script src="jquery.min.js"></script>
</head>

<body>

    <div class="wrapper">
        <form class="reg-form login-form">
            <span class="reg-form__icon reg-form__email">
                <input type="email" placeholder="Email address" class="reg-form__input login-form__input" data-value="email" value="<?php if(isset($_COOKIE['email'])){echo $_COOKIE['email'];}; ?>">
            </span>
            <span class="reg-form__icon reg-form__password">
                <input type="password" placeholder="Password" class="reg-form__input login-form__input" data-value="password" value="<?php if(isset($_COOKIE['password'])){echo $_COOKIE['password'];}; ?>">
            </span>
            <input type="submit" value="Sign In" class="reg-form__submit login-form__submit">
        </form>
        <div class="register">
            <b class="register__text">
                New to our site?
            </b>
            <a href="index.php" class="register__link">Create an account.</a>
        </div>
    </div>
    <script src="main.js"></script>
</body>

</html>