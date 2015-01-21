<?php
return [

	'modules' => [
		'Aeris\ZendRbacModule',
		'Aeris\ZendRbacModuleTest\TestModule',
	],
	'module_listener_options' => [
		'module_paths' => [
			__DIR__ . '/../',
			__DIR__ . '/../../../../src/',
			__DIR__ . '/../../../../vendor',
		],
		'config_glob_paths' => [
			'config/autoload/{,*.}{global,local,test}.php',
		]
	]
];
