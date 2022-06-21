<?php
include_once "base.php";

save ('types',['name' => $_POST['name']]);

header("location:../back.php");
?>