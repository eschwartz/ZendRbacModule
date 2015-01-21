<?php


namespace Aeris\ZendRbacModuleTest\TestModule\Controller;


use Zend\Mvc\Controller\AbstractRestfulController;
use Zend\View\Model\JsonModel;

class UserRestController extends AbstractRestfulController {

	public function get($name) {
		return new JsonModel([
			'name' => $name
		]);
	}

}