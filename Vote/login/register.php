    <h1>Register</h1>
    <form action="./add_member.php" method="post" >
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
