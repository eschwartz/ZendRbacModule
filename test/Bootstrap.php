<?php
use Zend\Loader\AutoloaderFactory;
use Zend\Mvc\Service\ServiceManagerConfig;
use Zend\ServiceManager\ServiceManager;

error_reporting(E_ALL | E_STRICT);
chdir(__DIR__);

class Bootstrap {

	protected static $serviceManager;

	public static function init() {
		static::initAutoloader();
	}

	protected static function initAutoloader() {
		$vendorPath = static::findParentPath('vendor');

		$zf2Path = getenv('ZF2_PATH');
		if (!$zf2Path) {
			if (defined('ZF2_PATH')) {
				$zf2Path = ZF2_PATH;
			} elseif (is_dir($vendorPath . '/ZF2/library')) {
				$zf2Path = $vendorPath . '/ZF2/library';
			} elseif (is_dir($vendorPath . '/zendframework/zendframework/library')) {
				$zf2Path = $vendorPath . '/zendframework/zendframework/library';
			}
		}

		if (!$zf2Path) {
			throw new RuntimeException(
				'Unable to load ZF2. Run `php composer.phar install` or'
				. ' define a ZF2_PATH environment variable.'
			);
		}

		if (file_exists($vendorPath . '/autoload.php')) {
			include $vendorPath . '/autoload.php';
		}

		include $zf2Path . '/Zend/Loader/AutoloaderFactory.php';
		AutoloaderFactory::factory(array(
			'Zend\Loader\StandardAutoloader' => array(
				'autoregister_zf' => true,
				'namespaces' => array(
					__NAMESPACE__ => __DIR__ . '/' . __NAMESPACE__,
				),
			),
		));
	}

	protected static function findParentPath($path) {
		$parentPath = $path;
		$dir = __DIR__;
		$previousDir = '.';
		while (!is_dir($dir . '/' . $path)) {
			$dir = dirname($dir);
			if ($previousDir === $dir) {
				throw new \Exception("Unable to find parent path '$parentPath'");
			}
			$previousDir = $dir;
		}
		return $dir . '/' . $path;
	}
}

Bootstrap::init();