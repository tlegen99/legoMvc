<?php

namespace models;
use components\Db;

/**
 * class User
 */
class User
{
	
	public static function login()
	{
			
	}	

	public static function checkName($name)
	{
		if (strlen($name) >= 3) {
			return true;
		}	

		return false;
	}
	
	public static function checkPassword($password)
	{
		if (strlen($password) >= 6) {
			return true;
		}	

		return false;
	}

	public static function checkNameExist($name)
	{
		$db = Db::getConnection();
		$sql = "SELECT COUNT(*) FROM users WHERE nick_name = :nick_name";
		$result = $db->prepare($sql);
		$result->bindParam(':nick_name', $name, \PDO::PARAM_STR);
		$result->execute();

		if ($result->fetchColumn()) {
			return true;
		}
		return false;

	}

	// public static function pass()
	// {
	// 	$db = Db::getConnection();
	// 	$sql = "SELECT pass_hash FROM users WHERE nick_name = 'admin'";

	// 	$result = $db->prepare($sql);
	// 	$result->execute();
	// 	$row = $result->fetch();

	// 	return $row;
	// }
}