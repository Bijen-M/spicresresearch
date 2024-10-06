<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Menu extends Model
{
    use SoftDeletes;
    
    protected $dates = ['deleted_at'];
    
    protected $guarded = ['id', 'type_ids'];
    
    public function children() {
        return $this->hasMany(Menu::class, 'parent_id');
    }

    public function parent() {
        return $this->belongsTo(Menu::class, 'parent_id');
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
    
    public function scopeSingle($query)
    {
        $id = Department::whereSlug(request()->segment(1))->first()->id;
        return $query->where('department_id', '=', $id)->first();
    }
    
}
