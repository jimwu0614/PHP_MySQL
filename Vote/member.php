<?php
include_once "./api/base.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Member Center</title>
    <link rel="stylesheet" href="./css/basic.css">
    <link rel="stylesheet" href="./css/slider.css">
    <link rel="stylesheet" href="./css/member.css">
</head>

<body>
    <div id="header">
        <?php
        include "./layout/header.php";
        ?>
    </div>
    <nav>
        <a href="./login/logout.php">Logout</a>
        <a href="./index.php">VotingCenter</a>
    </nav>

    <div class="login-box" >
        <h1>Member Center</h1>

        <h2>Welcome<?= $_SESSION['name'] ?></h2>
        <?php
        $sql = "select * from `users` where acc='{$_SESSION['name']}'";
        $user = $pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
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
    <div>
        <?php include "./layout/footer.php"; ?>
    </div>
</body>

</html>