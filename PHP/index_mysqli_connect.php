<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP連線資料庫</title>
    <style>
        h1, h2, h3, h4{
            text-align: center;
        }
    </style>
</head>
<body>
    <h1>php連線資料庫</h1>
        <?php
            // $dsn="mysql:host=localhost;charset=utf8;dbname=school2";
            // $pdo=new PDO($dsn , 'root' , '');
            $conn=mysqli_connect('localhost' , 'root' , '' , 'school2');

            $sql= "SELECT `students`.* , `dept`.`code` , `dept`.`name` as `科系` FROM `students`,`dept` WHERE `dept`.`id`=`students`.`dept`";

            // $rows=$pdo->query($sql)->fetchAll(PDO::FETCH_BOTH);
            $query=mysqli_query($conn,$sql);


            //一次看全部
            // $rows=mysqli_fetch_all($query, MYSQLI_BOTH);
                                    
            
            // 看結果
            
            // echo "<pre>";
            // print_r($rows);
            // echo "</pre>";
            
            
            
            
            
            
            //一次只看一筆
            // $rows=mysqli_fetch_array($query,MYSQLI_BOTH);
            
            
            // 看結果
            
            // echo "<pre>";
            // print_r($rows);
            // echo "</pre>";
            



            // 看特定筆數的特定項目

            // echo $rows[0][3];
            // echo '<br>';
            // echo $rows[0]['birthday'];






            // "看特定筆數"的回圈(少用)

            $count=0;
            while($row=mysqli_fetch_array($query,MYSQLI_BOTH)){
                if($row['6']=='王學義'){
                    echo "<pre>";
                    print_r($row);
                    echo "</pre>";
                }
                $count++;
            }
            echo "<hr>";
            echo $count;
            echo "<hr>";







        ?>

</body>
</html>