<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContentFlag extends Model
{
    protected $table = "content_flags";
    public $primaryKey = "id";

    public function scopeActive($query) {
    	return $query->where('status', 1);
    }

    public function scopeDeleted($query) {
    	return $query->where('status', 0);
    }
}
