<?php
return [
	'routes' => [
		'users' => [
			'type' => 'segment',
			'options' => [
				'route' => '/users[/:id][/]',
				'defaults' => [
					'controller' => 'Aeris\ZendRbacModuleTest\TestModule\Controller\UserRest',
				],
			]
		]
	]
];