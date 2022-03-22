<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $table = 'services';
    protected $fillable = [
        'name', 'slug', 'description', 'image', 'category_id','index_number'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id','id');
    }
}
