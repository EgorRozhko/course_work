<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
	<link rel="stylesheet" href="css/fonts.css">
	<link rel="stylesheet" href="css/style_header.css">
	<link rel="stylesheet" href="css/style.css" />
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/parallax.js"></script>
	<script type="text/javascript" src="js/user-menu.js"></script>
	<script type="text/javascript" src="js/user-menu-buttons.js"></script>
</head>
<body>
	<header id="header">
		<div id="header-contacts">
			<div id=header-contacts-title>
				<img id="logo" src="http://ggkttd.by/wp-content/uploads/2016/02/%D0%BB%D0%BE%D0%B3%D0%BE.png" alt="">
			</div>
			<div id="title-box">
				<font id=title>Название компании</font>
			</div>
			<div id="contacts">
				<div id="first-number-box">
					<p class="first-number item-number"> +375 33 123 4567</p>
				</div>
				<div id="second-number-box">
					<p class="second-number item-number"> +375 33 988 7654</p>
				</div>
			</div>
		</div>
		<div id="header-menu">
			<div id="menu-items-block">
				<ul id="menu-items">
					<li class="menu-item"><a href="index.php">Главная</a></li>
					<li class="menu-item"><a href="create_order.php">Заказать</a></li>
					<li class="menu-item"><a href="about-us.php">О нас</a></li>
					<li class="menu-item"><a href="contacts.php">Контакты</a></li>
				</ul>
			</div>
			<div id="user-block">
				<?php include('user_block.php'); ?>
				<div id="user-short-menu"></div>
			</div>
		</div>
	</header>