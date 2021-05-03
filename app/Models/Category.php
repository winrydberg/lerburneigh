<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function getNameAttribute($value){
        return ucfirst($value);
    }

    // One level child
    public function child() {
        return $this->hasMany(Category::class, 'parent');
    }

    //each category might have multiple children
    public function children() {
        return $this->hasMany(Category::class, 'parent')->with('children');
    }

     // One level parent
    public function parent() {
        return $this->belongsTo(Category::class, 'parent');
    }

    // Recursive parents
    public function parents() {
        return $this->belongsTo(Category::class, 'parent')->with('parent');
    }
}