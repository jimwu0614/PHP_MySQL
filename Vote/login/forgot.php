<div class="login-box">
    <h2>Reset Password</h2>
    <form action="./login/resetPW.php" method="post">
    
        <label style="color: #a6c0fe; font-size: 20px; font-weight: 900;">Enter Your Account</label>
        <input type="text" name="acc"><br>
        <label style="color: #a6c0fe; font-size: 20px; font-weight: 900;">Enter Your Email</label>
        <input type="email" name="email"><br>
        <label style="color: #a6c0fe; font-size: 19px; font-weight: 900;">Enter New Password</label>
        <input type="password" name="pw"><br>
        <!-- <input type="submit" value="檢查"> -->

        <div class="operate">
            <button onclick="location.href='?do=resetPW'">SUBMIT</button>
        </div>
        
        <div class="operate">
            <button type="button" onclick="location.href='?do=login'">Back</button>
        </div>

    </form>
</div>