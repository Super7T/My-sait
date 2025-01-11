<!DOCTYPE html>
<html lang="ru">
<head>
    <link rel="stylesheet" href="../../data/css/Элементы сайта/Login/register.css">
    <link rel="stylesheet" href="../../data/css/Элементы сайта/Login/success_register.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    
    <title>Регистрация</title>
</head>
<body>
    <div class="container">
      <div class="forms">
        <div class="form">

            <form action="register.php" method="post">
                <h2>Регистрация</h2>

                    <div class="input-field">
                        <label for="username">Имя пользователя:</label>
                        <input type="text" id="username" name="username">
                    </div>
                   
                    <div class="input-field">
                        <label for="email">Электронная почта:</label>
                        <input type="email" id="email" name="email">
                    </div>

                    <div class="input-field">
                        <label for="password">Пароль:</label>
                        <input type="password" id="password" name="password">
                    </div>

                    <div class="input-field">
                        <label for="avatar">Аватар:</label>
                        <input type="file" id="avatar" name="avatar">
                    </div>

                    <div class="input-field">
                        <label for="avatar">Телефон:</label>
                        <input type="phone" id="phone" name="phone">
                    </div>
                    
                    <div class="login">
                        Уже есть аккаунт?
                        <a class="text" href="../Вход/login.php">Войти</a>
                    </div>
                            
                    <button type="submit" name="register">Зарегистрироваться</button>
                </form>
                
            </div>
        </div>
    </div>
  
</body>
</html>

<?php
if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $avatar = 'default.png';
    $phone = $_POST['phone'];


    if (isset($_FILES['avatar']) && $_FILES['avatar']['error'] === UPLOAD_ERR_OK) {
        $avatar_tmp_name = $_FILES['avatar']['tmp_name'];
        $avatar_name = basename($_FILES['avatar']['name']);
        $avatar = 'uploads/' . $avatar_name;
        move_uploaded_file($avatar_tmp_name, $avatar);
    }

       $mysqli = new mysqli('','pma_1367816869','','advvita8g2');

    if ($mysqli->connect_error) {
        die('Ошибка подключения (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
    }

    $stmt = $mysqli->prepare("INSERT INTO users (username, email, password, avatar, phone) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param('sssss', $username, $email, $password, $avatar, $phone);
    $stmt->execute();
    $stmt->close();
    $mysqli->close();
    
?>
    <div class="text">
       <div class="parol-nosuccess">
         <div class="form">
            
          <p><?php echo "Вы успешно зарегистрировались!";?></p>  </div>
            </div>
        </div>
<?php
}
?>