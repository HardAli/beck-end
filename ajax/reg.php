<?php
  $username = trim(filter_var($_POST['username'], FILTER_SANITIZE_STRING));
  $email = trim(filter_var($_POST['email'], FILTER_SANITIZE_EMAIL));
  $login = trim(filter_var($_POST['login'], FILTER_SANITIZE_STRING));
  $pass = trim(filter_var($_POST['pass'], FILTER_SANITIZE_STRING));



  $error ='';
  if (strlen($username) < 3) {
    $error ='Введите Имя';
  }else if (strlen($email) < 3) {
    $error ='Введите Email';
  }else if (strlen($login) < 3) {
    $error ='Введите логин';
  }else if (strlen($pass) < 3) {
    $error ='Введите пароль';
  }

  if ($error != '') {
    echo $error;
    exit();
  }




  //ШИФРОВКА ПАРОЛЯ
  $sol = "314159265358979323846";
  $pass = md5($pass . $sol);

  require_once '../block/mySqlConnect.php';

  $sql ='INSERT INTO users(name, email, login, pass) VALUES(?, ?, ?, ?)';
  $query = $pdo->prepare($sql);
  $query->execute([$username, $email, $login, $pass]);

  echo "Готово";

?>
