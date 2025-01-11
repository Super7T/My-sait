<?php
 require_once('db.php');
$username = $_POST['username'];
$pname = $_POST['pname'];
$phone = $_POST['phone'];
$password = $_POST['password'];
$reparpass = $_POST['repeatpass'];
$email = $_POST['email'];


if( empty($username) || empty($pname) || empty($phone)|| empty($password) || empty($email)) 
{
    $new_url = 'http://localhost/SmartGajet/Личный%20кабинет/Зарегистрироватся.php';
        header('Location: '.$new_url);

        $exists="Username not available"; 
} else 
{
    if($password != $reparpass)
    {
        echo 'Пароли не совпадают';
    }else
    {
        $sql = "INSERT INTO `users` (username,pname,phone,password,email) VALUES ('$username','$pname','$phone','$password','$email')";
    if ( $conn -> query($sql))
    {
        $showError = "Passwords do not match"; 
        $new_url = 'http://localhost/SmartGajet/Личный%20кабинет/login.php';
        header('Location: '.$new_url);
        
        }else
        {
            echo "Ошибка:". $conn->error;
        }    
    }
}
