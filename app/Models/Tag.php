<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tag extends Model {

    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $guarded = ['id', 'seo'];

    public function blogs() {
        return $this->belongsToMany(Blog::class);
    }

    public function seo() {
        return $this->morphOne(Seo::class, 'seoable');
    }
    
    public function blogsBy() {
        $id = Department::whereSlug(request()->segment(1))->first()->id;
        return $this->belongsToMany(Blog::class)->where('department_id', $id);
    }

}
