<!-- 投票首頁 -->

<?php


$p = "";
if (isset($_GET['p'])) {
    $p = "&p={$_GET['p']}";
}
$querystr = "";
if (isset($_GET['order'])) {
    $querystr = "&order={$_GET['order']}&type={$_GET['type']}";
}

$queryfilter = "";
if (isset($_GET['filter'])) {
    $queryfilter = "&filter={$_GET['filter']}";
}


?>
<header>
    <label style="text-align: left;" for="types">Voting Type</label>
    <label style="text-align: right;">Order</label>
    <!-- 主題分類選單 -->
    <div style="text-align: left;">
        <select name="types" id="types" onchange="location.href=`?filter=${this.value}<?= $p; ?><?= $querystr; ?>`">
            <option value="0">ALL</option>
            <?php
            $types = all("types");
            foreach ($types as $type) {
                $selected = (isset($_GET['filter']) && $_GET['filter'] == $type['id']) ? 'selected' : '';
                echo "<option value='{$type['id']}' $selected>";
                echo $type['name'];
                echo "</option>";
            }
            ?>
        </select>
        <!-- 主題分類選單結束 -->
    </div>


    <!-- 表頭排序區 -->

    <div class="order">
        <b>
            <?php
            if (isset($_GET['type']) && $_GET['type'] == 'asc') {
            ?>
                <div>
                    <a href="?order=multiple&type=desc<?= $p; ?><?= $queryfilter; ?>">
                        <i class="fa-solid fa-circle-dot"></i>
                        <span class="navTex">Single</span>
                    </a>
                </div>
            <?php
            } else {
            ?>
                <div>
                    <a href="?order=multiple&type=asc<?= $p; ?><?= $queryfilter; ?>">
                        <i class="fa-solid fa-square-check"></i>
                        <span class="navTex">Multiple</span>
                    </a>
                </div>
            <?php
            }
            ?>
            <?php
            if (isset($_GET['type']) && $_GET['type'] == 'asc') {
            ?>
                <div>
                    <a href="?order=end&type=desc<?= $p; ?><?= $queryfilter; ?>">
                        <i class="fa-solid fa-calendar"></i>
                        <span class="navTex">Duration</span>
                    </a>
                </div>
            <?php
            } else {
            ?>
                <div>
                    <a href="?order=end&type=asc<?= $p; ?><?= $queryfilter; ?>">
                        <i class="fa-solid fa-calendar"></i>
                        <span class="navTex">Duration</span>
                    </a>
                </div>
            <?php
            }
            ?>
            <?php
            if (isset($_GET['type']) && $_GET['type'] == 'asc') {
            ?>
                <div>
                    <a href="?order=remain&type=desc<?= $p; ?><?= $queryfilter; ?>">
                        <i class="fa-solid fa-hourglass"></i>
                        <span class="navTex">Time Left</span>
                    </a>
                </div>
            <?php
            } else {
            ?>
                <div>
                    <a href="?order=remain&type=asc<?= $p; ?><?= $queryfilter; ?>">
                        <i class="fa-solid fa-hourglass"></i>
                        <span class="navTex">Time Left</span>
                    </a>
                </div>
            <?php
            }
            ?>
            <?php
            if (isset($_GET['type']) && $_GET['type'] == 'asc') {
            ?>
                <div>
                    <a href='?order=total&type=desc<?= $p; ?><?= $queryfilter; ?>'>
                        <i class="fa-solid fa-users"></i>
                        <span class="navTex">Hit</span>
                    </a>
                </div>
            <?php
            } else {
            ?>
                <div>
                    <a href='?order=total&type=asc<?= $p; ?><?= $queryfilter; ?>'>
                        <i class="fa-solid fa-users"></i>
                        <span class="navTex">Hit</span>
                    </a>
                </div>
            <?php
            }
            ?>
        </b>
    </div>
    <!-- 表頭排序區結束 -->
</header>


