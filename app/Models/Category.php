<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = ['name'];
    public function Subcategories()
    {
    	return $this->hasMany('App\Models\Subcategory','categorie_id')->where('subcategories.deleted_at', NULL);
    	return $this->hasMany('App\Models\News','category_id')->where('subcategories.deleted_at', NULL);
    }

}
