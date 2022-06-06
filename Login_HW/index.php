<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>問券系統</title>
    <style>
        nav{
            width: 900px;
            margin: auto;
            text-align: right;
        }
    </style>
</head>
<body>
<nav>
    <a href="login.php">登入</a>
</nav>    
<h1>問券</h1>

<?php

// $dsn="mysql:host=localhost;chatset=utf8;dbname=member";
// $pdo=new PDO($dsn,'root','');

include_once "connect.php";


$sql= "select * from `users` ";


$users= $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);

foreach ($users as $user) {
    echo $user['acc']."<br>";

}



?>






</body>
</html>