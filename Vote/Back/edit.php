<?php
include_once "./api/base.php";

$id = $_GET['id'];
$subj = find('subjects', $id);
$opts = all('options', ['subject_id' => $id]);
/* dd($subj);
dd($opts); */
?>


<div class="container-box edit_vote">

    <form action="./api/edit_vote.php" method="post" class="edit_form">
        <!-- 主題 -->
        <div>
            <label for="subject">投票主題：</label>
            <input type="text" name="subject" id="subject" value="<?= $subj['subject']; ?>">

        </div>

        <!-- 分類 -->
        <div>
            <select name="types" id="types">
                <?php
            $types = all("types");
            foreach ($types as $type) {
                $selected = ($subj['type_id'] == $type['id']) ? 'selected' : '';
                echo "<option value='{$type['id']}' $selected>";
                echo $type['name'];
                echo "</option>";
            }
            ?>
            </select>
        </div>

        <div style="padding-right: 60px">
                <!-- 投票有效時間 -->
                <label >Expires On：</label>
                <input type="date" name="end" value="<?= $subj['end']; ?>" required>
        </div>

        <!-- 單複選 -->
        <div id="selector">
            <input type="radio" name="multiple" value="0" <?= ($subj['multiple'] == 0) ? 'checked' : ''; ?>>
            <label>Single Choose</label>
            <input type="radio" name="multiple" value="1" <?= ($subj['multiple'] == 1) ? 'checked' : ''; ?>>
            <label>Multiple Choose</label>
        </div>

        <!-- 選項 -->
        <div id="options ">
            
            <p style="position: relative;left: 90px;width: 150px;font-size: 27px;">Answers</p>
            <?php
        foreach ($opts as $opt) {
            ?>
            <br>
            <input type="hidden" name="subject_id" value="<?= $subj['id']; ?>">
            <div style="margin: -10px auto">
                <label>Option：</label><input type="text" name="option[<?= $opt['id']; ?>]" value="<?= $opt['option']; ?>">
            </div>
            <?php
        }
        ?>
        </div>

        <input type="submit" value="Add Vote" id="submit" style="position: absolute;">
    </form>
    
    <!-- 取消投票 -->
    <form action="./api/cancel.php" method="post">
        <input type="hidden" value="<?=$id?>" name="cancel">
        
        <input type="submit" value="Cancel Vote" id="submit" class="cancel" style="    width: 200px;">
        <!-- <a id="submit" href="./api/cancel.php" class="cancelvote" style="width: 180px;">Cancel Vote</a> -->
    </form>

</div>
<script>
function more() {
    let opt = `<div><label>選項:</label><input type="text" name="option[]"></div>`;
    let opts = document.getElementById('options').innerHTML;
    opts = opts + opt;
    document.getElementById('options').innerHTML = opts;
}
</script>