
<?php
//檢查帳密是否正確

// if(true){
//     header("location:member.php");
// }else{
//     header("location:login.php");
// }

include_once "../api/base.php";
$adminAcc=$_POST['acc'];
$acc=$_POST['acc'];

$adminPW=($_POST['pw']);
$pw=md5($_POST['pw']);

// $name=$_POST['name'];
// $pw=$_POST['pw'];


/* if($acc==資料表中的acc && $pw==資料表中的pw){
    //登入成功->會員中心
}else{
    //登入失敗->回到登入頁->顯示錯誤訊息
}
 */



//  $sql="SELECT * FROM `users` WHERE `acc`='$acc' && `pw`='$pw'";
// $user=$pdo->query($sql)->fetch();

// if($acc==$user['acc'] && $pw==$user['pw']){
//     header("location:member_center.php");
// }else{
//     header("location:login.php?error=帳號或密碼錯誤");
// }

$sql="SELECT count(*) FROM `users` WHERE `acc`='$acc' && `pw`='$pw'";

$chk=$pdo->query($sql)->fetchColumn();


echo $sql;
echo "<hr>";
echo $chk;

if($adminAcc == 'admin' && $adminPW == "admin"){
    header("location:../back.php");
}elseif($chk){
    $_SESSION['name']=$acc;
    header("location:../index.php");
}else{
    header("location:../login.php?error=帳號或密碼錯誤");
}



?>
<!-- <a href="./login.php">123123</a> -->
