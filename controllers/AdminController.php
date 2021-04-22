<?php


/**
 * class AdminController
 */
class AdminController
{
	
	public function actionLogin()
	{
		
		if (isset($_POST['submit'])) {
			$name = $_POST['login'];
			$password = $_POST['password'];
		}

		if (isset($name)) {
			echo $name . '<br>';
		}

		if (isset($password)) {
			echo $password . '<br>';
		}
		
		require_once ROOT.'/views/admin/login.php';

		return true;
	}
}