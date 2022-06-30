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
    <link rel="stylesheet" href="./css/front.css">
    <link rel="stylesheet" href="./css/slider.css">
    <link rel="stylesheet" href="./css/aside.css">
    <link rel="stylesheet" href="./css/section.css">
    <link rel="stylesheet" href="./css/card.css">
    <link rel="stylesheet" href="./css/member.css">
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
        
        <aside>
            <nav class="navbar">
                <ul>
                    <?php
                    //會員身分分流
                    //有會員
                    if (isset($_SESSION['name'])) {
                    ?>
                        <li class="list active" data-color="rgba(245, 59, 87, 0.7)">
                            <a href="./index.php">
                                <span class="icon"><i class="fa-solid fa-check-to-slot"></i></span>
                                <span class="navTex">Go Voting</span>                                
                            </a>
                        </li>
                        <li class="list" data-color="rgba(15, 188, 249, 0.7)">
                            <a href="./index.php?do=member">
                                <span class="icon"><i class="fa-solid fa-user"></i></span>
                                <span class="navTex"> Member Center</span>
                            </a>
                        </li>
                        <li class="list" data-color="rgba(5, 196, 91, 0.7)">
                            <a href="./login/logout.php">
                                <span class="icon"><i class="fa-solid fa-right-from-bracket"></i></span>
                                <span class="navTex"> Logout</span>
                            </a>
                        </li>
                        <div class="indicator"></div>
                    <?php
                    } else {
                    // 無會員
                    ?>
                        <li class="list active" data-color="rgba(245, 59, 87, 0.7)">
                            <a href="./login.php">
                                <span class="icon"><i class="fa-solid fa-check-to-slot"></i></span>
                                <span class="navTex">Go Voting</span>
                            </a>
                        </li>
                        <li class="list" data-color="rgba(15, 188, 249, 0.7)">
                            <a href="./login.php" >
                                <span class="icon"><i class="fa-solid fa-user"></i></span>
                                <span class="navTex"> Member Center</span>
                            </a>
                        </li>
                        <li class="list" data-color="rgba(5, 196, 91, 0.7)">
                            <a href="./login.php" >
                                <span class="icon"><i class="fa-solid fa-right-to-bracket"></i></span>
                                <span class="navTex"> Login</span>
                            </a>
                        </li>
                        <div class="indicator"></div>
                    <?php
                    }
                    ?>
                </ul>
            </nav>
        </aside>
        <!-- 主頁顯示區 -->
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
        <!-- 主頁顯示區結束 -->
    </section>


    <footer>
        <?php include "./layout/footer.php"; ?>
    </footer>

<script>
    //aside用的JS    
        //根據游標   圈圈換位置
        let list = document.querySelectorAll('li');
        for(let i=0; i<list.length; i++){
            list[i].onmouseover = function(){
                let j = 0;
                while (j < list.length){
                    list[j++].className = 'list';
                }
                list[i].className = 'list active';
            }
        }
        // 根據indicator  切換外面的顏色
        list.forEach(elements => {
            elements.addEventListener('mouseenter',function(event){
                let bg = document.querySelector('aside');
                let color = event.target.getAttribute('data-color');
                bg.style.backgroundColor = color;
            })
        })

    //container.card用的JS
        //按下那個拉軸   card的class會變成 "card active"
        //再按一下  會變回"card"
        let card = document.querySelector('.card');
        let cardtoggle = document.querySelector('.toggle');
        cardtoggle.onclick = function () {
            card.classList.toggle('active');            
        }


</script>
</body>

</html>