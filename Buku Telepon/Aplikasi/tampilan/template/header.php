<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?= $data['title']; ?></title>
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?= __BERKAS__ ?>/css/style.css?p=<?= rand(); ?>">
</head>
<body>

<div class="w3-orange w3-padding">
	<div class="w3-bar">
		<a href="<?= __URL__ ?>/" class="w3-bar-item w3-button w3-orange"><i class="fa fa-home"></i> Home</a>
		<a href="<?= __URL__ ?>/utama/settings/" class="w3-bar-item w3-button w3-orange"><i class="fa fa-cogs"></i> Settings</a>
		<a href="<?= __URL__ ?>/utama/logout/" class="w3-bar-item w3-button w3-orange"><i class="fa fa-sign-out"></i> Logout</a>
	</div>
</div>