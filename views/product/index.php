<?php include ROOT.'/views/layouts/_header.php'; ?>

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

<?php include ROOT.'/views/layouts/_footer.php'; ?>