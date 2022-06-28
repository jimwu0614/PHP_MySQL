<?php
include_once "./api/base.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>會員中心</title>
</head>

<body>
    <nav>
        <a href="./logout.php">登出</a>
        <a href="../index.php">首頁</a>
    </nav>
    <h1>會員中心</h1>
    
    <h2>歡迎<?= $_SESSION['name'] ?></h2>
    <?php
    $sql = "select * from `users` where acc='{$_SESSION['name']}'";
    $user = $pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
    echo "<hr>";
    echo 'ID number:' . $user['id'] . "<br>";
    echo 'Account:' . $user['acc'] . "<br>";
    echo '密碼:**********<br>';
    echo 'Name:' . $user['name'] . "<br>";
    echo 'Birthday:' . $user['birthday'] . "<br>";
    echo 'Gender:' . $user['gender'] . '<br>';
    echo 'Address:' . $user['addr'] . "<br>";
    echo 'E-mail:' . $user['email'] . "<br>";

    ?>
    <a href='edit.php?id=<?=$user['id'];?>'><button>編輯</button></a>
 <!-- <form action='edit.php' method='post'>
        <input type="hidden" name="id" value="<?php //echo $user['id'];?>">
        <input type="submit" value="編輯">
    </form> -->
    <!--  重新導向 -->
    <!-- <button onclick="location.href='edit.php?id=<?php //echo $user['id'];?>'">編輯</button> -->
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    

</body>

</html>