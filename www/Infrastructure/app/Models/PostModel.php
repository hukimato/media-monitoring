<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostModel extends Model
{
    protected $table = 'posts';

    public $timestamps = false;

    protected $fillable = [
        'dateTime',
        'sourceUrl',
        'title',
    ];

    protected function casts()
    {
        return [
            'dateTime' => 'datetime'
        ];
    }
}
