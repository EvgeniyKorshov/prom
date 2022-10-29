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

    static function rules(){
        $tableNameCategory = (new Categories())->getTable();
        return [
            'title' => 'required|max:255',
            'description' => 'required',
            'detailed_discripion' => 'required',
            'category_id' => "required|exists:{$tableNameCategory},id",
        ];
    }
    static function attributeNames(){
        return [
            'title' => 'Заголовок новости',
            'description' => 'Описание новости',
            'detailed_discripion' => 'Подробное описание новости',
        ];
    }
}
 