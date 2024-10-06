<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model {
    
    use softDeletes;
    
    protected $dates = ['deleted_at'];

    protected $guarded = ['id', 'seo'];

    public function blogs() {
        return $this->hasMany(Blog::class);
    }
    
    public function seo()
    {
        return $this->morphOne(Seo::class, 'seoable');
    }
    
    public function scopeAlls()
    {
        $id = Department::whereSlug(request()->segment(1))->first()->id;
        return $this->blogs()->where('department_id', '=', $id)->get();
    }

}
