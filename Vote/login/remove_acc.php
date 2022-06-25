<?php

include_once "./api/base.php";

$id=$_GET['id'];
$sql="DELETE FROM `users` where `id`='$id'";
$pdo->exec($sql);

unset($_SESSION['user']);

header('location:index.php');

?>