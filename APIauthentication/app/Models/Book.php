<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'image',
        'pages',
        'language',
        'price',
        'type',
        'publisher',
        'status'
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'book_user')->withPivot('current_date','last_date');
    }
}
