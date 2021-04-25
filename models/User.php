<?php

namespace models;

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
}