<?php

/**
 * class ImagesProduct
 */

namespace models;
use components\Db;

class ImagesProduct
{


	public static function createProductImageById($product_id, $name)
	{
		$connect = Db::getConnection();

		$sql = "INSERT product_image (product_id, name) VALUES (:product_id, :name)";

		$result = $connect->prepare($sql);
        $result->bindParam(':product_id', $product_id, \PDO::PARAM_INT);
        $result->bindParam(':name', $name, \PDO::PARAM_STR);
        if ($result->execute()) {
            return $connect->lastInsertId();
        }

        return 0;
	}
	
	public static function deleteProductImageById($id, $product_id)
	{
		$connect = Db::getConnection();
		$sql = "DELETE FROM product_image WHERE id = :id AND product_id = :product_id";

		$result = $connect->prepare($sql);
		$result->bindParam(':id', $id, \PDO::PARAM_INT);
		$result->bindParam(':product_id', $product_id, \PDO::PARAM_INT);
		return $result->execute();
	}
}