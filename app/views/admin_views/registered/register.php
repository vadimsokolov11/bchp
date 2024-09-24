<?php

$title = 'Register';
ob_start(); 
?>

  <h1 class="mb-4">Регистрация</h1>
    <form method="POST" action="/registered/store">
      <div class="mb-3">
        <label for="email" class="form-label">Эл. почта</label>
        <input type="email" class="form-control" id="email" name="email" required>
      </div>
      <div class="mb-3">
        <label for="password" class="form-label">Пароль</label>
        <input type="password" class="form-control" id="password" name="password" required>
      </div>
      <div class="mb-3">
        <label for="confirm_password" class="form-label">Повторите пароль</label>
        <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
      </div>
      <button type="submit" class="btn btn-primary">Регистрация</button>
    </form>

<?php $content = ob_get_clean(); 

include 'app/views/layout/layout_user_admin.php';
?>