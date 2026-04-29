<?php

namespace App\Http\Controllers;

use App\Models\Software;
use App\Models\Transaction;

class MainController extends Controller
{
    public function show(Software $software)
    {
        $isOwned = false;

        if (auth()->check()) {
            $isOwned = Transaction::where('UserID', auth()->id())
                ->where('SoftwareID', $software->id)
                ->where('TransactionType', 'Purchase')
                ->where('Status', 'Successful')
                ->whereNotIn('TransactionID', function ($query) {
                    $query->select('ParentTransactionID')
                        ->from('Transactions')
                        ->where('TransactionType', 'Refund')
                        ->where('Status', 'Successful')
                        ->whereNotNull('ParentTransactionID');
                })
                ->exists();
        }

        return view('show', compact('software', 'isOwned'));
    }

    public function library()
    {
        $userId = auth()->id();

        //Запит на отримання списку транзакцій користувача без refund, для формування бібліотеки 
        $softwares = Software::whereIn('id', function ($query) use ($userId) {
            $query->select('SoftwareID')
                ->from('Transactions')
                ->where('UserID', $userId)
                ->where('TransactionType', 'Purchase')
                ->where('Status', 'Successful')
                ->whereNotIn('TransactionID', function ($subquery) {
                    $subquery->select('ParentTransactionID')
                        ->from('Transactions')
                        ->where('TransactionType', 'Refund')
                        ->where('Status', 'Successful')
                        ->whereNotNull('ParentTransactionID');
                });
        })->get();

        return view('library', compact('softwares'));
    }
}