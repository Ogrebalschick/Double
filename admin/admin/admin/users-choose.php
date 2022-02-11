<div class="container">
<?php 
	require 'db.php';
?>
 <link href="folders/style/style.css" rel="stylesheet">
<?php if ( isset ($_SESSION['logged_user']) ) : ?>
   
    
    <div class="choose">
            <a href="/admin/users-user.php" class="users">Пользователи</a>
            <a href="/admin/users-admin.php" class="musics">Админы</a>
    </div>

    <a href="/admin/">Главная</a>
    </div>
<?php else : ?>
Вы не авторизованы<br/>
<a href="/admin/login.php">Авторизация</a><br>
<a href="/admin/signup.php">Регистрация</a><br>
<?php endif; ?>
