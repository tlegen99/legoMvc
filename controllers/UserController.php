<?php

use models\User;

/**
 * class UserController
 */
class UserController
{
	
	public function actionLogin()
	{
		$name = '';
		$password = '';

		if (isset($_POST['submit'])) {
			$name = $_POST['login'];
			$password = $_POST['password'];

			$errors = false;

			if (!User::checkName($name)) {
				$errors[] = 'Имя не должно быть короче 3 символов';
			}

			if (!User::checkPassword($password)) {
				$errors[] = 'Пароль не должен быть короче 6 символов';
			}
		}

		echo '<pre>';
		print_r($errors);
		exit;
		
		require_once ROOT.'/views/user/login.php';

		return true;
	}
}