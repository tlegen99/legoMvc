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

		$errors = false;

		// echo '<pre>';
		// print_r(md5(User::pass()['pass_hash']));
		// exit;

		if (isset($_POST['submit'])) {
			$name = $_POST['login'];
			$password = $_POST['password'];

			if (!User::checkName($name)) {
				$errors[] = 'Имя не должно быть короче 3 символов';
			}

			if (!User::checkPassword($password)) {
				$errors[] = 'Пароль не должен быть короче 6 символов';
			}

			if (User::checkNameExist($name)) {
				$errors[] = 'Такой логин уже существует';
			}


			$userId = User::checkUserData($name, $password);

			if ($userId == false) {
				$errors[] = 'Неверные данные для входа';
			}else{
				User::auth($userId);
				header('Location: /admin');
			}
		}
		
		require_once ROOT.'/views/user/login.php';

		return true;
	}

	public function actionLogout()
	{
		unset($_SESSION['user']);
		header('Location: /');
	}
}