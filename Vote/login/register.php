<div class="login-box">
    <h2>Register</h2>
    <form action="./add_member.php" method="post">

        <div class="user-box">
            <input type="text" name="acc" required="">
            <label>Username</label>
        </div>

        <div class="user-box">
            <input type="password" name="pw" required="">
            <label>Password</label>
        </div>

        <div class="user-box">
            <input type="date" name="birthday" required="">
            <label>Birthday</label>
        </div>

        <div class="user-box">
            <input type="text" name="gender" required="">
            <label>Gender</label>
        </div>

        <div class="user-box">
            <input type="text" name="gender" required="">
            <label>Gender</label>
        </div>

        <div class="user-box">
            <input type="email" name="email" required="">
            <label>E-mail</label>
        </div>

        <div class='btns'>
            <input type="submit" value="Submit" class="but">
            <input type="reset" value="Reset" class="but">
        </div>

        <div class="operate">
            <button onclick="location.href='?do=login'">Back</button>
        </div>

    </form>
</div>