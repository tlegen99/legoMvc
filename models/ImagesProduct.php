<?php

/**
 * class ImagesProduct
 */

namespace models;
use components\Db;

class ImagesProduct
{
	
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