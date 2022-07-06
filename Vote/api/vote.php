<?php
include_once "base.php";

//是誰來投票
$user_id = $_SESSION['id'];
//這個投票的ID
$subject_id = $_POST['subject_id'];



    


    // echo "\$subject_id=";
    // echo $subject_id;
    // echo "<hr>";


    //前一頁 取過來的 選了那些答案
    echo "POST['opt']=";
    dd($_POST['opt']);
    echo "<hr>";
//紀錄投票結果

//先確認是不是空的投票
if (isset($_POST['opt'])){
    //是複選題的話
    //$_POST['opt'] 是前面取過來的 選了那些答案
        if (is_array($_POST['opt'])){
            
            //更新"options"表單中的資料
            foreach($_POST['opt'] as $key => $opt) {

            //$option = $sql="SELECT * FROM options WHERE `0`='59' AND `1`='60'"
            $option = find("options",$opt);
            $option_id = $option['id'];
            
            $option['total'] = $option['total'] + 1;
                
                echo "<br>";
                echo "第一區";
                echo "<br>";

                echo "\$key=";
                // dd($key);
                echo $key;
                echo "<hr>";

                echo "\$opt=";
                dd($opt);
                echo "<hr>";
                

                //答案的細節
                echo "\$option=";
                dd($option);
                echo "<hr>";




                echo "option_id=";
                echo $option_id;
                echo "<hr>";
            

            

                echo "option['total']=";
                echo $option['total'];


            save("options" , $option);
            // $sql = "UPDATE `options` SET `total` = '{$option['total']}' WHERE `options`.`id` = '$option_id' ";
            // echo $sql;
            // $pdo->exec($sql);


                //更新"subjects"表單中的`total`
            if ($key == 0 ){
                $subject = find("subjects", $option['subject_id']);
                $subject['total']++;


            save("subjects", $subject);
            // $sql = "UPDATE `subjects` SET `total` = '{$subject['total']}' WHERE `subjects`.`id` = '$subject_id' ";
            // $pdo->exec($sql);
                
                echo "<br>";
                echo "第二區";
                echo "<hr>";
                echo "<hr>";
                echo "\$subject=";
                dd($subject);

            }


            $log = ['user_id' => $_SESSION['id'] ,
                    'subject_id' => $subject['id'],
                    'option_id' => $option['id']];
            save("logs", $log);


                    echo "<br>";
                    echo "第三區";
                    echo "<hr>";
                    echo "<hr>";
                    echo "\$log=";
                    dd($log);
                    echo $_SESSION['id'];
                    echo "<hr>";
                    echo "<hr>";
        }


    //是單選題的話
    } else {


        $option = find('options', $_POST['opt']);
        $option['total']++;


        // echo "POST['opt']=";
        // dd($_POST['opt']);
        // echo "29行";
        // echo"option=";
        // dd($option);
        
        save("options", $option);


        
        $subject = find("subjects", $option['subject_id']);
        $subject['total']++;

        // echo "subject['total']=";
        // echo $subject;
        // dd($subject['total']);

        save("subjects", $subject);

        $log = ['user_id' => $_SESSION['id'],
                'subject_id' =>$subject['id'],
                'option_id' => $option['id']];

        // echo"log=";
        // echo $log;
        save("logs", $log);
    }
}


// echo "\$_SESSION['name']=";
// echo $_SESSION['name'];
// echo "<hr>";
// echo "\$_SESSION['id']=";
// echo $_SESSION['id'];
// echo "<hr>";
// echo "\$_SESSION['acc']=";
// echo $_SESSION['acc'];
// echo "<hr>";



to("../index.php?do=after_vote&id={$option['subject_id']}&note=Vote_Complite");
?>

