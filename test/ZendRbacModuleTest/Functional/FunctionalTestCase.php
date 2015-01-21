<?php


namespace Aeris\ZendRbacModuleTest\Functional;


use Zend\Test\PHPUnit\Controller\AbstractHttpControllerTestCase;

class FunctionalTestCase extends AbstractHttpControllerTestCase {


	public function setUp() {
		$appConfig = include __DIR__ . '/config/application.config.php';
		$this->setApplicationConfig($appConfig);

		parent::setUp();
	}

	/** @returns array */
	protected function getJsonResponse() {
		$responseContent = $this
			->getResponse()
			->getContent();

		return json_decode($responseContent, $assoc = true);
	}

	protected function assertJsonResponseEquals(array $expectedResponse) {
		$this->assertJsonStringEqualsJsonString(
			json_encode($expectedResponse),
			$this->getResponse()->getContent()
		);
	}

	protected function assertJsonResponseSubset(array $expectedResponseSubset) {
		$this->assertArraySubset(
			$expectedResponseSubset,
			$this->getJsonResponse()
		);
	}

}