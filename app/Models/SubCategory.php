<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Menu;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SubCategory extends Model
{
    use HasFactory;
    
    protected $connection = 'mysql';
    protected $table = 'subcategory';

    protected $fillable = [
        'id',
        'categoryID',
        'name',
    ];

    public function menuItems(){
        return $this->hasMany(Menu::class, 'subCategoryID');
    }
}
