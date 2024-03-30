<?php

namespace models;

use components\Db;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;
    protected $table = 'product_model';

	public const SHOW_BY_DEFAULT = 3;

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
            return $connect->lastInsertId();
        }

        return 0;
	}

	public static function addProductImages($nameImage, $product_id)
	{
		$connect = Db::getConnection();

		$sql = "INSERT product_image (product_id, name) VALUES (:product_id, :name)";

		$result = $connect->prepare($sql);
        $result->bindParam(':product_id', $product_id, \PDO::PARAM_INT);
        $result->bindParam(':name', $nameImage, \PDO::PARAM_STR);

        if ($result->execute()) {
            return $connect->lastInsertId();
        }

        return 0;
	}

	public static function getProductById(int $id)
	{
		return self::where('id', $id)->get();
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

	public static function deleteProductById($id)
	{
		$connect = Db::getConnection();
		$sql = "DELETE FROM product_model WHERE id = :id";

		$result = $connect->prepare($sql);
		$result->bindParam(':id', $id, \PDO::PARAM_INT);
		return $result->execute();
	}


    public static function getImageUrl($name_image)
    {
    	$noImage = 'no-image.jpg';
    	$path = '/assets/image/product/';
    	$filePath = $path . $name_image;

    	if (file_exists(ROOT.$filePath)) {
    		return $filePath;
    	}

    	return $path . $noImage;
	}

	//вывод картинок у выбранного товара при редактировании
    public static function getImagesUpdate($product_id)
    {
		$connect = Db::getConnection();
		$sql = "SELECT * FROM product_image WHERE product_id = {$product_id}";

		$result = $connect->prepare($sql);

		//приводит к норм(дефолтной) выборке из базы в массиве
		$result->setFetchMode(\PDO::FETCH_ASSOC);

		//запускает команду
		$result->execute();
		//возвращаем полученный результат
		return $result->fetchAll();
	}
	//вывод id картинки по id товара
    public static function getImageProductById($image_id)
    {
		$connect = Db::getConnection();
		$sql = "SELECT product_id FROM product_image WHERE id = {$image_id}";

		$result = $connect->prepare($sql);

		//приводит к норм(дефолтной) выборке из базы в массиве
		$result->setFetchMode(\PDO::FETCH_ASSOC);

		//запускает команду
		if ($result->execute()) {
			//возвращаем полученный результат
			return $result->fetchColumn();
		};
	}
	//вывод id картинки по id товара
    public static function getImageProductByName($image_id)
    {
		$connect = Db::getConnection();
		$sql = "SELECT name FROM product_image WHERE id = {$image_id}";

		$result = $connect->prepare($sql);

		//приводит к норм(дефолтной) выборке из базы в массиве
		$result->setFetchMode(\PDO::FETCH_ASSOC);

		//запускает команду
		if ($result->execute()) {
			//возвращаем полученный результат
			return $result->fetchColumn();
		};
	}
}