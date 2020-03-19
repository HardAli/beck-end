<!DOCTYPE html>
<html lang="ru">
<head>
<?php
$head_Title = 'Registration';
require 'block/head.php';
?>
</head>

<body>
  <<?php require 'block/header.php'; ?>
  <main class="container mt-5 ">
    <div class="row">
      <div class="col-md-8 mb-3">
        <?php
        if($_COOKIE['login'] == ''):
         ?>
        <h4>Форма авторизации</h4>
        <form action="" method="post">

          <label for="username">Login</label>
          <input type="text" name="login" id="login" class="form-control">

          <label for="username">Пароль</label>
          <input type="password" name="pass" id="pass" class="form-control">

          <div class="alert alert-danger mt-3" id="errorBlock"></div>

          <button type="button" id="auth_user" class="btn btn-success mt-3">Войти</button>
          <br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        </form>

        <?php
      else:
         ?>

         <h2><?=$_COOKIE['login']?></h2>
         <button class="btn btn-danger" id = 'exit_btn'>Выйти</button>

        <?php
      endif;
         ?>
      </div>
    </div>
  </main>
  <?php require 'block/footer.php'; ?>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script>
  $('#auth_user').click(function () {
    var login = $('#login').val();
    var pass = $('#pass').val();

    $.ajax({
      url: 'ajax/auth.php',
      type: 'POST',
      cache: false,
      data:{'login' : login, 'pass' : pass},
      dataType: 'html',
      success: function(data){
        if(data == 'Готово'){
          $('#auth_user').text("все окей");
          $('#errorBlock').hide();
          document.location.reload(true);
        }

        else {
          $('#errorBlock').show();
          $('#errorBlock').text(data);
        }
      }
    });
  });

  $('#exit_btn').click(function () {

    $.ajax({
      url: 'ajax/exit.php',
      type: 'POST',
      cache: false,
      data:{},
      dataType: 'html',
      success: function(data){
      document.location.reload(true);
      }
    });
  });
  </script>
</body>
</html>
