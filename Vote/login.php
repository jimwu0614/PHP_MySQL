<?php include_once "./api/base.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="./css/basic.css">
    <link rel="stylesheet" href="./css/login.css">
    <style>

    </style>
</head>

<body>
    <div id="header">
        <?php
        include "./layout/header.php";
        ?>
    </div>
    <?php

    if (isset($_GET['error'])) {
        echo "<h2 style='color:red;text-align:center'>{$_GET['error']}</h2>";
    }
    ?>
    <div class="img">
        <div class="login-box">
            <h2>Login</h2>
            <form action="/login/chk_login.php" method="POST">
                <div class="user-box">
                    <input type="text" name="" required="">
                    <label>Username</label>
                </div>
                <div class="user-box">
                    <input type="password" name="" required="">
                    <label>Password</label>
                </div>
                <div class='btns'>
                    <input type="submit" value="submit" class="but">
                    <input type="reset" value="reset" class="but">
                </div>
            </form>

        </div>
    </div>

</body>

</html>