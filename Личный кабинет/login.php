<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Авторизация</title>
</head>
<body>
    <h2>Авторизация</h2>
    <form action="login.php" method="post">
        <label for="email">Электронная почта:</label>
        <input type="email" id="email" name="email" required>
        <br>
        <label for="password">Пароль:</label>
        <input type="password" id="password" name="password" required>
        <br>
        <button type="submit" name="login">Войти</button>
    </form>
</body>
</html>

<?php
session_start();

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $mysqli = new mysqli('localhost', 'root', '', 'registeruser');

    if ($mysqli->connect_error) {
        die('Ошибка подключения (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
    }

    $stmt = $mysqli->prepare("SELECT id, username, password, avatar FROM users WHERE email = ?");
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $username, $hashed_password, $avatar);
        $stmt->fetch();

        if (password_verify($password, $hashed_password)) {
            $_SESSION['user_id'] = $id;
            $_SESSION['username'] = $username;
            $_SESSION['avatar'] = $avatar;
            header("Location: profile.php");
            exit();
        } else {
            echo "Неверный пароль!";
        }
    } else {
        echo "Пользователь не найден!";
    }

    $stmt->close();
    $mysqli->close();
}
?>