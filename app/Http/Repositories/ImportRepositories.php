<?php

namespace App\Http\Repositories;

use App\Models\DataProviderX;
use App\Models\DataProviderY;
use App\Models\Transaction;
use App\Models\User;
use DateTime;

class ImportRepositories
{

    public function import($data,$provider)
    {
        Transaction::updateOrCreate(['provider_id' => $data['id'],
            'amount' => $data['amount'],
            'currency' => $data['currency'],
            'phone' => $data['phone'],
            'status' => $data['status'],
            'created_at' => $data['created_at'],
            'provider'=>$provider
        ]);
    }

    public function importX($data)
    {
        Transaction::updateOrCreate(['provider_id' => $data['transactionIdentification'],
            'amount' => $data['transactionAmount'],
            'currency' => $data['Currency'],
            'phone' => $data['senderPhone'],
            'status' => $data['transactionStatus'],
            'created_at' => $data['transactionDate'],
            'provider'=>'DataProviderX'
         ]);
    }
}
