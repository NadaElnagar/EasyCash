<?php

namespace tests;

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class TransactionControllerTest extends TestCase
{

    public function testGetTransactions()
    {
        // Create a new request instance
        $this->get('/api/v1/transactaions');
        // Assert that the response status code is 200 (OK)
        $this->assertEquals(
            $this->app->version(), $this->response->getContent()
        );

        // Assert that the response contains all transactions in the database
        $transactions = \App\Models\Transaction::all();
        $this->assertEquals($transactions->toArray(), json_decode($this->response->getContent(), true));
    }


    public function testFilterByProvider()
    {
        // Filter the transactions by provider = DataProviderW
        $this->get('/api/v1/transactaions?provider=DataProviderW');

        // Assert that the response status code is 200 (OK)
        $this->assertEquals(
            $this->app->version(), $this->response->getContent()
        );

        // Assert that the response contains only transactions from DataProviderW
        $this->assertEquals(
            \App\Models\Transaction::where('provider', 'DataProviderW')->get()->toArray(),
            json_decode($this->response->getContent(), true)
        );
    }

    public function testFilterByStatusCode()
    {
        // Filter the transactions by status code paid.
        $this->get(  '/api/v1/transactaions?statusCode=paid');

        // Assert that the response status code is 200 (OK)
        $this->assertEquals(
            $this->app->version(), $this->response->getContent()
        );

        // Assert that the response contains only transactions from DataProviderW
        $this->assertEquals(
            \App\Models\Transaction::whereIn('status', ['done', 1, 100])->get()->toArray(),
            json_decode($this->response->getContent(), true)
        );
    }

    public function testFilterByAmount()
    {
        // Filter the transactions by amounteMin = 50
        $this->get('GET', '/api/v1/transactaions?amounteMin=50');

        // Assert that the response status code is 200 (OK)
        $this->assertEquals(
            $this->app->version(), $this->response->getContent()
        );


        $this->assertEquals(
            \App\Models\Transaction::where('amount', '>=', 50)->get()->toArray(),
            json_decode( $this->response->getContent(), true)
        );
    }

    public function testFilterByCurrency()
    {
        // Filter the transactions by currency = EGP
        $this->get('GET', '/api/v1/transactaions?currency=EGP');

        // Assert that the response status code is 200 (OK)
        $this->assertEquals(
            $this->app->version(), $this->response->getContent()
        );


        $this->assertEquals(
            \App\Models\Transaction::where('currency', 'EGP')->get()->toArray(),
            json_decode($this->response->getContent(), true)
        );
    }
}
