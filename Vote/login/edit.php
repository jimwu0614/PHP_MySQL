<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
</head>

<body>
    <h1>Edit Profile</h1>
    <?php
    include_once "../api/base.php";

    $sql = "SELECT * FROM users WHERE id='{$_GET['id']}'";
    $user = $pdo->query($sql)->fetch();
    ?>
    <form action="save_member.php" method="post">
        <table>
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
        </table>
        <div>
            <input type="submit" value="編輯"><input type="reset" value="重置">
        </div>
    </form>
</body>

</html>