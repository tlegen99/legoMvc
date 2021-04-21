<?php

/**
 * class Product
 */
class Product
{

	const SHOW_BY_DEFAULT = 3;
	
	public function getProductList($limit, $offset)
	{
		$connect = Db::getConnection();

		$sql = "SELECT * FROM product_model LIMIT {$limit} OFFSET {$offset}";

		$productList = [];

		foreach ($connect->query($sql) as $key => $row) {
			$productList[$key]['id'] = $row['id'];
			$productList[$key]['brand_id'] = $row['brand_id'];
			$productList[$key]['user_id'] = $row['user_id'];
			$productList[$key]['name'] = $row['name'];
			$productList[$key]['description'] = $row['description'];
			$productList[$key]['image'] = $row['image'];
		}

		return $productList;
	}

	public function getListView($page)
	{
		// $page = isset($_GET['page']) ? $_GET['page'] : 1;

		$limit = self::SHOW_BY_DEFAULT;

		$offset = $limit * ($page - 1);

		$products = $this->getProductList($limit, $offset);

		return $products;
	}
}