<?php

namespace components;
use models\User;
/**
 * class AdminBase содержит общую логику для контроллеров, которые 
 * используются в панели администратора
 */
class AdminBase
{
	
    public static function checkAdmin()
    {
        $userId = User::checkLogged();

        $user = User::getUserById($userId);

        if ($user['role_user'] == 'admin') {
            return true;
        }

        die('Вы не администратор - <a href="/logout">Выйти</a>');
    }
}