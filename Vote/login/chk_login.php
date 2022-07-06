
<?php
//檢查帳密是否正確

// if(true){
//     header("location:member.php");
// }else{
//     header("location:login.php");
// }

include_once "../api/base.php";
$adminAcc=$_POST['acc'];
$member_acc=$_POST['acc'];

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


//只算count
$sql="SELECT count(*) FROM `users` WHERE `acc`='$member_acc' && `pw`='$pw'";

$chk=$pdo->query($sql)->fetchColumn();


echo $sql;
echo "<hr>";
echo $chk;


echo "<hr>";
echo "<hr>";

$sql2 = "SELECT * FROM `users` WHERE `acc`='$member_acc' && `pw`='$pw'";
$chk2=$pdo->query($sql2)->fetchAll();

$member_id=$chk2[0]['id'];
$member_name=$chk2[0]['name'];


echo $sql2;
echo "<hr>";
dd($chk2);


echo "member_id=";
echo $member_id;


echo "<hr>";
echo "\$_SESSION['name']=";
echo $_SESSION['name'];
echo "<hr>";



//管理員跟一般會員分流
if($adminAcc == 'admin' && $adminPW == "admin"){
    $_SESSION['acc']=$adminAcc;
    $_SESSION['id']="$member_id";
    $_SESSION['name']="$member_name";
    header("location:../back.php");
}elseif($chk){
    $_SESSION['acc']=$member_acc;
    $_SESSION['id']="$member_id";
    $_SESSION['name']="$member_name";
    header("location:./login_ok.php");
}else{
    header("location:../login.php?error=帳號或密碼錯誤");
}



?>
<a href="./login.php">back</a>
<a href="./login_ok.php">123123</a>
