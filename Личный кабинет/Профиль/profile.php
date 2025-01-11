<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../data/css/Элементы сайта/Login/profile.css">



    <title>Document</title>
</head>
<header>
  <h2 class="name">Сити-мобаил</h2>
  <div class="container_button", style ="transform: translate(720px,-50px); width:200px">
      <div class="button_item">
        <span class="material-icons">
          <a href="../../Главная страница/index.html">
              Главная
          </a> 
        </span>
      </div>

      <div class="button_item">
          <span class="material-icons">
            <a href="../../Товары/Товары.html">
              Товары
            </a> 
          </span>
      </div>
  
      <div class="button_item">
        <span class="material-icons">
          <a href="../../Контакты/Контакты.html">
            Контакты
          </a> 
        </span>
      </div>

      <div class="button_item">
        <span class="material-icons">
          <a href="../../Личный кабинет/Регистрация/register.php">
            Зарегистрироватся
          </a> 
        </span>
      </div>


  </div>
</header> 
<body>
    
        <?php
        session_start();

        if (!isset($_SESSION['user_id'])) {
            header("Location: login.php");
            exit();
        }

        $user_id = $_SESSION['user_id'];
        $avatar = $_SESSION['avatar'];
        $username = $_SESSION['username'];
        $email = $_SESSION['email'];
        $phone = $_SESSION['phone'];
    ?>
    
        <h1>Добро пожаловать <?php echo $username?> </h1>
    <div class="box-profile">
        <div class="form">
        <p>Ваше имя: <?php echo $username?></p> 
        <p>Ваш email: <?php echo $email?></p> 
    <?php
       echo "<img src='$avatar' alt='Avatar'>"
    ?>
        <p>Ваш номер телефона: <?php echo $phone?></p>
        <a href='../Вход/logout.php'>Выйти</a>
        </div>
    </div>

</body>

<footer>
  <div class="container_button", style ="transform: translate(720px,35px); width:200px">
      <div class="button_item">
        <span class="material-icons">
          <a href="../../Главная страница/index.html">
              Главная
          </a> 
        </span>
      </div>

      <div class="button_item">
          <span class="material-icons">
            <a href="../../Товары/Товары.html">
              Товары
            </a> 
          </span>
      </div>
  
      <div class="button_item">
        <span class="material-icons">
          <a href="../../Контакты/Контакты.html">
            Контакты
          </a> 
        </span>
      </div>

      <div class="button_item">
        <span class="material-icons">
          <a href="../../Личный кабинет/Регистрация/register.php">
            Зарегистрироватся
          </a> 
        </span>
      </div>


  </div>
</footer> 
<style>
    header {
    width: 100%;
    height: 50px;
    background-color: #2F4858;
    border-radius: 20px;
}

footer {
   width: 100%;
   height: 100px;
   background-color: #2F4858;
   border-radius: 20px;
}

.name {
    transform: translate(30px,6px);
    font-size: 30px;
    width: 250px;

}

.container_button{
    width: 20px;
    height: 30px;
    display: flex;
    justify-content: left;
    align-items: center;
    transform: translate(800px,-50px);
    font-size: 20px;
}
</style>

</html>