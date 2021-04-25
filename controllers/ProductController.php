<?php

/**
 * class ProductController
 */

use models\Product;
use components\Pagination;

class ProductController
{
	
	public function actionIndex($page = 1)
	{
		$product = new Product;
		$productList = $product->getListView($page);

		

		// Создаем объект Pagination - постраничная навигация
        $pagination = new Pagination($product->getProductCount() + 1, $page, Product::SHOW_BY_DEFAULT, 'page-');

		require_once ROOT.'/views/product/index.php';

		return true;
	}

}