<?php

include_once "./api/base.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voting_Menegement</title>
    <link rel="stylesheet" href="./css/basic.css">
    <link rel="stylesheet" href="./css/slider.css">
    <link rel="stylesheet" href="./css/aside.css">
    <link rel="stylesheet" href="./css/back_list.css">
    <link rel="stylesheet" href="./css/back_add.css">
    <!-- <link rel="stylesheet" href="./css/vote&result.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.css" integrity="sha512-1hsteeq9xTM5CX6NsXiJu3Y/g+tj+IIwtZMtTisemEv3hx+S9ngaW4nryrNcPM4xGzINcKbwUJtojslX2KG+DQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />



</head>

<body class="body">
    <!-- 頁首輪播器 -->
    <div id="header">
        <?php
        include "./layout/header.php";
        ?>
    </div>

    <section class="back_section" id="section" >
        <!-- 選單 -->
        <aside>
            <nav class="navbar">
                <ul>
                    <li class="list active" data-color="rgba(245, 59, 87, 0.7)">
                        <a href="./back.php?do=back_main">
                            <span class="icon"><i class="fa-solid fa-clipboard-list"></i></span>
                            <span class="navTex"> Check Vote</span>
                        </a>

                    </li>
                    <li class="list" data-color="rgba(15, 188, 249, 0.7)">
                        <a href="./back.php?do=add_vote">
                            <span class="icon"><i class="fa-solid fa-file-circle-plus"></i></span>
                            <span class="navTex">Add Vote</span>
                        </a>
                    </li>
                    <li class="list" data-color="rgba(5, 196, 91, 0.7)">
                        <a href="./login/logout.php">
                            <span class="icon"><i class="fa-solid fa-right-from-bracket"></i></span>
                            <span class="navTex"> Logout</span>
                        </a>
                    </li>
                    <div class="indicator"></div>
                </ul>
            </nav>
        </aside>
        <!-- 選單結束 -->
        <!-- 主顯示區 -->
        <article class="container">
            <?php
            //把別的頁面顯示於container,同iframe
            if (isset($_GET['do'])) {
                $file = './back/' . $_GET['do'] . ".php";
            }
            if (isset($file) && file_exists($file)) {
                include $file;
            } else {
                include "./back/back_main_list.php";
            }
            ?>
        </article>
        <!-- 主顯示區結束 -->
    </section>

    <footer id="footer">
        <?php include "./layout/footer.php"; ?>
    </footer>
    <script>
        //aside用的JS    
        //根據游標   圈圈換位置
        let list = document.querySelectorAll('li');
        for (let i = 0; i < list.length; i++) {
            list[i].onmouseover = function() {
                let j = 0;
                while (j < list.length) {
                    list[j++].className = 'list';
                }
                list[i].className = 'list active';
            }
        }
        // 根據indicator  切換外面的顏色
        list.forEach(elements => {
            elements.addEventListener('mouseenter', function(event) {
                let bg = document.querySelector('aside');
                let color = event.target.getAttribute('data-color');
                bg.style.backgroundColor = color;
            })
        })
    </script>

<?php
if (isset($_GET['error'])) {
    $alart = $_GET['error'];
    echo "<script>
    
    alert('$alart');
    
    </script>";
}
if (isset($_GET['note'])) {
    $alart2 = $_GET['note'];
    echo "<script>
    
    alert('$alart2');
    
    </script>";
}
?>

</body>
</html>