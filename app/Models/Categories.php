<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
/**
 * Class Categories
 * @package App
 * 
 * @property string title
 */
class Categories extends Model
{
    
    public $timestamps = false;
    protected $fillable = [
        'title',
    ];
    public function news(){
        return $this->hasMany(News::class,'category_id');
    }
}
