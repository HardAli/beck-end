<?php
if ($_COOKIE['login'] == '') {
  header('Location: /reg.php');
  exit();
}
 ?>
<!DOCTYPE html>
<html lang="ru">
<head>
<?php
$head_Title = 'Добавление статьи';
require 'block/head.php';
?>
</head>

<body>
  <<?php require 'block/header.php'; ?>
  <main class="container mt-5 ">
    <div class="row">
      <div class="col-md-8 mb-3">
        <h4>Добавление статьи</h4>
        <form action="" method="post">
          <label for="username">Заголовок статьи</label>
          <input type="text" name="title" id="title" class="form-control">

          <label for="username">Интро статьи</label>
          <textarea name="intro" id="intro" class="form-control"></textarea>

          <label for="username">Текст статьи</label>
          <textarea name="text" id="text" class="form-control"></textarea>

          <div class="alert alert-danger mt-3" id="errorBlock"></div>

          <button type="button" id="article_send" class="btn btn-success mt-3">Добавить</button>
          <br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        </form>
      </div>
    </div>
  </main>
  <?php require 'block/footer.php'; ?>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script>
  $('#article_send').click(function () {
    var title = $('#title').val();
    var intro = $('#intro').val();
    var text = $('#text').val();


    $.ajax({
      url: 'ajax/add_article.php',
      type: 'POST',
      cache: false,
      data:{'title' : title, 'intro' : intro, 'text' : text},
      dataType: 'html',
      success: function(data){
        if(data == 'Готово'){
          $('#article_send').text("все окей");
          $('#errorBlTock').hide();
        }

        else {
          $('#errorBlock').show();
          $('#errorBlock').text(data);
        }
      }
    });
  });
  </script>
</body>
</html>
