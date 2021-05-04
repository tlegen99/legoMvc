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
		$productList = Product::getListView($page);
		$productCount = Product::getProductCount() + 1;

		// Создаем объект Pagination - постраничная навигация
        $pagination = new Pagination($productCount, $page, Product::SHOW_BY_DEFAULT, 'page-');

		require_once ROOT.'/views/product/index.php';

		return true;
	}

}