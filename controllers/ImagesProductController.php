<?php

use components\AdminBase;
use models\Product;
use models\ImagesProduct;

/**
 * class ImagesProductController
 */
class ImagesProductController extends AdminBase
{
	
	public function actionCreate($productId)
	{

		$name = '';

		if (isset($_POST['submit_image'])) {

			$exp_image = pathinfo($_FILES["image_product"]['name']);

			if ($exp_image['filename'] && $exp_image['extension']) {
				$name = md5($exp_image['filename'] . uniqid()).'.'.$exp_image['extension'];
			}else{
				$name = NULL;
			}

			$id = ImagesProduct::createProductImageById($productId, $name);
            if ($id) {

            	$tmpName = $_FILES["image_product"]["tmp_name"];
                if (is_uploaded_file($tmpName)) {
                    move_uploaded_file($tmpName, ROOT . "/assets/image/product/{$name}");
                }

            }

            header("Location: /admin/product/update/{$productId}");
		}

		// require_once ROOT.'/views/admin_product/update.php';
		return true;
	}
	
	public function actionUpdate($productId)
	{
		echo '<pre>';
		print_r($productId);
		exit;
	}
	
	public function actionDelete($id)
	{
		self::checkAdmin();

		$productId = Product::getImageProductById($id);
		$fileName = Product::getImageProductByName($id);
		
		$path = ROOT . "/assets/image/product/";
		$filePath = $path . $fileName;

		if(ImagesProduct::deleteProductImageById($id, $productId))
		{
			if (file_exists($filePath)) {
				unlink($filePath);
			}
			
			header("Location: /admin/product/update/{$productId}");
		}
		
		return true;
	}
}