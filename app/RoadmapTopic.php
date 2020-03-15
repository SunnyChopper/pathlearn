<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoadmapTopic extends Model
{
    protected $table = "roadmap_topics";
    public $primaryKey = "id";

    public function scopeActive($query) {
    	return $query->where('status', 1);
    }

    public function scopeDeleted($query) {
    	return $query->where('status', 0);
    }
}
