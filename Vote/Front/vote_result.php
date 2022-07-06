<!-- 投票結果 -->
<?php
include "./api/caculate.php";
//如果沒有登入session    直接導向登入頁   
if (!isset($_SESSION['acc'])) {
    //header('location:/login.php');
    to('./login.php');
}

//                      $table
//base檔  SELECT * FROM subjects WHERE
                            //非陣列
$subject = find("subjects", $_GET['id']);


// echo "subject是";
// echo $subject;

            //從options資料表中撈資料
$opts = all("options", ['subject_id' => $_GET['id']]);


?>
<div class="container-box">
    <h1 ><?= $subject['subject']; ?></h1>
    <hr>
    <div>
        <div>Total Vote:<?= $subject['total']; ?></div>
        <table>
            <tr class="table_header">
                <td>Option</td>
                <td>Vote Counts</td>
                <td>Percentage</td>
            </tr>
            <?php
            foreach ($opts as $opt) {
                $total = ($subject['total'] == 0) ? 1 : $subject['total'];
                $rate = $opt['total'] / $total;
                
                //取到小數點第二位
                $rate2 = bcadd(0,$rate,4);

                //隨機數字 FOR 色碼
                $rand1 = rand(0,255);
                $rand2 = rand(0,255);
                $rand3 = rand(0,255);
            ?>
                <tr>
                    <td><?= $opt['option']; ?></td>
                    <td><?= $opt['total']; ?></td>
                    <td style="text-align: left;">
                        <!-- 長條圖 -->
                        <div style="display:inline-block;height:24px;background:rgb(<?=$rand1?>,<?=$rand2?>,<?=$rand3?>);width:<?= 300 * $rate; ?>px;"></div>
                        <?= ($rate2 * 100) . "%"; ?>
                    </td>
                </tr>
            <?php

            }
            ?>
        </table>

        <!-- 按鈕區 -->
        <div class="btns">
            
    <?php
                    //判斷投票是否過期
                        //若過期
                    if( (strtotime("now")) > (strtotime($subject['end'])) ){
    ?>
                    <button class="" style="background-color: crimson; color: white;">Vote Ended</button>
    <?php
                    //判斷是否有會員
                            //有會員  導向投票
                    }else if(isset($_SESSION['acc'])){
    ?>
                    <button class="but" onclick="location.href='?do=vote&id=<?= $subject['id'] ?>'">Vote Now</button>
    <?php
                    //若無會員  導向登入頁
                    }else{
    ?>
                    <button class="but" onclick="location.href='./login.php'">Vote Now</button>

    <?php
                    }
    ?>
        </div>

    </div>
</div>