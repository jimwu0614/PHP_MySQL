<div class="login-box">
    <h2>Login</h2>

    <?php
    if(!empty($_GET['error'])){
        echo "<h3 style='color:red;background-color: antiquewhite;'>{$_GET['error']}</h3>";
        echo "<br>";
    }
    ?>

    <form action="./login/chk_login.php" method="POST">

        <div class="user-box">
            <input type="text" name="acc" required="">
            <label>Username</label>
        </div>

        <div class="user-box">
            <input type="password" name="pw" required="">
            <label>Password</label>
        </div>

        <div class='btns'>
            <button class="but" onclick="location.href='?do=chk_login'">Login</button> 
            <!-- <input type="submit" value="Login" class="but"> -->
            <input type="reset" value="Reset" class="but">
        </div>

        <div class="operate">
            <!-- <p class="message"> <a href="./login/register.php">Not Registered?</a></p> -->
            <button onclick="location.href='?do=register'">Not Registered?</button> 
            <!-- <p class="message"> <br><a href="./login/forgot.php">Forget Password?</a></p> -->
            <br><button onclick="location.href='?do=forgot'">Forget Password?</button>
        </div>

        
        

    </form>

</div>
