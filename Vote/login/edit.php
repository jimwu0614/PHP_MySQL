<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <link rel="stylesheet" href="../css/basic.css">
    <link rel="stylesheet" href="../CSS/slider.css">
    <link rel="stylesheet" href="../CSS/member.css">
    <style>
        span {
            font-size: 30px;
        }
    </style>
</head>

<body>
    <div class="login-box">

        <h1>Edit Profile</h1>
        <?php
        include_once "../api/base.php";

        $sql = "SELECT * FROM users WHERE id='{$_GET['id']}'";
        $user = $pdo->query($sql)->fetch();
        ?>
        <form action="save_member.php" method="post">

            <div class="user-box">
                <input type="hidden" name="acc" value="<?= $user['acc']; ?>">
                <input type="hidden" name="id" value="<?= $user['id']; ?>">
                <label style="color: #03e9f4;font-size: 14px;">Account</label>
                <span><?= $user['acc']; ?></span>
                <br><br><br>
            </div>

            <div class="user-box">
                <input type="password" name="pw" value="<?= $user['pw']; ?>">
                <label>Password</label>
            </div>

            <div class="user-box">
                <input type="text" name="name" value="<?= $user['name']; ?>">
                <label>Name</label>
            </div>

            <div class="user-box">
                <input type="date" name="birthday" value="<?= $user['birthday']; ?>">
                <label>Birthday</label>
            </div>

            <div class="user-box">
                <!-- <input type="text" name="gender" required=""> -->
                <label style="color: #03e9f4;font-size: 14px;">Gender</label>
                <span><?= $user['gender']; ?></span>
                <br><br><br>
            </div>

            <div class="user-box">
                <input type="text" name="addr" value="<?= $user['addr']; ?>">
                <label>Address</label>
            </div>

            <div class="user-box">
                <input type="email" name="email" value="<?= $user['email']; ?>">
                <label>E-mail</label>
            </div>


            <!-- <table>
                <tr>
                    <td>Account</td>
                    <td><?= $user['acc']; ?></td>
                    <input type="hidden" name="acc" value="<?= $user['acc']; ?>">
                    <input type="hidden" name="id" value="<?= $user['id']; ?>">
                </tr>
                <tr>
                    <td>Password</td>
                    <td><input type="password" name="pw" value="<?= $user['pw']; ?>"></td>
                </tr>
                <tr>
                    <td>Name</td>
                    <td><input type="text" name="name" value="<?= $user['name']; ?>"></td>
                </tr>
                <tr>
                    <td>Birthday</td>
                    <td><input type="date" name="birthday" value="<?= $user['birthday']; ?>"></td>
                </tr>
                <tr>
                    <td>Gender</td>
                    <td><?= $user['gender']; ?></td>
                </tr>
                <tr>
                    <td>Address</td>
                    <td><input type="text" name="addr" value="<?= $user['addr']; ?>"></td>
                </tr>
                <tr>
                    <td>email</td>
                    <td><input type="email" name="email" value="<?= $user['email']; ?>"></td>
                </tr>
            </table> -->

            <div class='btns'>
                <input class="but" type="submit" value="Submit">
                <input class="but" type="reset" value="Reset">
            </div>
        </form>
    </div>
</body>

</html>