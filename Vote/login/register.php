<div class="login-box">
    <h2>Register</h2>
    <form action="./login/add_member.php" method="post">

        <!-- 輸入區 -->
        <div class="user-box">
            <input type="text" name="acc" required>
            <label>Account</label>
        </div>

        <div class="user-box">
            <input type="password" name="pw" required>
            <label>Password</label>
        </div>

        <div class="user-box">
            <input type="text" name="name" required>
            <label>Name</label>
        </div>

        <div class="user-box">
            <input type="date" name="birthday" required>
            <label>Birthday</label>
        </div>

        <div class="user-box">
            <!-- <input type="text" name="gender" required=""> -->
            <select name="gender" id="">
                <option value="male">Male</option>
                <option value="female">Female</option>
            </select>
            <br>
            <br>
            <label>Gender</label>
        </div>

        <div class="user-box">
            <input type="text" name="addr" required>
            <label>Address</label>
        </div>

        <div class="user-box">
            <input type="email" name="email" required>
            <label>E-mail</label>
        </div>



        <!-- 按鈕 -->

        <div class='btns'>
            <button class="but" onclick="location.href='?do=add_member'">Submit</button>
            <!-- <input type="submit" value="Submit" class="but"> -->
            <input type="reset" value="Reset" class="but">
        </div>

        <div class="operate">
            <button type="button" onclick="location.href='?do=login'">Back</button>
        </div>

    </form>
</div>