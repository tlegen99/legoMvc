<?php
declare(strict_types=1);

use models\Product;
use models\Brand;
use service\ProductService;
use components\Pagination;

class ProductController
{
    private ProductService $productService;

    public function __construct()
    {
        $this->productService = new ProductService();
    }

    public function actionIndex($page = 1)
	{
        $productList = $this->productService->getListView($page);
		$productCount =  $this->productService->getProductCount();

		// Создаем объект Pagination - постраничная навигация
        $pagination = new Pagination($productCount, $page, Product::SHOW_BY_DEFAULT, 'page-');

		require_once ROOT.'/views/product/index.php';

		return true;
	}
	public function actionView(int $id)
	{
		$product = Product::getProductById($id);

		$categories = Brand::getBrandsList();

		require_once ROOT.'/views/product/view.php';

		return true;
	}

}