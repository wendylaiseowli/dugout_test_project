<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\SubCategory;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Menu extends Model
{
    use HasFactory;
    
    protected $connection = 'mysql';

    protected $fillable = [
        'id',
        'userID',
        'menu_item_name',
        'menu_item_description',
        'price',
        'subCatgeoryID', 
        'status'
    ];
}
