<div class="login-box">
    <h2>Login</h2>
    <form action="./login/chk_login.php" method="POST">

        <div class="user-box">
            <input type="text" name="" required="">
            <label>Username</label>
        </div>

        <div class="user-box">
            <input type="password" name="" required="">
            <label>Password</label>
        </div>

        <div class='btns'>
            <input type="submit" value="Submit" class="but">
            <input type="reset" value="Reset" class="but">
        </div>

        <div class="operate">
            <!-- <p class="message"> <a href="./login/register.php">Not Registered?</a></p> -->
            <button onclick="location.href='?do=register'">Not Registered?</button> 
            <!-- <p class="message"> <br><a href="./login/forgot.php">Forget Password?</a></p> -->
            <br><button onclick="location.href='?do=forgot'">Forget Password?</button>
            <br><button onclick="location.href='./index.php'">Back</button>
        </div>

    </form>

</div>
