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
            $dsn="mysql:host=localhost;charset=utf8;dbname=school2";
            $pdo=new PDO($dsn , 'root' , '');

            $sql= "SELECT `students`.* , `dept`.`code` , `dept`.`name` as `科系` FROM `students`,`dept` WHERE `dept`.`id`=`students`.`dept`";

            $rows=$pdo->query($sql)->fetchAll(PDO::FETCH_BOTH);

            echo "<table>";
            foreach($rows as $key => $row){
                echo "<tr>";
                    echo "<td>{$row['id']}</td>";
                    echo "<td>{$row['school_num']}</td>";
                    echo "<td>{$row['name']}</td>";
                    echo "<td>{$row['科系']}</td>";
                    echo "<td>{$row['parents']}</td>";
                echo "</tr>";
            }
            echo "</table>";
            ?>

            


        ?>

</body>
</html>