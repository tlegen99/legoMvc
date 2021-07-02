<?php

use components\AdminBase;
use models\Product;
use models\ImagesProduct;

/**
 * class ImagesProductController
 */
class ImagesProductController extends AdminBase
{
	
	public function actionCreate($product_id)
	{

		$name = '';

		if (isset($_POST['submit_image'])) {

			$exp_image = pathinfo($_FILES["image_product"]['name']);

			if ($exp_image['filename'] && $exp_image['extension']) {
				$name = md5($exp_image['filename']).'.'.$exp_image['extension'];
			}else{
				$name = NULL;
			}

			$id = ImagesProduct::createProductImageById($product_id, $name);
            if ($id) {

            	$tmpName = $_FILES["image_product"]["tmp_name"];
                if (is_uploaded_file($tmpName)) {
                    move_uploaded_file($tmpName, ROOT . "/assets/image/product/{$name}");
                }

                header("Location: /admin/product/update/{$product_id}");
            }
		}
	}
	
	public function actionDelete($id)
	{
		self::checkAdmin();

		$product_id = Product::getImageProductById($id);

		if(ImagesProduct::deleteProductImageById($id, $product_id))
		{
			header("Location: /admin/product/update/{$product_id}");
		}
		
		return true;
	}
}