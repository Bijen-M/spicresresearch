<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $guarded = ['id', 'image'];
    
    public function picture()
    {
        return $this->morphOne(Image::class, 'imageable');
    }
}
