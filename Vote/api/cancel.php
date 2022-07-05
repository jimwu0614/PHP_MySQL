<?php
include_once "./base.php";
pdo();

$cancel = $_POST['cancel'];

echo $cancel;

$sql= "UPDATE `subjects` SET `end` = '2022-01-01' WHERE `subjects`.`id` = $cancel";

$pdo->exec($sql);



to('../back.php?note=Vote Canceled');

?>