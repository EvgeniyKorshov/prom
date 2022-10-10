<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Builder\Function_;

/**
 * Class News
 * @package App
 * 
 * @property string title
 * @property string description
 * @property string detailed_discripion
 */

class News extends Model
{
   
    public $timestamps = false;
    protected $fillable = [
        'title',
        'description',
        'detailed_discripion',
        'category_id',
    ];

    public function category(){
        return $this->belongsTo(Categories::class,'category_id')->first();
    }
}
 