<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>profile</title>
    <link rel="stylesheet" href="style.css">
    <script src="jquery.min.js"></script>
</head>
<body>
<?php 

require_once 'db.php';

if(isset($_COOKIE['email']) && isset($_COOKIE['password'])){
    $sql = 'SELECT * from users WHERE users.email = :email and users.password = :password';

    $params = [ ':email' => $_COOKIE['email'],  ':password' => $_COOKIE['password'] ];

    $stmt = $pdo->prepare($sql);
    $stmt->execute($params);

    $user = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $arrLen = sizeof($user);
    // echo $_COOKIE['email'];
    if($arrLen > 0) {
    ?>
        <h1 class="greeting"> hello, <?php echo $user[0]['firstname'] ?> </h1>
        <a href="exit.php" class="exit-button">exit</a>
    <?php
    } else {
        echo '??';
    }
} else {
        echo 'неверный логин или пароль';
}

?>
    <script src="main.js"></script>    
</body>
</html>