<?php

$driver = 'mysql';
$host = 'localhost';
$db_name = 's';
$db_user = 'admin';
$db_pass = '123';
$charset = 'utf8';
$options = [PDO::ATTR_ERRMODE => PDO:: ERRMODE_EXCEPTION];

try{
	$pdo = new PDO("$driver:host=$host;dbname=$db_name;charset=$charset", $db_user, $db_pass, $options);
}catch(PDOException $e){
	die('не могу подключится к базе данных');
}

// $result = $pdo->query('SELECT * FROM films');

// while( $row = $result->fetch(PDO::FETCH_ASSOC) ) {
// 	echo 'Фильм ' . $row['name'] . ' жанр ' . $row['genre'] . ' длится ' . $row['duration'] . '<br>';
// }












?>