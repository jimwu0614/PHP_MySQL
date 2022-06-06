<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>註冊會員</title>
</head>
<body>
    <h1>註冊會員</h1>
    <form action="register.php" method="post">
        <table>
            <tr>
                <td>帳號</td>
                <td><input type="text" name="acc"></td>
            </tr>
            <tr>
                <td>密碼</td>
                <td><input type="password" name="pw" id=""></td>
            </tr>
            <tr>
                <td>生日</td>
                <td><input type="date" name="birthday" id=""></td>
            </tr>
            <tr>
                <td>密碼提示</td>
                <td><input type="text" name="passnote" id=""></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input type="email" name="email" id=""></td>
            </tr>
        </table>
        <div>
            <input type="submit" value="註冊"><input type="reset" value="送出">
        </div>
    </form>
</body>
</html>