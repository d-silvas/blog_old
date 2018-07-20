<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<!--<link rel="icon" href="../../favicon.ico">-->

	<title>CyberTricks blog</title>

	<link rel="stylesheet" href="<?= base_url("assets/css/libraries/bootstrap.min.css") ?>">
	<link rel="stylesheet" href="<?= base_url("assets/css/common.css") ?>">
	<?php
	if (isset($css)) {
		foreach ($css as $css_file) {
			echo "<link href='".$css_file."' rel='stylesheet'>";
		}
	}
	?>
</head>
<body>

	<!-- NAV BAR -->
	<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
		<a class="navbar-brand" href="<?= base_url() ?>">CyberTricks</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarsExampleDefault">
			<ul class="navbar-nav mr-auto">
				<!-- Classes: active disabled -->
				<?php foreach ($categories as $category): ?>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="http://example.com" id="dropdown01"
						data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<?= $category->name ?>
					</a>
					<div class="dropdown-menu" aria-labelledby="dropdown01">
					<?php foreach ($category->subcategories as $subcategory): ?>
						<a class="dropdown-item" href="<?= base_url("index.php/subcategory/index/".$subcategory->id) ?>">
							<?= $subcategory->name ?>
						</a>
					<?php endforeach; ?>
					</div>
				</li>
				<?php endforeach; ?>
				<?php if (ENVIRONMENT === 'development'): ?>
				<li class="nav-item">
					<a class="nav-link" href="<?= base_url("index.php/post/working_on/") ?>">Working on</a>
				</li>
				<?php endif; ?>
			</ul>
			<form class="form-inline my-2 my-lg-0">
				<input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
				<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
			</form>
		</div>
	</nav>
