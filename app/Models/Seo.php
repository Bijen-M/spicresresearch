<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Seo extends Model
{
    protected $guarded = ['id'];
    
    public function seoable()
    {
        return $this->morphTo();
    }
}
