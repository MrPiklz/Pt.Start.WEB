<!doctype html>
<html lang="ru">
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel=”stylesheet” href=”https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css” />
        <link rel="stylesheet" href="css/style.css">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Беловолов А.В.</title>
    </head>

    <body>
        <div class="container">
            <div class="row">
                <div class="reg">
                    <h1>Регистрация</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <form method="POST" action="registration.php">
                        <div class="form_reg"><input class="form" type="email" name="email" placeholder="Email"></div>
                        <div class="form_reg"><input class="form" type="text" name="login" placeholder="Login"></div>
                        <div class="form_reg"><input class="form" type="password" name="password"  placeholder="Password"></div>
                        <button type="submit" class="btn_reg" name="submit">Продолжить</button>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
<?php
if (isset($_COOKIE['User'])) {
    header("Location: login.php");
}
require_once('bd.php');
$link = mysqli_connect('127.0.0.1', 'root', 'password', 'AlexBelov');

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $username = $_POST['login'];
    $pass = $_POST['password'];

    if (!$email || !$username || !$pass) die ('Пожалуйста введите все значения!');

    $sql = "SELECT * FROM users WHERE username='$username' AND password='$pass'";
    $result = mysqli_query($link, $sql);

    if (mysqli_num_rows($result) == 1) {
        die('невозможно создать');
      } else {
        $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$pass')";
        if(!mysqli_query($link, $sql)) {
            echo "Не удалось добавить пользователя";
          }
      }




  }


?>