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

	public static function createProduct($options, $user_id)
	{
		$connect = Db::getConnection();

		$sql = "INSERT product_model (brand_id, user_id, name, description, image) VALUES (:brand_id, :user_id, :name, :description, :image)";

		$result = $connect->prepare($sql);
        $result->bindParam(':brand_id', $options['brand_id'], \PDO::PARAM_INT);
        $result->bindParam(':user_id', $user_id, \PDO::PARAM_INT);
        $result->bindParam(':name', $options['name'], \PDO::PARAM_STR);
        $result->bindParam(':description', $options['description'], \PDO::PARAM_STR);
        $result->bindParam(':image', $options['image'], \PDO::PARAM_STR);
        if ($result->execute()) {
            // Если запрос выполенен успешно, возвращаем id добавленной записи
            return $connect->lastInsertId();
        }
        // Иначе возвращаем 0
        return 0;
	}

	public static function getProductById($id)
	{
		$connect = Db::getConnection();
		$sql = "SELECT * FROM product_model WHERE id = {$id}";

		$result = $connect->prepare($sql);

		//приводит к норм(дефолтной) выборке из базы в массиве
		$result->setFetchMode(\PDO::FETCH_ASSOC);

		//запускает команду
		$result->execute();
		//возвращаем полученный результат
		return $result->fetch();
	}

	public static function updateProductById($id, $options)
	{
		$connect = Db::getConnection();
		$sql = "UPDATE product_model SET brand_id = :brand_id,name = :name,description = :description, image = :image WHERE id = :id";

		$result = $connect->prepare($sql);
		$result->bindParam(':id', $id, \PDO::PARAM_INT);
		$result->bindParam(':brand_id', $options['brand_id'], \PDO::PARAM_INT);
		$result->bindParam(':name', $options['name'], \PDO::PARAM_STR);
		$result->bindParam(':description', $options['description'], \PDO::PARAM_STR);
		$result->bindParam(':image', $options['image'], \PDO::PARAM_STR);
		return $result->execute();
	}
}