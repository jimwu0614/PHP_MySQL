<?php 


// $dsn="mysql:host=localhost;charset=utf8;dbname=member";
// $pdo=new PDO($dsn,'root','');

include_once "../api/base.php";
$pw=md5($_POST['pw']);

$acc=$_POST['acc'];

$sql="INSERT INTO `users`(`acc` , `pw` , `birthday` , `gender` , `email`)
                    values('{$_POST['acc']}' , '$pw' , '{$_POST['birthday']}' , '{$_POST['gender']}' , '{$_POST['email']}');";


$pdo->exec($sql);

header('location:login.php');


?>