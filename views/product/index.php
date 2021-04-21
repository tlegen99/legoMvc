<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Каталог авто</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,500;0,700;1,500;1,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="/assets/css/main.css" type="text/css">
</head>
<body>
	<header class="header">
		Header
	</header>

	<section class="product_model">
		<div class="container">
			<div class="model_wrapper">
				<?php foreach ($productList as $key => $product): ?>
					<div class="row model__item">
						<div class="col-md-6 mb-4">	
							<div class="model-item_title">
								<?= $product['name']; ?>
							</div>
							<div class="model-item_description">
								<?= $product['description']; ?>
							</div>
						</div>
						<div class="col-md-4">
							<div class="model-item_img">
								<img src="/assets/image/<?= $product['image']; ?>" width="400" height="300" alt="">
							</div>
						</div>
					</div>
				<?php endforeach ?>
			</div>

			<?= $pagination->get(); ?>
		</div>
	</section>

	<footer>
		Footer
	</footer>
</body>
</html>