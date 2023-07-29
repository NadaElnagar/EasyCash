<?php

namespace App\Http\Repositories;


use App\Models\Transaction;

class TransactionRepositories
{

    public function transaction($request)
    {
        // Get the transactions from the database
        $query = Transaction::query();

        // Filter the transactions by provider (if specified)
        $provider = $request->query('provider');
        if ($provider) {
            $query->where('provider', $provider);
        }

        // Filter the transactions by status code (if specified)
        $statusCode = $request->query('statusCode');
        if ($statusCode) {
            switch ($statusCode) {
                case 'paid':
                    $query->whereIn('status', ['done', 1, 100]);
                    break;
                case 'pending':
                    $query->whereIn('status', ['wait', 2, 200]);
                    break;
                case 'reject':
                    $query->whereIn('status', ['nope', 3, 300]);
                    break;
            }
        }

        // Filter the transactions by amount range (if specified)
        $amountMin = $request->query('amounteMin');
        $amountMax = $request->query('amounteMax');
        if ($amountMin || $amountMax) {
            if ($amountMin && $amountMax) {
                $query->whereBetween('amount', [$amountMin, $amountMax]);
            } elseif ($amountMin) {
                $query->where('amount', '>=', $amountMin);
            } elseif ($amountMax) {
                $query->where('amount', '<=', $amountMax);
            }
        }

        // Filter the transactions by currency (if specified)
        $currency = $request->query('currency');
        if ($currency) {
            $query->where('currency', $currency);
        }

        // Sort the transactions by date (if specified)
        $sortByDate = $request->query('sortByDate');
        if ($sortByDate) {
            $query->orderBy('created_at', 'desc');
        }

        // Execute the query and return the filtered transactions
        return $query->get();
     }


}
