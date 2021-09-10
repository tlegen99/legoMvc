<?php include ROOT.'/views/layouts/_header.php'; ?>

<section>
	<div class="container">

		<div class="row mb-4">
			<h2>Редактирование авто</h2>
		</div>
		<div class="row">
			<div class="col-sm-6">
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
			<div class="col-sm-6" id="form_container">
				<?php require_once ROOT.'/views/admin_product/_images.php'; ?>
			</div>
		</div>
	</div>
</section>

<script>

window.onload = function(){

    function addImage() {

        let form_container = document.getElementById('form_container');
        let formElem = document.querySelector('#formElem');
        let file = document.querySelector('#image_product');

        let url = "/images/product/create/<?=$product['id']; ?>";

        formElem.onsubmit = async (e) => {

            let formData = new FormData(formElem);

            formData.append(file.name, file.files[0]);

            e.preventDefault();

            console.log(url);

            try {
                let response = await fetch(url, {
                    method: 'POST',
                    body: formData
                }).then((response) => {
                    return response.text();
                  })
                  .then((html) => {
                    form_container.innerHTML = html;
                    updateFunction();
                  });

            } catch(e) {
                console.log('error', e);
            }

        };
    }

    function deleteImage() {

        let form_container = document.getElementById('form_container');
        let formElem = document.querySelector('#formElem');
        let delLinks = document.querySelectorAll('.delLink');

        // console.log(delLink)

        for (var i = 0; i < delLinks.length; i++) {

            let url = delLinks[i].dataset.href;

            delLinks[i].addEventListener('click', async function(e){

                let formData = new FormData(formElem);

                e.preventDefault();

                try {
                    let response = await fetch(url, {
                        method: 'DELETE',
                        body: formData
                    }).then((response) => {
                        return response.text();
                      })
                      .then((html) => {
                        form_container.innerHTML = html;
                        updateFunction();
                      });

                } catch(e) {
                    console.log('error', e);
                }
            });
        }
    }

    function updateFunction() {
        addImage();
        deleteImage();
    }

    addImage();
    deleteImage();
}

</script>

<?php include ROOT.'/views/layouts/_footer.php'; ?>

