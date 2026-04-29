<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table = 'Transactions'; 

    protected $primaryKey = 'TransactionID';

    public $timestamps = false;

    protected $fillable = [
        'TransactionDate',
        'TransactionType',
        'Status',
        'UserID',
        'SoftwareID',
        'Amount',
        'ParentTransactionID'
    ];
}