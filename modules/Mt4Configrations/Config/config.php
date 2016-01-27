<?php

return [
	'is_admin' => 1,
	'is_client' => 0,
	'name' => 'Mt4Configrations',
	'icon' => 'fa-info-circle',
	'route' => '',
	'admin_menu' => [
		[
			'route' => 'admin.mt4Configrations.symbolsList',
			'title' => 'symbolsList',
			'icon' => 'fa-briefcase',
		],
		[
			'route' => 'admin.mt4Configrations.securitiesList',
			'title' => 'securitiesList',
			'icon' => 'fa-briefcase',
		],
		[
			'route' => 'admin.mt4Configrations.groupsList',
			'title' => 'groupsList',
			'icon' => 'fa fa-group',
		],



	],
	'client_menu' => [


	]
];