<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class WhyChooseUs extends Model
{
    use SoftDeletes;
    
    protected $table = 'why_choose_us';

    protected $dates = ['deleted_at'];
    
    protected $guarded = ['id'];
    
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
