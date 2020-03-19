<?php
  $title = trim(filter_var($_POST['title'], FILTER_SANITIZE_STRING));
  $intro = trim(filter_var($_POST['intro'], FILTER_SANITIZE_STRING));
  $text = trim(filter_var($_POST['text'], FILTER_SANITIZE_STRING));

  $error = '';
  if(strlen($title) <= 3)
  $error = 'Введите название статьи (В интро должно быть больше 3 символов)';
  else if (strlen($intro) <= 15)
  $error = 'Введите интро статьи (В интро должно быть больше 15 символов)';
  else if (strlen($text) <= 20)
  $error = 'Введите текст статьи (В тексте должно быть больше 20 символов)';

  if ($error != '') {
    echo $error;
    exit();
  }

  require_once '../block/mySqlConnect.php';

  $sql = 'INSERT INTO articles(title , intro, text, date, avtor) VALUES(?, ?, ?, ?, ?)';
  $query = $pdo->prepare($sql);
  $query->execute([$title, $intro, $text, time(), $_COOKIE['login']]);

  echo 'Готово';

 ?>
