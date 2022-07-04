<?php
include_once "./api/base.php";
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
    <label style="text-align: left;" for="types">Category</label>
    <label style="text-align: right;">Arrang By</label>
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
            if (isset($_GET['type']) && $_GET['type'] == 'desc') {
            ?>
                <div>
                    <a href="?order=multiple&type=asc<?= $p; ?><?= $queryfilter; ?>">
                        <i class="fa-solid fa-square-check"></i>
                        <span class="navTex">Multiple</span>
                    </a>
                </div>
            <?php
            } else {
            ?>
                <div>
                    <a href="?order=multiple&type=desc<?= $p; ?><?= $queryfilter; ?>">
                        <i class="fa-solid fa-circle-dot"></i>
                        <span class="navTex">Single</span>
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
                        <span class="navTex">Expire Day</span>
                    </a>
                </div>
            <?php
            } else {
            ?>
                <div>
                    <a href="?order=remain&type=asc<?= $p; ?><?= $queryfilter; ?>">
                        <i class="fa-solid fa-hourglass"></i>
                        <span class="navTex">Expire Day</span>
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
                        <span class="navTex">Total Vote</span>
                    </a>
                </div>
            <?php
            } else {
            ?>
                <div>
                    <a href='?order=total&type=asc<?= $p; ?><?= $queryfilter; ?>'>
                        <i class="fa-solid fa-users"></i>
                        <span class="navTex">Total Vote</span>
                    </a>
                </div>
            <?php
            }


            ?>
        </b>
    </div>
    <!-- 表頭排序區結束 -->
</header>
<?php
// //把一堆狗屎爛蛋運算丟去caculate.php  讓code好讀
// include "./front/caculate.php"

// 偵測是否需要排序
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

$filter = [];
if (isset($_GET['filter'])) {
	if (!$_GET['filter'] == 0) {
		$filter = ['type_id' => $_GET['filter']];
	}
}

// echo "orderStr=";
// echo $orderStr;
// ECHO "<br>";
// echo "queryfilter=";
// echo $queryfilter;
// ECHO "<br>";
// echo "P=";
// echo $p;

?>


<div class="table-box">
    <table>
        <thead>
            <th>Topic</th>
            <th>Single/Multiple</th>
            <th>Duration</th>
            <th>Remain</th>
            <th>Total Vote</th>
            <th>Edit</th>
        </thead>
    <?php
            //使用all()函式來取得資料表subjects中的所有資料，請參考base.php中的函式all($table,...$arg)
            // $subjects = all('subjects');

			$total = math('subjects', 'count', 'id', $filter);
			$div = 10;  // 一頁顯示幾筆
			$pages = ceil($total / $div);  //判斷有幾頁
			$now = isset($_GET['p']) ? $_GET['p'] : 1;
			$start = ($now - 1) * $div;
			$page_rows = " limit $start,$div";
			
			
			$subjects = all('subjects', $filter, $orderStr . $page_rows);


            
            //使用迴圈將每一筆資料的內容顯示在畫面上
            foreach ($subjects as $subject) {

                //給"剩餘天數"欄位使用的計算式
            $today = strtotime("now");
            $end = strtotime($subject['end']);
    ?>

            <tr>
            <!-- 投票名 -->
            <td><a class="topic" href="index.php?do=vote_result&id=<?=$subject['id']?>"><?=$subject['subject']?></a></td>

        <!-- 單複選題 -->
    <?php
        if ($subject['multiple'] == 0) {
    ?>
        
            <td>Single</td>
        
    <?php
        }else{
    ?>
        
            <td>Mulitiple</td>
        
    <?php
        }
    ?>

        <!-- 投票期間 -->
        
            <td><?=$subject['start']?> ~ <?=$subject['end'];?></td>
        

        <!-- 剩餘天數 -->
    <?php
        if (($end - $today) > 0) {
            $remain = floor(($end - $today) / (60 * 60 * 24));
    ?>
        
            <td><?=$remain?>Day(s) Ramaining</td>
        
    <?php
        }else{
    ?>
        
            <td style="color: crimson;">Vote Expired</td>
        
    <?php
        }
    ?>
        <!-- 投票人數 -->
        
            <td><?=$subject['total']?></td>
        

        <!-- 操作 -->
        
            <td>
                <a class='edit' href=?do=edit&id=<?$subject['id']?>Edit</a>
                <a class='del'  href=?do=del&id=<?$subject['id']?>Delete</a>
            </td>
        </tr>

    <?php
        //foreach結束
        }
    ?>
    </table>

    <?php



    //算頁數

    $filter = [];
    if (isset($_GET['filter'])) {
        if (!$_GET['filter'] == 0) {
            $filter = ['type_id' => $_GET['filter']];
        }
    }




	

    ?>


    <div class="page">
    <?php
        //顯示頁數
        if ($pages > 1) {
            for ($i = 1; $i <= $pages; $i++) {
    
                echo "<a href='?p={$i}{$querystr}{$queryfilter}'>&nbsp;";
                echo $i;
                echo "&nbsp;</a>";
                // echo $p;
            }
        }
    
    ?>
    </div>
</div>