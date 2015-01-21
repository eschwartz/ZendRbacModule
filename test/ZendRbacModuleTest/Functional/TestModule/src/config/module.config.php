<?php
return [
	'view_manager' => [
		'strategies' => [
			'ViewJsonStrategy'
		],
	],
	'router' => include __DIR__ .'/router.config.php',
	'zend_rbac' => include __DIR__ . '/zend-rbac.config.php'
];