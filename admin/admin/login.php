<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link href="/admin/folders/style/style.css" rel="stylesheet">
</head>

<body>
	<div class="home">
		<div class="container">
			<?php
			require 'db.php';

			$data = $_POST;
			if (isset($data['do_login'])) {
				$user = R::findOne('users', 'login = ?', array($data['login']));
				if ($user) {
					//логин существует
					if (password_verify($data['password'], $user->password)) {
						//если пароль совпадает, то нужно авторизовать пользователя
						$_SESSION['logged_user'] = $user;
						echo '<div style="color:dreen;">Вы авторизованы!<br/> Можете перейти на главную страницу.<br/> <a href="/" id="a_reg">главная</a></div><hr>';
					} else {
						$errors[] = 'Неверно введен пароль!';
					}
				} else {
					$errors[] = 'Пользователь с таким логином не найден!';
				}

				if (!empty($errors)) {
					//выводим ошибки авторизации
					echo '<div id="errors" style="color:red;">' . array_shift($errors) . '</div><hr>';
				}
			}

			?>


			<form action="login.php" method="POST">
				<strong>Логин</strong>
				<input type="text" name="login" value="<?php echo @$data['login']; ?>"><br />

				<strong>Пароль</strong>
				<input type="password" name="password" value="<?php echo @$data['password']; ?>"><br />

				<button type="submit" name="do_login">Войти</button>
			</form>
		</div>
	</div>
</body>

</html>