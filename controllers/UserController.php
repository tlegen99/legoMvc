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

			if (User::checkName($name)) {
				echo '<b>Имя заполнено верно</b>';
			}
		}

		if (isset($password)) {
			echo $password . '<br>';
		}
		
		require_once ROOT.'/views/user/login.php';

		return true;
	}
}