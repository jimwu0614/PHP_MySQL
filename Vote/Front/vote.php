<!-- 投票中 -->

<?php
include_once "./api/base.php";

// 先設定本地端用到的變數

//登入者的身分
$member_id = $_SESSION['id'];

//本筆投票的ID
$subject = find("subjects", $_GET['id']);
$subject_id = $subject['id'];



// echo "\$subject['id']=";
// dd($subject);
// echo $subject['id'];

// 避免重複投票: 想法
// 從logs表單抓 若user_id 和subject_id 跟 登入端的id 重複
// 表示已經投過票  導向result
// 若沒   才放行進去vote


$query_result='';
$query = ['user_id'=>$member_id,'subject_id'=>$subject_id];
$query_result = all("logs",$query);

// dd($query_result);

// echo $query_result[0]['user_id'];
// echo $query_result[0]['subject_id'];
if(!empty($query_result)){
$data_user = $query_result[0]['user_id'];
$data_subject = $query_result[0]['subject_id'];
    
}else{
    $data_user ='';
    $data_subject ='';
}

//$opts = 找出'option'資料表內 subject_id 為 $_GET['id']] 的那格
$opts = all('options', ['subject_id' => $_GET['id']]);

/* dd($subject);
dd($opts); */


// $chk = [$member_id,$subject['id']];
// $log = all("logs",$chk);


?>
<?php
if ($member_id == $data_user && $subject_id == $data_subject) {
    to("./?do=vote_result&id=$subject_id&note=You have already voted");
}else{
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
                    <label >
                        <input type="radio" name="opt" value="<?= $opt['id']?>">&nbsp;&nbsp;&nbsp;<?= $opt['option']?>
                        <input type="hidden" name="subject_id" value="<?=$subject['id']?>">
                    </label>
                <?php
                //若是複選題
                } else {
                ?>
                    <label >
                        <input type="checkbox" name="opt[]" value="<?= $opt['id']?>">&nbsp;&nbsp;&nbsp;<?= $opt['option']?>
                        <input type="hidden" name="subject_id" value="<?=$subject['id']?>">
                    </label>
                <?php
                }
                ?>
                
            </div>

        <?php
        }
        ?>
        <!-- 按鈕區 -->
        <div class="btns">
            <button class="but" type="button" onclick="location.href='?do=vote_result&id=<?= $subject['id'] ?>'">Back</button>
            <button class="but" type="submit">Vote</button>
            <button class="but" type="reset">Reset</button>
            <button class="but" type="button" onclick="location.href='./index.php'">Home</button>
        </div>
    </form>
</div>

<?php
}
?>