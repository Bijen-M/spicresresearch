<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class NewsLetter extends Model
{
    use SoftDeletes;
    
    protected $dates = ['deleted_at'];
    
    protected $guarded = ['id', 'image', 'send'];
    
    public function picture()
    {
        return $this->morphMany(Image::class, 'imageable');
    }
}
