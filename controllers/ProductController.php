<?php

/**
 * class ProductController
 */

use models\Product;
use models\Brand;
use components\Pagination;

class ProductController
{
	
	public function actionIndex($page = 1)
	{
        $limit = 3;
        $offset = $limit * ($page - 1);

        $productList = Product::limit($limit)->offset($offset)->get();
		$productCount =  Product::all()->count() + 1;

		// Создаем объект Pagination - постраничная навигация
        $pagination = new Pagination($productCount, $page, Product::SHOW_BY_DEFAULT, 'page-');

		require_once ROOT.'/views/product/index.php';

		return true;
	}
	public function actionView($id)
	{
		$product = Product::getProductById($id);

		$categories = Brand::getBrandsList();

		require_once ROOT.'/views/product/view.php';

		return true;
	}

}