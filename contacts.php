<!DOCTYPE html>
<html lang="ru">
<head>
<?php
$head_Title = 'Контакты';
require 'block/head.php';
?>
</head>

<body>
  <<?php require 'block/header.php'; ?>
  <main class="container mt-5 ">
    <div class="row">
      <div class="col-md-8 mb-3">
        <h4>Обратная связь</h4>
        <form action="" method="post">
          <label for="username">Ваше имя</label>
          <input type="text" name="username" id="username" class="form-control">

          <label for="username">Email</label>
          <input type="email" name="email" id="email" class="form-control">

          <label for="username">Сообщение</label>
          <textarea name="mess" id="mess" class="form-control"></textarea>


          <div class="alert alert-danger mt-3" id="errorBlock"></div>

          <button type="button" id="mess_send" class="btn btn-success mt-3">Отправить сообщение</button>
          <br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        </form>
      </div>
    </div>
  </main>
  <?php require 'block/footer.php'; ?>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script>
  $('#mess_send').click(function () {
    var name = $('#username').val();
    var email = $('#email').val();
    var mess = $('#mess').val();

    $.ajax({
      url: 'ajax/mail.php',
      type: 'POST',
      cache: false,
      data:{'username' : name, 'email' : email, 'mess' : mess},
      dataType: 'html',
      success: function(data){
        if(data == 'Готово'){
          $('#mess_send').text("все окей");
          $('#errorBlock').hide();
          $('#username').val("");
          $('#email').val("");
          $('#mess').val("");
          $
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
