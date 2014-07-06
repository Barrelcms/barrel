<?php

class TestCase extends Illuminate\Foundation\Testing\TestCase {

	public function __construct()
	{
		$this->testPath = __DIR__;
		$this->storage = $this->testPath.'/storage/';
	}

	/**
	 * Creates the application.
	 *
	 * @return \Symfony\Component\HttpKernel\HttpKernelInterface
	 */
	public function createApplication()
	{
		$unitTesting = true;

		$testEnvironment = 'testing';

		return require __DIR__.'/../../bootstrap/start.php';
	}

}
