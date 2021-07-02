<?php

use components\AdminBase;
use models\Product;
use models\Brand;

/**
 * class AdminProductController
 */
class AdminProductController extends AdminBase
{
	
	public function actionIndex()
	{
		self::checkAdmin();

		$productList = Product::getProductList();

		require_once ROOT.'/views/admin_product/index.php';
		return true;
	}

	public function actionCreate()
	{
		self::checkAdmin();
		$brandList = Brand::getBrandsListAdmin();

		$options = [];
		$errors = false;

		if (isset($_POST['submit'])) {
			
			$options['brand_id'] = $_POST['brand_id'];
			$options['name'] = $_POST['name'];
			$options['description'] = $_POST['description'];

			$exp_image = pathinfo(array_shift($_FILES["image"]['name']));

			if ($exp_image['filename'] && $exp_image['extension']) {
				$options['image'] = md5($exp_image['filename']).'.'.$exp_image['extension'];
			}else{
				$options['image'] = NULL;
			}

			if (!isset($options['name']) or empty($options['name'])) {
				$errors[] = 'Заполните поле';
			}

			if ($errors == false) {
				$id = Product::createProduct($options, self::checkAdmin());
                if ($id) {

                	$tmpName = array_shift($_FILES["image"]["tmp_name"]);
                    if (is_uploaded_file($tmpName)) {
                        move_uploaded_file($tmpName, ROOT . "/assets/image/product/{$options['image']}");
                    }
                }

                $this->getAddProductImages($id);
			}
		}

		require_once ROOT.'/views/admin_product/create.php';
		return true;
	}

	public function getAddProductImages($id)
	{

		$options = [];

		foreach ($_FILES["image"]['name'] as $key => $imageName) {
			$options['product_id'] = $id;

			$exp_images = pathinfo($imageName);
			if ($exp_images['filename'] && $exp_images['extension']) {
				$options['name'] = md5($exp_images['filename']).'.'.$exp_images['extension'];
			}else{
				$options['name'] = NULL;
			}
			$issetImages = Product::addProductImages($options['name'], $id);

			if ($issetImages) {
				if (is_uploaded_file($_FILES["image"]["tmp_name"][$key]))
				{
			 		move_uploaded_file($_FILES["image"]["tmp_name"][$key], ROOT . "/assets/image/product/{$options['name']}");
			 	}
			 }
		}
	}

	public function actionUpdate($id)
	{
		self::checkAdmin();

		$options = [];

		$brandList = Brand::getBrandsListAdmin();

		$product = Product::getProductById($id);

		$images_product = Product::getImagesUpdate($id);

		if (isset($_POST['submit'])) {
			$options['brand_id'] = $_POST['brand_id'];
			$options['name'] = $_POST['name'];
			$options['description'] = $_POST['description'];
			$options['image'] = $product['image'];

			$exp_image = pathinfo($_FILES["image"]['name']);
			if ($exp_image['filename'] && $exp_image['extension']) {
				$options['image'] = md5($exp_image['filename']).'.'.$exp_image['extension'];
			}
			if(Product::updateProductById($id, $options)) {
                // Проверим, загружалось ли через форму изображение
                if (is_uploaded_file($_FILES["image"]["tmp_name"])) {
                    // Если загружалось, переместим его в нужную папке, дадим новое имя
                    move_uploaded_file($_FILES["image"]["tmp_name"], ROOT . "/assets/image/product/{$options['image']}");
                }

				header("Location: /admin/product");
			}
		}

		require_once ROOT.'/views/admin_product/update.php';
		
		return true;
	}

	public function actionDelete($id)
	{
		self::checkAdmin();

		if(Product::deleteProductById($id))
		{
			header("Location: /admin/product");
		}else{
			echo '<h1>Не фортануло</h1>';
		}
		
		return true;
	}
}