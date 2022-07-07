<?php

include_once "../api/base.php";

$pdo = pdo();

// $dsn="mysql:host=localhost;charset=utf8;dbname=vote";
// $pdo=new PDO($dsn,'root','');

$pw=md5($_POST['pw']);


$sql= "UPDATE `users` SET `pw` = '$pw' WHERE `users`.`acc` = '{$_POST['acc']}' AND `email` = '{$_POST['email']}'";

$pdo->exec($sql);
echo $sql;

// to('login.php');
header("location:./reset_ok.php")

?>