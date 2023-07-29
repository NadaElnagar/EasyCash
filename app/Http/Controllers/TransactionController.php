<?php

namespace App\Http\Controllers;

use App\Http\Repositories\TransactionRepositories;
use App\Http\Requests\TransactionRequest;
use App\Http\Resources\Transaction;
use App\Http\Services\ImportServices;

class TransactionController extends Controller
{
    public function filter(TransactionRequest $request)
    {
        $data =  (new TransactionRepositories)->transaction($request);
        return Transaction::collection($data);
    }


    public function import()
    {
       return (new ImportServices())->import();
    }
}
