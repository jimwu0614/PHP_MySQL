<?php include_once "./api/base.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VotingCenter</title>
    <!--使用拆分css檔案的方式來區分共用的css設定及前後台不同的css-->
    <link rel="stylesheet" href="./css/basic.css">
    <link rel="stylesheet" href="./css/slider.css">
    <link rel="stylesheet" href="./css/front.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.css" integrity="sha512-1hsteeq9xTM5CX6NsXiJu3Y/g+tj+IIwtZMtTisemEv3hx+S9ngaW4nryrNcPM4xGzINcKbwUJtojslX2KG+DQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <!-- 頁首輪播器 -->
    <div id="header">
        <?php
        include "./layout/header.php";
        ?>
    </div>

    <!-- 選單 -->
    <section>
        <nav class="navbar">
            <ul>
                <?php
                //會員身分分流
                if (isset($_SESSION['name'])) {
                ?>

                    <li class="iconList">
                        <a href="./index.php">
                            <span class="icon"><i class="fa-solid fa-check-to-slot"></i></span>
                            <span class="navTex"> Voting</span>
                        </a>
                    </li>
                    <li class="iconList">
                        <a href=".login/member.php">
                            <span class="icon"><i class="fa-solid fa-user"></i></span>
                            <span class="navTex"> Member Center</span>
                        </a>
                    </li>
                    <li class="iconList">
                        <a href="./login/logout.php">
                            <span class="icon"><i class="fa-solid fa-right-from-bracket"></i></span>
                            <span class="navTex"> Logout</span>
                        </a>
                    </li>

                <?php
                } else {
                ?>

                    <li class="iconList">
                        <a href="./login.php">
                            <span class="icon"><i class="fa-solid fa-check-to-slot"></i></span>
                            <span class="navTex"> Voting</span>
                        </a>
                    </li>
                    <li class="iconList">
                        <a href="./login.php">
                            <span class="icon"><i class="fa-solid fa-user"></i></span>
                            <span class="navTex"> Member Center</span>
                        </a>
                    </li>
                    <li class="iconList">
                        <a href="./login.php">
                            <span class="icon"><i class="fa-solid fa-right-to-bracket"></i></span>
                            <span class="navTex"> Login</span>
                        </a>
                    </li>

                <?php
                }
                ?>

            </ul>
        </nav>
        <!-- 主頁 -->
        <div class="container">
            <?php
            //把別的頁面顯示於container,同iframe
            if (isset($_GET['do'])) {
                $file = './front/' . $_GET['do'] . ".php";
            }
            if (isset($file) && file_exists($file)) {
                include $file;
            } else {
                include "./front/vote_list.php";
            }
            ?>
        </div>
        <div>
            <?php include "./layout/footer.php"; ?>
        </div>
    </section>
</body>

</html>