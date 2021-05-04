<?php

/**
 * class Product
 */

namespace models;
use components\Db;

class Product
{

	const SHOW_BY_DEFAULT = 3;
	
	public static function getProductCount()
	{
		$connect = Db::getConnection();

		$sql = "SELECT COUNT(*) FROM product_model";

		$res = $connect->query($sql);
		$count = $res->fetchColumn();

		return $count;
	}

	public static function getProductList()
	{
		$connect = Db::getConnection();

		$sql = "SELECT * FROM product_model";

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

	public static function getProductOffsetList($limit, $offset)
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

	public static function getListView($page)
	{
		// $page = isset($_GET['page']) ? $_GET['page'] : 1;

		$limit = self::SHOW_BY_DEFAULT;

		$offset = $limit * ($page - 1);

		$products = self::getProductOffsetList($limit, $offset);

		return $products;
	}

	public static function createProduct($options)
	{
		$db = Db::getConnection();

		echo '<pre>';
		print_r($db);
		exit;
	}
}