<?php include ROOT.'/views/layouts/_header.php'; ?>

<section>
	<div class="container">

		<div class="row mb-4">
			<h2>Редактирование авто</h2>
		</div>
		<div class="row">
			<form method="POST" enctype="multipart/form-data">
				<div class="form-group">
					<label>Бренд</label>
					<select class="form-control" name="brand_id" id="">

						<option value="0">---</option>

					<?php foreach ($brandList as $brand): ?>
						<option value="<?= $brand['id']; ?>" <?php if($product['brand_id'] == $brand['id']) {echo 'selected';} ?>>
							<?= $brand['name_brand']; ?>
						</option>
					<?php endforeach ?>
					</select>
				</div>
				<div class="form-group">
					<label>Наименование</label>
					<input type="text" class="form-control" name="name" value="<?= $product['name']; ?>">
				</div>
				<div class="form-group">
					<label>Описание</label>
					<textarea rows="10" cols="45" class="form-control" name="description"><?= $product['description']; ?></textarea>
				</div>
				<div class="form-group">
					<label>Изображение</label>
					<div class="mb-4">
						<image src="/assets/image/product/<?= $product['image']; ?>" width="200">
					</div>
					<input type="file" class="form-control-file" name="image" value="<?= $product['image']; ?>">
				</div>

				<div class="form-group">
					<input type="submit" class="btn btn-primary" name="submit" value="Сохранить">
				</div>
			</form>
		</div>
	</div>
</section>

<?php include ROOT.'/views/layouts/_footer.php'; ?>