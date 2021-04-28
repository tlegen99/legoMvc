<?php

namespace models;
use components\Db;

/**
 * class User
 */
class User
{

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
		$sql = "SELECT COUNT(*) FROM users WHERE nick_name = :nick_name AND status = 1";
		$result = $db->prepare($sql);
		$result->bindParam(':nick_name', $name, \PDO::PARAM_STR);
		$result->execute();

		if ($result->fetchColumn()) {
			return true;
		}
		return false;

	}

	public static function checkUserData($name, $password)
	{

		$password = md5($password);

		$db = Db::getConnection();
		$sql = "SELECT * FROM users WHERE nick_name = :nick_name AND pass_hash = :pass_hash";
		$result = $db->prepare($sql);
		$result->bindParam(':nick_name', $name, \PDO::PARAM_STR);
		$result->bindParam(':pass_hash', $password, \PDO::PARAM_STR);
		$result->execute();

		$user = $result->fetch();
		if ($user) {
			return $user['id'];
		}
		return false;
	}

	//запоминание пользователя
	public static function auth($userId)
	{
		$_SESSION['user'] = $userId;
	}

	public static function checkLogged()
	{
		if (isset($_SESSION['user'])) {
			return $_SESSION['user'];
		}

		header('Location: /login');
	}


    public static function isGuest()
    {
        if (isset($_SESSION['user'])) {
            return false;
        }
        return true;
    }

    public static function getUserById($id)
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = 'SELECT * FROM users WHERE id = :id';

        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, \PDO::PARAM_INT);

        // Указываем, что хотим получить данные в виде массива
        $result->setFetchMode(\PDO::FETCH_ASSOC);
        $result->execute();

        return $result->fetch();
    }
}