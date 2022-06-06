<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>登入</title>
</head>

<body>
    <?php

    if (isset($_GET['error'])) {
        echo "<h2 style='color:red;text-align:center'>{$_GET['error']}</h2>";
    }
    ?>
    <form action="chk_login.php" method="POST">
        <table>
            <tr>
                <td>帳號</td>
                <td><input type="text" name="" id=""></td>
            </tr>
            <tr>
                <td>密碼</td>
                <td><input type="password" name="" id=""></td>
            </tr>
            <tr>
                <td><a href="sign.php">註冊</a></td>
                <td><a href="forgot.php">忘記</a></td>
            </tr>
        </table>
        <div class='btns'>
            <input type="submit" value="登入">
            <input type="reset" value="重置">
        </div>
    </form>
</body>

</html>