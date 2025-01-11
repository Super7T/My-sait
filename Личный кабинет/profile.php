<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$username = $_SESSION['username'];
$avatar = $_SESSION['avatar'];

echo "<h1>Добро пожаловать, $username!</h1>";
echo "<img src='$avatar' alt='Avatar'>";
echo "<p><a href='logout.php'>Выйти</a></p>";
?>