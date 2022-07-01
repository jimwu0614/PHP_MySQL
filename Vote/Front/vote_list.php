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

<?php
//把一堆狗屎爛蛋運算丟去caculate.php
include "./front/caculate.php"
?>
<!-- 投票表身 -->
<article>
    <?php
        //使用迴圈將每一筆資料的內容顯示在畫面上
        foreach ($subjects as $subject) {
            ?>
    
    <div class="card" >
        <div class="contentBox">
            <div class="content">
                <h2><?= $subject['subject'] ?><br><span><?= $subject['typename'] ?></span></h2>
                    <div class="imgBox">
                        <figcaption class="fig1">Bryce Canyon, Utah, United States</figcaption>
                        <img src="./img/<?= $subject['typename'] ?>.png" alt="">
                        <figcaption class="fig2">Bryce Canyon, Utah, United States</figcaption>
                    </div>
                    <button class="btn1" onclick="location.href='?do=vote&id=<?= $subject['id'] ?>'">Vote Now</button>
                    <button class="btn2" onclick="location.href='?do=vote_result&id=<?= $subject['id'] ?>'"> vote result</button>
                    <!-- <a href='?do=vote_result&id=<?= $subject['id'] ?>'> -->
                    
            </div>
        </div>
        <div class="toggle" >
            <span></span>
        </div>
    </div>
        
        
        
            <?php
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
            }
        }
    
        ?>
    </div>
    <script>

    </script>
</article>