<?php 


include_once "../api/base.php";
// pdo();
// save('users' , );


$dsn="mysql:host=localhost;charset=utf8;dbname=vote";
$pdo=new PDO($dsn,'root','');

// $pw=md5($_POST['pw']);
$pw=$_POST['pw'];

$acc=$_POST['acc'];

$sql="INSERT INTO `users`(`acc` , `pw` , `name` , `birthday` , `gender` , `addr` , `email`)
                    values('{$_POST['acc']}' , '$pw' , '{$_POST['name']}' , '{$_POST['birthday']}' , '{$_POST['gender']}' , '{$_POST['addr']}' , '{$_POST['email']}');";


$pdo->exec($sql);

// header('location:login.php');
to('login.php');

?>