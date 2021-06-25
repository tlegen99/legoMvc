<?php

/**
 * class Brand
 */

namespace models;
use components\Db;

class Brand
{
    public static function getBrandsList()
    {
		$connect = Db::getConnection();

		$result = $connect->query('SELECT id, name_brand FROM product_brand ORDER BY sort_order ASC');

        $brandList = [];
        $i = 0;
        while ($row = $result->fetch()) {
            $brandList[$i]['id'] = $row['id'];
            $brandList[$i]['name_brand'] = $row['name_brand'];
            $i++;
        }
        return $brandList;
	}
	public static function getBrandsListAdmin()
	{
		$connect = Db::getConnection();

		$result = $connect->query('SELECT id, name_brand, description, sort_order, status FROM product_brand ORDER BY sort_order ASC');

        $brandList = array();
        $i = 0;
        while ($row = $result->fetch()) {
            $brandList[$i]['id'] = $row['id'];
            $brandList[$i]['name_brand'] = $row['name_brand'];
            $brandList[$i]['description'] = $row['description'];
            $brandList[$i]['sort_order'] = $row['sort_order'];
            $brandList[$i]['status'] = $row['status'];
            $i++;
        }
        return $brandList;
	}
}

?>