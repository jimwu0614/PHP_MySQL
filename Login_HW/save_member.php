<?php 


// $dsn="mysql:host=localhost;charset=utf8;dbname=member";
// $pdo=new PDO($dsn,'root','');

include_once "connect.php";


$acc=$_POST['acc'];

$sql="UPDATE `users`
      SET    `pw` = '',
             `birthday` = '{$_POST['birthday']}'
             `passsnote` = '{$_POST['passsnote']}'
             `email` = '{$_POST['email']}'
      WHERE  `id`='{$_POST['id']}'";


$pdo->exec($sql);

header('location:login.php');


?>

