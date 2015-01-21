<?php


namespace Aeris\ZendRbacModuleTest\Functional;


class IsItWorkingTest extends FunctionalTestCase {

	/** @test */
	public function shouldHitATestModuleEndpoint() {
		$this->dispatch('/users/bob', 'GET');

		$this->assertJsonResponseSubset([
			'name' => 'bob'
		]);
	}

}