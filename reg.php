<?php

require_once 'db.php';

$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$password = $_POST['password'];
$bday = $_POST['bday'];

if(!empty($firstname) && !empty($lastname) && !empty($email) && !empty($password)){

    $sql = 'SELECT * from users WHERE users.email = :email';
    
    $params = [ ':email' => $email ];

    $stmt = $pdo->prepare($sql);
    $stmt->execute($params);

    $user = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $arrLen = sizeof($user);
    if($arrLen > 0) {
        echo 'error'; // пользователь с таким email уже зарегестрирован
    } else {
         $sql = 'INSERT INTO users(firstname, lastname, email, password, bday) VALUES(:firstname, :lastname, :email, :password, :bday)';

        $params = [ ':firstname' => $firstname, ':lastname' => $lastname, ':email' => $email, ':password' => $password, ':bday' => $bday ];

        $stmt = $pdo->prepare($sql);
        $stmt->execute($params);

        // if($bday != '0-0-0') {
        //     $sql = 'UPDATE users SET bday = :bday WHERE users.email = :email';
        //     $params = [ ':bday' => $bday, ':email' => $email ];

        //     $stmt = $pdo->prepare($sql);
        //     $stmt->execute($params);
        // }
        setcookie('email', $email);
        setcookie('password', $password);
        echo 'success';
        // header('location: profile.php');
    }
} else {
    echo 'заполните все необходимые поля ';
};


?>