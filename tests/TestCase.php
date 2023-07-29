<?php
namespace tests;
use Laravel\Lumen\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    /**
     * Creates the application.
     *
     * @return \Laravel\Lumen\Application
     */
    public function createApplication()
    {

        return  $this->addTestFiles([
            __DIR__.'/TransactionControllerTest.php',
            __DIR__.'/../bootstrap/app.php'
        ]);

    }
}
