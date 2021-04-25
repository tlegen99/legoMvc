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
		if ($name >= 3) {
			return true;
		}	

		return false;
	}
	
	public static function checkPassword($password)
	{
			
	}	
}