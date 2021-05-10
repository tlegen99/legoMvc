<?php

use components\AdminBase;
use models\Product;

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

		$options = [];
		$errors = false;

		if (isset($_POST['submit'])) {
			
			$options['brand_id'] = $_POST['brand_id'];
			$options['name'] = $_POST['name'];
			$options['description'] = $_POST['description'];
			// $options['image'] = $_POST['image'];

			if (!isset($options['name']) or empty($options['name'])) {
				$errors[] = 'Заполните поле';
			}

			echo '<pre>';
			print_r($_FILES['image']);
			exit;
			if ($errors == false) {
				$id = Product::createProduct($options, self::checkAdmin());

                // Если запись добавлена
                if ($id) {
                    // Проверим, загружалось ли через форму изображение
                    if (is_uploaded_file($_FILES["image"]["tmp_name"])) {
                        // Если загружалось, переместим его в нужную папке, дадим новое имя
                        move_uploaded_file($_FILES["image"]["tmp_name"], $_SERVER['DOCUMENT_ROOT'] . "/upload/images/products/{$id}.jpg");
                    }
                };
			}

		}

		require_once ROOT.'/views/admin_product/create.php';
		return true;
	}
}