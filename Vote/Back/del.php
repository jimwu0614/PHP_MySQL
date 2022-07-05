<?php
$subj=find("subjects",$_GET['id']);

?>
<style>
    button{
        margin: 0;
    }
</style>
<div class="confirm" style="width:500px;margin:2rem auto;border:1px solid #ccc;box-shadow:2px 2px 15px #999;padding:2rem;">
    <h2 style="text-align:center;color:red"> Are you sure you want to delete?</h2>
    <div style="color:#fff">Topic:</div>
    <div style="font-size:1.5rem;text-align:center ;color:#fff"><?=$subj['subject'];?></div>
    <button id="submit" style="margin: 0;" onclick="location.href='./api/del.php?table=subjects&id=<?=$_GET['id'];?>'">Delete</button>
    <button id="submit" style="margin: 0;" onclick="location.href='back.php'">Cancel</button>
</div>