<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MyExam | Login</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Sharp:opsz,wght,FILL,GRAD@48,400,0,0" />
  <link rel="stylesheet" href="../../assets/css/login.css">
</head>
<body>
  <form action="func/login.php" method="post" class="login_form_container">
    <div class="login_form">
      <h2>Login</h2>
        <div class="input_group">
          <span class="material-symbols-sharp">person</span>
          <input type="text" placeholder="Username" class="input_text" autocomplete="off" name="user">
        </div>
        <div class="input_group">
          <span class="material-symbols-sharp">lock</span>
          <input type="password" placeholder="Password" class="input_text" autocomplete="off" name="pass">
        </div>
        <button name="log" class="button_group" id="login_button">Submit</button>
      </div>
    </form>

  <script src="../../assets/js/login.js"></script>
</body>
</html>