<?php

use components\AdminBase;
use models\Product;
use models\ImagesProduct;

/**
 * class ImagesProductController
 */
class ImagesProductController extends AdminBase
{
	
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