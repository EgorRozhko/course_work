<div id="background" class="background"></div>
<?php include_once('components/header.php'); ?>
<title>Оформить заказ</title>
<script type="text/javascript" src="js/transport-list.js"></script>
<script type="text/javascript" src="js/reserved_transport.js"></script>
<script type="text/javascript" src="js/events-reserved-transport.js"></script>
<script type="text/javascript" src="js/other-buttons.js"></script>
<script type="text/javascript" src="js/events-free-transport.js"></script>
<script type="text/javascript" src="js/cancel-rent.js"></script>
<div id="content-order">
	<h2>Активные заказы:</h2>
	<?php include('php/reserved_user_transport.php'); ?>
	<p class='add-order-box'><span class="add-order"><b>+</b>ДОБАВИТЬ</span></p>
</div>
<div id="transport-list"></div>
</body>