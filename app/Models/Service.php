<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Service extends Model
{
    use SoftDeletes;
    
    protected $dates = ['deleted_at'];
    
    protected $guarded = ['id', 'image', 'seo'];
    
    public function picture()
    {
        return $this->morphOne(Image::class, 'imageable');
    }
    
    public function seo()
    {
        return $this->morphOne(Seo::class, 'seoable');
    }
    
    public function department()
    {
        return $this->belongsTo(Department::class);
    }
    
    public function scopeAlls($query)
    {
        $id = Department::whereSlug(request()->segment(1))->first()->id;
        return $query->where('department_id', '=', $id)->get();
    }
    
}
