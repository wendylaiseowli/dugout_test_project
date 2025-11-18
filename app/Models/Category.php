<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\SubCategory;
use App\Models\Gallery;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    protected $connection = 'mysql';
    protected $table ='category';
    
    protected $fillable =[
        'name',
    ];

    public function subcategories(){
        return $this->hasMany(SubCategory::class, 'categoryID');
    }

    public function galleries(){
        return $this->hasMany(Gallery::class, 'categoryID');
    }
}
