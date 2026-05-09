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
        'PublisherId',
        'genre_id'
    ];
    protected $guarded = [
        'id'
    ];

    public function genre()
    {
        return $this->belongsTo(Genre::class);
    }
}
