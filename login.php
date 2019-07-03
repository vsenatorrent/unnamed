<?php 

require_once 'db.php';

$email = $_POST['email'];
$password = $_POST['password'];

if(!empty($email) && !empty($password)){
    $sql = 'SELECT * from users WHERE users.email = :email and users.password = :password';
    
    $params = [ ':email' => $email,  ':password' => $password ];

    $stmt = $pdo->prepare($sql);
    $stmt->execute($params);

    $user = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $arrLen = sizeof($user);

    if($arrLen > 0) {
        echo 'успешно';
    } else {
        echo 'неверный логин или пароль';
    }
} else {
    echo 'заполните все поля';
}

?>