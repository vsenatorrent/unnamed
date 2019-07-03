<?php 
    if(isset($_COOKIE['email']) && isset($_COOKIE['password'])){
        // unset($_COOKIE['email']);
        // unset($_COOKIE['password']);
        setcookie('email', '', time() - 42000);
        setcookie('password', '', time() - 42000);
        header('location: index.php');
    };
?>