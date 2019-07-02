<?php

// $data = $_POST['inp_name'];

// echo $data;

// if(strlen($data)) {
// 	echo 'success';
// } else {
// 	echo 'error';
// }

require_once 'db.php';

$firstname = $_POST['val0'];
$lastname = $_POST['val1'];
$email = $_POST['val2'];
$password = $_POST['val3'];

// $login = $_POST['login'];
// $pwd = $_POST['pwd'];

if(!empty($firstname) && !empty($lastname) && !empty($email) && !empty($password)){
    // echo 'success';
    $sql = 'INSERT INTO productusers(firstname, lastname, email, password) VALUES(:firstname, :lastname, :email, :password)';
    $params = [ ':firstname' => $firstname, ':lastname' => $lastname, ':email' => $email, ':password' => $password ];

    $stmt = $pdo->prepare($sql);
    $stmt->execute($params);

    echo 'вы успешно зарегестрировались';

} else {
    echo 'заполните все поля';
};

// if(!empty($login) && !empty($pwd)){
// 	$sql = 'INSERT INTO users(login, password) VALUES(:login,:pwd)';
// 	$params = [ 'login' => $login; ':pwd' => $pwd ];

// 	$stmt = $pdo->prepare($sql);
// 	$stmt->execute($params);

// 	echo 'вы успешно зарегестрировались';

// } else {
// 	echo 'заполните все поля';
// };

?>