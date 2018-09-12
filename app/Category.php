<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
class Category extends Model{
   use Sluggable;
    
	protected $fillable=['naziv_kategorije','parent_id','slug'];
	
	
	
	 public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'naziv_kategorije'
            ]
        ];
    }
}
