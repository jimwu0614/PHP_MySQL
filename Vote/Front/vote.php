<!-- 投票中 -->

<?php
include_once "./api/base.php";

$subject = find("subjects", $_GET['id']);
$opts = all('options', ['subject_id' => $_GET['id']]);

/* dd($subject);
dd($opts); */
?>
<div class="container-box">
    <h1><?= $subject['subject']; ?></h1>
    <form action="./api/vote.php" method="post">
        <?php
        foreach ($opts as $opt) {
        ?>
            <div class="vote-item">
                <?php
                //若是單選題
                if ($subject['multiple'] == 0) {
                ?>
                    <label ><input type="radio" name="opt" value="<?= $opt['id']?>">&nbsp;&nbsp;&nbsp;<?= $opt['option']?></label>
                <?php
                //若是複選題
                } else {
                ?>
                    <label ><input type="checkbox" name="opt[]" value="<?= $opt['id']?>">&nbsp;&nbsp;&nbsp;<?= $opt['option']?></label>
                <?php
                }
                ?>
                
            </div>

        <?php
        }
        ?>
        <!-- 按鈕區 -->
        <div class="btns">
            <button class="but" type="submit">Vote</button>
            <button class="but" type="reset">Reset</button>
            <button class="but" type="button" onclick="location.href='?do=vote_result&id=<?= $subject['id'] ?>'">Back</button>
            <button class="but" type="button" onclick="location.href='./index.php'">Home</button>
        </div>
    </form>
</div>