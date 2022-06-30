<?php 


$dsn="mysql:host=localhost;charset=utf8;dbname=vote";
$pdo=new PDO($dsn,'root','');

// include_once "../api/base.php";

$pw=md5($_POST['pw']);
// $pw=$_POST['pw'];

$acc=$_POST['acc'];

$sql="UPDATE `users`
      SET    `pw` = '$pw' ,
             `name` = '{$_POST['name']}' ,
             `birthday` = '{$_POST['birthday']}' ,
             `addr` = '{$_POST['addr']}' ,
             `email` = '{$_POST['email']}'
      WHERE  `id`='{$_POST['id']}'";


$pdo->exec($sql);

echo $sql;


header('location:./change_ok.php');


?>

