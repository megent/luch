<?php header('Content-type: text/html; charset="utf-8"'); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Добавление контакта</title>
	<link rel="stylesheet" type="text/css" href="main.css" media="all">
</head>
<body>
	<div id="wrapper">
		<header>
			<h1>Создание контакта</h1>
		</header>
		<div id="contact_form">
			<form action="handler.php" method="post">
				<div class="field">
					<label for="contact_name">Имя</label><input id="contact_name" type="text" name="name">
				</div>
				<div class="field">
					<label for="contact_phone">Телефон</label><input id="contact_phone" type="tel" name="phone">
				</div>
				<div class="field">
					<label for="contact_email">E-mail</label><input id="contact_email" type="email" name="email">
				</div>
				<div class="field">
					<label for="contact_ploshad">Площадь</label><input id="contact_ploshad" type="ploshad" name="ploshad">
				</div>
				<div>
					<button type="submit">Создать контакт</button>
					<button type="reset">Очистить форму</button>
				</div>
			</form>
		</div>
	</div>
</body>
</html>