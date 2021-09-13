<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?= $data['title'] ?></title>
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?= __BERKAS__ ?>/css/style.css?p=<?= rand(); ?>">
</head>
<body>

<div id="p-login">
	<div class="w3-round w3-card-4 w3-container w3-margin-bottom">
		<h2><i class="fa fa-vcard-o"></i> Buku Telepon</h2>
		<hr>
		<p>
			<label>Email Address:</label>
			<input type="email" class="w3-input w3-border" id="email">
		</p>
		<p>
			<label>Password:</label>
			<input type="password" class="w3-input w3-border" id="password">
		</p>
		<p>
			<button class="w3-button w3-green w3-round" onclick="login()"><i class="fa fa-send-o"></i> Login</button>
		</p>
	</div>

	<div class="w3-padding w3-light-grey w3-center">
		<i>Dibuat dengan kasih sayang oleh <b>Fittra Ferdiansyah</b> &copy;2021.</i>
	</div>
</div>

<script src="<?= __BERKAS__ ?>/js/app.js"></script>
</body>
</html>