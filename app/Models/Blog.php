<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Blog extends Model
{
    use HasFactory;
    protected $table = 'blogs';
    protected $guarded = ['id'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    // public function user()
    // {
    //     return $this->belongsTo(User::class);
    // }
    // public function getRouteKeyName()
    // {
    //     return 'slug';
    // }
}
