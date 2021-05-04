<?php include ROOT.'/views/layouts/_header.php'; ?>

<section>
	<div class="container">
		<div class="col-sm-6">
			<h2 class="mb-4">Добавление авто</h2>
			<form method="POST">
				<div class="form-group">
					<label>Бренд</label>
					<input type="text" class="form-control" name="brand_id">
				</div>
				<div class="form-group">
					<label>Наименование</label>
					<input type="text" class="form-control" name="name">
				</div>
				<div class="form-group">
					<label>Описание</label>
					<textarea rows="10" cols="45" class="form-control" name="description"></textarea>
				</div>
				<div class="form-group">
					<label>Изображение</label>
					<input type="file" class="form-control-file" name="image">
				</div>

				<div class="form-group">
					<input type="submit" class="btn btn-primary" name="submit">
				</div>
			</form>
		</div>
	</div>
</section>

<?php include ROOT.'/views/layouts/_footer.php'; ?>