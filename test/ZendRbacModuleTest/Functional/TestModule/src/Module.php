<?php


namespace Aeris\ZendRbacModuleTest\TestModule;


use Zend\Mvc\MvcEvent;

class Module {

	public function getConfig() {
		return include __DIR__ . '/config/module.config.php';
	}

	public function getControllerConfig() {
		return include __DIR__ . '/config/controllers.config.php';
	}

	public function onBootstrap(MvcEvent $evt) {
		$eventManager = $evt->getApplication()
			->getEventManager();
		$sharedEventManager = $eventManager
			->getSharedManager();

		$sharedEventManager->attach(
			'Zend\Stdlib\DispatchableInterface',
			MvcEvent::EVENT_DISPATCH_ERROR,
			[$this, 'handleErrorEvent'],
			10
		);
		$eventManager->attach(MvcEvent::EVENT_DISPATCH_ERROR, [$this, 'handleErrorEvent'], -10);

		$sharedEventManager->attach(
			'Zend\Stdlib\DispatchableInterface',
			MvcEvent::EVENT_RENDER_ERROR,
			[$this, 'handleErrorEvent'],
			-10
		);
		$eventManager->attach(MvcEvent::EVENT_RENDER_ERROR, [$this, 'handleErrorEvent'], -10);
	}

	public function handleErrorEvent(MvcEvent $evt) {
		$error = $evt->getError();
		$exception = $evt->getResult()->getVariable('exception');
		xdebug_break();
	}



}