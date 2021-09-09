<form method="POST" id="formElem" enctype="multipart/form-data">
	<div class="form-group">
		<label>Изображения</label>
		<div class="d-flex">
			<input type="file" class="form-control-file" name="image_product" id="image_product">
			<input type="submit" 
				   class="btn btn-success" 
				   name="submit_image" 
				   value="Добавить" disabled>
		</div>
	</div>
</form>
<table class="table-bordered table image-update">
	<tr style="background-color: rgba(0,0,0,.05);">
		<th>Картинка</th>
		<th></th>
		<th></th>
	</tr>

	<?php foreach ($images_product as $image): ?>
		<tr>
			<td>
				<image src="/assets/image/product/<?= $image['name']; ?>" width="100">
			</td>
            <td>
            	<a href="/images/product/update/<?= $image['id']; ?>" title="Редактировать">
            		<i class="fa fa-pencil-square-o"></i>
            	</a>
            </td>
            <td>
            	<a id="delLink" href="/images/product/delete/<?= $image['id']; ?>" title="Удалить">
            		<i class="fa fa-times"></i>
            	</a>
            </td>
		</tr>
	<?php endforeach ?>
</table>