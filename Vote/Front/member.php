<?php
include_once "./api/base.php";
?>
    <div class="login-box" >
        <?php
        //從user 資料表內撈資料
        //以帳號為依據  (WHERE)

        

        $sql = "SELECT * FROM `users` WHERE acc='{$_SESSION['acc']}'";
        $user = $pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
        ?>
        <h1>Member Center</h1>
        <h2>Welcome  <span style="font-weight: 900;color: violet;"><?= $user['name'] ?></span></h2>
        
        <?php
        echo "<hr><br>";
        echo 'ID number:' . $user['id'] . "<br><br>";
        echo 'Account:' . $user['acc'] . "<br><br>";
        echo 'Password:**********<br><br>';
        echo 'Name:' . $user['name'] . "<br><br>";
        echo 'Birthday:' . $user['birthday'] . "<br><br>";
        echo 'Gender:' . $user['gender'] . '<br><br>';
        echo 'Address:' . $user['addr'] . "<br><br>";
        echo 'E-mail:' . $user['email'] . "<br><br>";

        ?>
        <div class="btns">
            <!-- <a href='./login/edit.php?id=<?= $user['id']; ?>'><button>Edit</button></a> -->
            <button class="but" onclick="location.href='./login/edit.php?id=<?= $user['id']; ?>'">Edit</button>
            
            <button class="but" onclick="location.href='./index.php'">Back</button>
        </div>

        <!-- <form action='edit.php' method='post'>
        <input type="hidden" name="id" value="<?php //echo $user['id'];
                                                ?>">
        <input type="submit" value="編輯">
    </form> -->
        <!--  重新導向 -->
        <!-- <button onclick="location.href='edit.php?id=<?php //echo $user['id'];
                                                            ?>'">編輯</button> -->

    </div>

