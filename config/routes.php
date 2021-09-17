<?php

return [

	// каталог,товары
	'products/([0-9]+)' => 'product/view/$1',
	'products/page-([0-9]+)' => 'product/index/$1',
	'products' => 'product/index',

	// Пользователь:
	'logout' => 'user/logout',
	'login' => 'user/login',

	//Управление товарами:
	'images/product/create/([0-9]+)' => 'imagesProduct/create/$1',
	'images/product/update/([0-9]+)' => 'imagesProduct/update/$1',
	'images/product/delete/([0-9]+)' => 'imagesProduct/delete/$1',

    'admin/product/create' => 'adminProduct/create',
    'admin/product/update/([0-9]+)' => 'adminProduct/update/$1',
    'admin/product/delete/([0-9]+)' => 'adminProduct/delete/$1',
	'admin/product' => 'adminProduct/index',

	//Администратор:
	'admin' => 'admin/index',


	'console/migrate' => 'console/migrate',

	'' => 'site/index',
];