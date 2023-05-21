<?php
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Sandık Numarası | Cumhurbaşkanlığı Seçimi Çetelesi</title>
<link rel="stylesheet" type="text/css" href="style/index.css">
<link rel="icon" type="image/x-icon" href="img/tr.png">
</head>
<body>
<form action="islem.php" method="POST">
	<strong class="baslik">Lütfen sandık numarası giriniz.</strong>
	<div class="renk">
		<input type="tel" minlength="4" maxlength="4" id="sandikNo" name="sandikNo" required>
		<button class="eksi" type="submit">Giriş Yap</button>
	</div>
</form>
</body>
</html>