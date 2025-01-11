<!DOCTYPE html>
<html lang="ru">
<head>
    <link rel="stylesheet" href="../../data/css/Элементы сайта/Login/logins.css">
    <link rel="stylesheet" href="../../data/css/Элементы сайта/Login/mistake.css">
    <meta charset="UTF-8">
    <title>Авторизация</title>
</head>
<body>
<div class="container-login">
      <div class="forms-login">
        <div class="form">

            <form action="login.php" method="post">
                <h2>Авторизация</h2>

                <div class="input-field">
                    <label for="email">Электронная почта:</label>
                    <input type="email" id="email" name="email" required>
                </div>

                <div class="input-field">
                    <label for="password">Пароль:</label>
                    <input type="password" id="password" name="password" required>
                </div>

                <div class="login">
                    Впервые на сайте?
                    <a class="text" href="../Регистрация/register.php">Зарегистрируйтесь</a>
                </div>
                        
                <button type="submit" name="login">Войти</button>
            </form>

  </div>
</div>
</body>
</html>
<?php
                session_start();

                if (isset($_POST['login'])) {
                    $email = $_POST['email'];
                    $password = $_POST['password'];

                    $mysqli = new mysqli('localhost','advvita8g2','','advvita8g2');

                    if ($mysqli->connect_error) {
                        die('Ошибка подключения (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
                    }

                    $stmt = $mysqli->prepare("SELECT id, username, password, avatar, phone FROM users WHERE email = ?");
                    $stmt->bind_param('s', $email);
                    $stmt->execute();
                    $stmt->store_result();

                    if ($stmt->num_rows > 0) {
                        $stmt->bind_result($id, $username, $hashed_password, $avatar, $phone);
                        $stmt->fetch();

                        if (password_verify($password, $hashed_password)) {
                            $_SESSION['user_id'] = $id;
                            $_SESSION['avatar'] = $avatar;
                            $_SESSION['username'] = $username;
                            $_SESSION['email'] = $email;
                            $_SESSION['phone'] = $phone;
                            
                            header("Location: ../Профиль/profile.php");
                            exit();
                        } else {
?>
       <div class="text">
       <div class="parol-nosuccess">
            <div class="form">
            
            <p><?php echo "Неверный пароль";?></p> 
            </div>
            </div>
        </div>
        <?php
        }
    } else {
          ?>
        <div class="parol-nosuccess">
            <p><?php echo "Пользователь не найден!";?></p> 
        </div>
        <?php
        
    }

    $stmt->close();
    $mysqli->close();
}
?>