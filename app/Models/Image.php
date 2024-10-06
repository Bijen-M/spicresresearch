<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model {

    protected $guarded = ['id'];
    public $upload = 'uploads/';
    public $thumb = 'uploads/thumbs/';
    public $w = 100;
    public $h = 100;

    public function __construct() {
        if (!is_dir($this->upload))
            mkdir($this->upload);
        if (!is_dir($this->thumb))
            mkdir($this->thumb);
    }

    public function imageable() {
        return $this->morphTo();
    }

}
