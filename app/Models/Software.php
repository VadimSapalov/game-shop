<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Software extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'Title',
        'Description',
        'Price',
        'ReleaseDate',
        'Discount',
        'DeveloperId',
        'PublisherId'
    ];
    protected $guarded = [
        'id'
    ];
}