<ul id='voteList'>
    <?php
    //偵測是否需要排序
    $orderStr = '';
    if (isset($_GET['order'])) {
        $_SESSION['order']['col'] = $_GET['order'];
        $_SESSION['order']['type'] = $_GET['type'];

        if ($_GET['order'] == 'remain') {
            $orderStr = " ORDER BY DATEDIFF(`end`,now()) {$_SESSION['order']['type']}";
        } else {
            $orderStr = " ORDER BY `{$_SESSION['order']['col']}` {$_SESSION['order']['type']}";
        }
    }
    //使用all()函式來取得資料表subjects中的所有資料，請參考base.php中的函式all($table,...$arg)

    /**建立分頁所需的變數群
     * 
     * 
     * 
     */

    $filter = [];
    if (isset($_GET['filter'])) {
        if (!$_GET['filter'] == 0) {
            $filter = ['type_id' => $_GET['filter']];
        }
    }

    $total = math('subjects', 'count', 'id', $filter);
    $div = 3;  // 一頁顯示幾筆
    $pages = ceil($total / $div);  //判斷有幾頁
    $now = isset($_GET['p']) ? $_GET['p'] : 1;
    $start = ($now - 1) * $div;
    $page_rows = " limit $start,$div";


    $subjects = all('subjects', $filter, $orderStr . $page_rows);

    /*  
    177~202   為 $subjects 加上all ()
        if(!empty($arg[0])){
            //第一個參數必須為陣列，使用迴圈來建立條件語句的陣列
            foreach($arg[0] as $key =>$value){
                
                $tmp[]="`$key`='$value'";
                
            }
            
            //將條件語句的陣列使用implode()來轉成字串，最後再接上第二個參數(必須為字串)
            $sql.=" WHERE ". implode(" AND " ,$tmp) . $arg[1];
        }else{
            $sql.=$arg[1];
        }
    break;

    //執行連線資料庫查詢並回傳sql語句執行的結果
   

    //fetchAll()加上常數參數FETCH_ASSOC是為了讓取回的資料陣列中
    //只有欄位名稱,而沒有數字的索引值

    // echo $sql;
    // echo "base.php 80行";

    return $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);*/


    
    ?>

    <?php
    //使用迴圈將每一筆資料的內容顯示在畫面上
    foreach ($subjects as $subject) {
    ?>

        <a href='?do=vote_result&id=<?= $subject['id'] ?>'>
            <li id='voteList-items'>
                <!-- 投票名稱 -->
                <div><?= $subject['subject'] ?></div>
    <?php
                if ($subject['multiple'] == 0) {
    ?>
                    <div class='text-center'>單選題</div>
    <?php
                } else {
    ?>
                    <div class='text-center'>複選題</div>
                <?php
                }
    ?>


                <!-- 時間 -->
                <div class='text-center'>
                    <?= $subject['start'] . " ~ " . $subject['end'] ?>
                </div>
                <div class='text-center'>


                <!-- 剩餘天數 -->
    <?php
                //計算剩餘天數
                $today = strtotime("now");
                $end = strtotime($subject['end']);
                if (($end - $today) > 0) {
                    $remain = floor(($end - $today) / (60 * 60 * 24));
    ?>
                <p>倒數<?= $remain ?>天結束</p>
    <?php
                    } else {
    ?>
                <span style='color:grey'>投票已結束</span>
    <?php
                    }
    ?>
                </div>

                <!-- 人數 -->
                <div class='text-center'>
                    <?= $subject['total'] ?>
                </div>
            </li>
        </a>
    <?php
    }

    ?>
</ul>
<div class="text-center">
    <?php
    //顯示頁數
    if ($pages > 1) {
        for ($i = 1; $i <= $pages; $i++) {

            echo "<a href='?p={$i}{$querystr}{$queryfilter}'>&nbsp;";
            echo $i;
            echo "&nbsp;</a>";
        }
    }

    ?>
</div>