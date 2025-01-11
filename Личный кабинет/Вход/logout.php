<?php
session_start();
session_destroy();
header("Location: ../../Главная страница/index.html");
exit();
?>