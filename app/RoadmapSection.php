<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoadmapSection extends Model
{
    protected $table = "roadmap_sections";
    public $primaryKey = "id";

    public function scopeActive($query) {
    	return $query->where('status', 1);
    }

    public function scopeDeleted($query) {
    	return $query->where('status', 0);
    }
}
