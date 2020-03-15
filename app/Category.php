<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = "categories";
    public $primaryKey = "id";

    public function scopeActive($query) {
    	return $query->where('status', 1);
    }

    public function scopeDeleted($query) {
    	return $query->where('status', 0);
    }
}
