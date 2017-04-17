<?php
if(!empty($_POST) && $_POST['registration'] == 1)
{
	include 'registration.php';
	$registration = new Registration($_POST);
}
elseif(!empty($_POST) && $_POST['registration'] == 0)
	echo "auto";
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>«Достопримечательности Северной Осетии»</title>
	<link rel="stylesheet" href="css/main.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="js/main.js"></script>
</head>
<body>
	<header>
		<div class="header">
			<div>
				<a href="/index.php" class="logo-link">
					<img src="img/logo.png" alt="" class="logo">
					<span>«Достопримечательности Северной Осетии»</span>
				</a>
			</div>
			<button class="login" onclick="showForms();">Регистрация</button>
			<div class="_login-forms hidden">
				<div class="form form-reg">
					<form method="POST">
						<p>Регистрация</p>
						<input type="text" class="hidden" name="registration" value="1">
						<input type="text" name="login" placeholder="Введите логин">
						<input type="text" name="password" placeholder="Введите пароль">
						<button type="submit">Отправить</button>
						<a href="javascript:void(0);" class="to-login" onclick="goToLogin(this);">
							Если вы уже авторизованны
							вход
						</a>
					</form>
				</div>
				<div class="form form-login hidden">
					<form method="POST">
						<p>Вход</p>
						<input type="text" class="hidden" name="registration" value="0">
						<input type="text" name="login" placeholder="Введите логин">
						<input type="text" name="password" placeholder="Введите пароль">
						<button type="submit">Отправить</button>
					</form>
				</div>
			</div>
			<marquee class="run-string">
				Lorem ipsum dolor sit amet, consectetur adipisicing elit. Odio autem inventore quibusdam, nulla rerum maxime? Mollitia fugiat aut, consectetur? Omnis ipsam blanditiis tenetur, explicabo magni, molestiae expedita quod totam eveniet.
			</marquee>
		</div>
	</header>
</body>
</html>