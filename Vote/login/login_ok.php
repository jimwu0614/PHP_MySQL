<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logged In</title>
    <link rel="stylesheet" href="../CSS/login.css">
    <style>
        * {
            box-sizing: border-box;
            text-align: center;
            
        }

        body{
            height: 75vh;
        }
        section {
            display: block;
            width: 500px;
            height: 300px;
            margin: 200px auto;
            padding-top: 50px;
            border: 5px solid black;
            border-radius: 10px;
            box-shadow: 0px 0px 9px rgb(100, 100, 100, );
            background-color: white;
            font-size: 80px;
            color: #EE0000;
        }

        p {
            display: block;
            color: #EE0000;
            font-size: 40px;
        }

        .btns{
            height: 80px;
        }
        .btns .but{
            width: 150px;
            height: 80px;
            margin: 20px;
            /* padding: 50px auto; */
            position: relative;
        }

        .btns .but2{
            
            top: -20px
        }

    </style>
</head>

<body>
    <section>
        Welcome
        <p>
            You Are Already Logged In
        </p>
    </section>
    <div class="btns">
        <button class="but but1" onclick="location.href='../index.php'">Go Vote</button>
        <button class="but but2" onclick="location.href='../member.php'">Member Center</button>
    </div>

</body>

</html>