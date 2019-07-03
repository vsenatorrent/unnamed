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
    //
};
?>
<body>
    <div class="wrapper">
        <form class="reg-form reg-form--index">
            <span class="reg-form__icon reg-form__name">
                <input type="text" placeholder="First name *" class="reg-form__input reg-form__firstname" required data-value="firstname">
            </span>
            <span class="reg-form__icon reg-form__name">
                <input type="text" placeholder="Last name *" class="reg-form__input" required data-value="lastname">
            </span>
            <span class="reg-form__icon reg-form__email">
                <input type="email" placeholder="Email address *" class="reg-form__input" required data-value="email">
            </span>
            <span class="reg-form__icon reg-form__password">
                <input type="password" placeholder="Password *" class="reg-form__input" required data-value="password">
            </span>
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
            <input type="submit" value="sign up" class="reg-form__submit">
            
        </form>
        <!-- <div class="reg-form__login">
            <span class="reg-form__question">Already have an account?</span>
            <a href="login.html" class="reg-form__link">Log in</a>
        </div> -->

        <div class="register">
            <b class="register__text">
                Already have an account?
            </b>
            <a href="login-page.php" class="register__link">Log in</a>
        </div>
    </div>
    <script src="main.js"></script>
</body>

</html>