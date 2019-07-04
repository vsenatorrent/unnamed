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
<div class="container">
    <div class="wrapper">
        <div class="error">
            <span class="error__text">
                Incorrect username or password. 
            </span>
            <span class="error__close">	&times;</span>            
        </div>
        <form class="form login-form">
            <span class="form__icon form__email">
                <input type="email" placeholder="Email address" class="form__input login-form__input" value="<?php if(isset($_COOKIE['email'])){echo $_COOKIE['email'];}; ?>">
            </span>
            <span class="form__icon form__password">
                <input type="password" placeholder="Password" class="form__input login-form__input" value="<?php if(isset($_COOKIE['password'])){echo $_COOKIE['password'];}; ?>">
            </span>
            <input type="submit" value="Sign In" class="form__submit login-form__submit">
        </form>
        <div class="sign-question">
            <b class="sign-question__text">
                New to our site?
            </b>
            <a href="index.php" class="sign-question__link">Create an account.</a>
        </div>
    </div>
    <!-- bg animation start -->
    <ul class="circles">
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
    </ul>
    <!-- bg animation end -->
</div>
    <script src="main.js"></script>
</body>

</html>