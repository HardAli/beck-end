<!DOCTYPE html>
<html lang="ru">
<head>
<?php
$head_Title = 'PHP blog';
require 'block/head.php';
?>
</head>

<body>
  <<?php require 'block/header.php'; ?>
  <main class="container mt-5 ">
    <div class="row">
      <div class="col-md-8">
        <?php
        require_once 'block/mySqlConnect.php';

        $sql = 'SELECT * FROM `articles` ORDER BY `date` DESC';
        $query = $pdo->query($sql);
        while ($row = $query->fetch(PDO::FETCH_OBJ)) {

          echo "<h2>$row->title</h2>
          <p>$row->intro</p>
          <p><b>Автор статьи:</b> <mark>$row->avtor</mark></p>
          <a href='/news.php?id=$row->id' title='$row->title'>
          <button class='btn btn-warning' mb-5>Прочитать больше</button>
          </a>";
        }
         ?>
        Основная часть
      </div>
      <?php require 'block/aside.php'; ?>
    </div>
  </main>
  <?php require 'block/footer.php'; ?>
</body>
</html>
