<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="container">
<?php 
	require 'db.php';
?>
 <link href="/admin/folders/style/style.css" rel="stylesheet">
<?php if ( isset ($_SESSION['logged_user']) ) : ?>
    Авторизован! <br/>
	Привет, <?php echo $_SESSION['logged_user']->login; ?>!<br/>
    
    <div class="choose">
            <a href="/admin/users-choose.php" class="users">Пользователи</a>
            <a href="/admin/music/pdf.php" class="musics">Список песен</a>
    </div>

	<a href="/admin/logout.php">Выйти</a>
    
<?php else : ?>
Вы не авторизованы<br/>
<a href="/admin/login.php">Авторизация</a>
<?php endif; ?>
</div>
</body>
</html>





