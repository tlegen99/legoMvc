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
	'admin/product-images/delete/([0-9]+)' => 'ImagesProduct/delete/$1',
    'admin/product/create' => 'adminProduct/create',
    'admin/product/update/([0-9]+)' => 'adminProduct/update/$1',
    'admin/product/delete/([0-9]+)' => 'adminProduct/delete/$1',
	'admin/product' => 'adminProduct/index',

	//Администратор:
	'admin' => 'admin/index',

	'' => 'site/index',
];