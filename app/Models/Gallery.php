<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;
    protected $table = "galleries";
    protected $fillable = ['image','cat_id'];
    
    public function CategoryGallery(){
        return $this->belongsTo('App\Models\CategoryGallery','cat_id');
    }

  
}
