<?php include ROOT.'/views/layouts/_header.php'; ?>

<section>
	<div class="container">

		<a href="/admin/product/create" class="btn btn-success mb-4">
			Добавить авто
		</a>

		<h3>Список авто</h3>

		<table class="table-bordered table-striped table">
			<tr>
				<th>ID</th>
				<th>ID бренда</th>
				<th>Название авто</th>
				<th>Картинка</th>
				<th></th>
				<th></th>
			</tr>

			<?php foreach ($productList as $product): ?>
				<tr>
					<td><?= $product['id']; ?></td>
					<td><?= $product['brand_id']; ?></td>
					<td><?= $product['name']; ?></td>
					<td>
						<image src="/assets/image/<?= $product['image']; ?>" width="100"></image>
					</td>
                    <td>
                    	<a href="/admin/product/update/<?php echo $product['id']; ?>" title="Редактировать">
                    		<i class="fa fa-pencil-square-o"></i>
                    	</a>
                    </td>
                    <td>
                    	<a href="/admin/product/delete/<?php echo $product['id']; ?>" title="Удалить">
                    		<i class="fa fa-times"></i>
                    	</a>
                    </td>
				</tr>
			<?php endforeach ?>
		</table>
	</div>
</section>

<?php include ROOT.'/views/layouts/_footer.php'; ?>