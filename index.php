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
<?php
    if(isset($_COOKIE['email']) && isset($_COOKIE['password'])){
        header('location: profile.php');
    };
?>
<body>

<div class="container">
    <div class="wrapper">
        <div class="error">
            <span class="error__text">
                Email is invalid or already taken.
            </span>
            <span class="error__close">	&times;</span>            
        </div>
        <form class="form reg-form">
            <span class="form__icon form__name">
                <input type="text" placeholder="First name *" class="form__input form__firstname" data-value="firstname" required>
            </span>
            <span class="form__icon form__name">
                <input type="text" placeholder="Last name *" class="form__input" data-value="lastname" required>
            </span>
            <span class="form__icon form__email">
                <input type="email" placeholder="Email address *" class="form__input" data-value="email" required>
            </span>
            <div class="password">
                <button class="password__show">show password</button>
                <span class="form__icon form__password">
                    <input type="password" placeholder="Password *" class="form__input password__input" data-value="password" required>
                </span>
            </div>
            <b class="birthday__text">Birthday</b>
            <div class="birthday">

                <select id="months" class="birthday__select birthday__select--months">
                    <option hidden default value="">Month</option>
                </select>
                <select id="days" class="birthday__select birthday__select--days">
                    <option hidden default value="">Day</option>
                </select>
                <select id="years" class="birthday__select birthday__select--years">
                    <option hidden default value="">Year</option>
                </select>
            </div>
            <input type="submit" value="sign up" class="form__submit">
            
        </form>
        <div class="sign-question">
            <b class="sign-question__text">
                Already have an account?
            </b>
            <a href="login-page.php" class="sign-question__link">Log in</a>
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