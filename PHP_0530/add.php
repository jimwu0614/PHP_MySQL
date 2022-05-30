<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>新增學生資料</title>
    <style>
        
        
        
        
        label {
            padding: 5px auto;
            display: block;
        }
    </style>
</head>
<body>
    <h1>新增學生資料</h1>
        <form action="store.php" method="post">
        <label for="">學號:<input type="text" name="uni_id"></label>
        <label for="">座號:<input type="text" name="seat_num"></label>
        <label for="">姓名:<input type="text" name="name"></label>
        <label for="">生日:<input type="text" name="birthday"></label>
        <label for="">身分證字號:<input type="text" name="national_id"></label>
        <label for="">住址:<input type="text" name="address"></label>
        <label for="">家長:<input type="text" name="parent"></label>
        <label for="">電話:<input type="text" name="telphone"></label>
        <label for="">科別:<input type="text" name="major"></label>
        <label for="">畢業國中:<input type="text" name="secondary"></label>
        <input type="submit" value="新增">
        <input type="reset" value="重置">
    </form>
</body>
</html>