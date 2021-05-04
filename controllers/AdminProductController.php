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

		if (isset($_POST['submit'])) {
			
			$options['brand_id'] = $_POST['brand_id'];
			$options['name'] = $_POST['name'];
			$options['description'] = $_POST['description'];
			$options['image'] = $_POST['image'];

			$erorrs = false;

			if (!isset($options['name']) or empty($options['name'])) {
				$erorrs[] = 'Заполните поле';
			}

			if ($erorrs == false) {
				$id = Product::createProduct($options);

				echo $id;
			}

		}

		require_once ROOT.'/views/admin_product/create.php';
		return true;
	}
}