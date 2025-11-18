<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Gallery extends Model
{
    use HasFactory;

    protected $connection = 'mysql';

    protected $fillable = [
        'userID',
        'categoryID',
        'original_photo_path',
        'new_photo_path',
        'status',
    ];
}
