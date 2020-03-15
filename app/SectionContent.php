<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SectionContent extends Model
{
    protected $table = "section_contents";
    public $primaryKey = "id";

    public function scopeActive($query) {
    	return $query->where('status', 1);
    }

    public function scopeDeleted($query) {
    	return $query->where('status', 0);
    }
}
