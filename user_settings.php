<?php include('components/header.php'); ?>
<content>
	<title>Настройки</title>
	<script type="text/javascript" src="js/change-phone.js"></script>
	<script type="text/javascript" src="js/change-password.js"></script>
	<div id="content-user-settings">
		<h2>Пользовательские настройки:</h2>
		<div id="setting-list">
			<hr />
			<div id="phone-setting">
				<h3 class="title-setting">Сменить номер телефона:</h3>
				<div class="setting" id="change-phone-number">
					<label for="old-phone">Введите старый номер телефона:</label><input class="field" type="phone" name="old-phone" id="old-phone" />
					<label for="new-phone">Введите новый номер телефона:</label><input class="field" type="phone" name="new-phone" id="new-phone" />
				</div>
				<p id="change-phone" class="setting-button-box"><span class='setting-button'>Далее</span></p>
				<p id="warning-phone" class="warning"></p>
			</div>
			<hr class='user-setting-hr'/>
			<div id="phone-setting">
				<h3 class="title-setting">Сменить пароль:</h3>
				<div class="setting password-setting">
					<label for="old-password">Введите старый пароль:</label><input class="field" type="password" name="old-password" id="old-password" />
					<label for="new-password">Введите новый пароль:</label><input class="field" type="password" name="new-password" id="new-password" />
					<label for="new-password-confirm">Подтвердите новый пароль:</label><input class="field" type="password" name="new-password-confirm" id="new-password-confirm" />
				</div>
				<p id="change-password" class="setting-button-box"><span class='setting-button'>Далее</span></p>
				<p id="warning-password" class="warning"></p>
			</div>
			<hr  class='user-setting-hr'/>
		</div>
	</div>
</content>