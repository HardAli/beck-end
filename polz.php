<!DOCTYPE html>
<html lang="en">
<head>
  <?php
  $head_Title = 'Users';
  require 'block/head.php';
  ?>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>
<?php require 'block/header.php' ?>
<?php require_once 'block/mySqlConnect.php'; ?>

<?php

$query = $pdo->query('SELECT * FROM `users`');
while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
  echo '<h4>' . $row['id'] . '. <b>name:</b>' . $row['name'] . ' <b>mail:</b>' . $row['email'] . ' <b>login:</b>' . $row['login'] . '
  <button type="button" id="deletPolzBtn" class="btn btn-danger ">удалить</button> </h4><br>';
}













 ?>


</body>
</html>
