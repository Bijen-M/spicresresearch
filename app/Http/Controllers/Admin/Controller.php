<?php

namespace App\Http\Controllers\Admin;

use App\Models\Image;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\File;
use Image as Img;

class Controller extends BaseController {

    use AuthorizesRequests,
        DispatchesJobs,
        ValidatesRequests;

    protected $w = 100;
    protected $h = 100;

    public $status = [
        0 => '<span class="text-muted">Inactive</span>',
        1 => '<span class="text-success">Active</span>',
    ];

    public function upload($object) {
        if (request('image')) {
            if (is_array(request('image'))) {
                foreach (request('image') as $image) {
                    $file = $this->saveImage($image);
                    $object->picture()->save($file);
                }
            } else {
                $file = $this->saveImage(request('image'));
                $object->picture()->save($file);
            }
        }
        return false;
    }
    
    public function saveImage($image, $w = null, $h = null) {
        $file = new Image();
        $name = Carbon::now()->format('Y-m-d') . '-' . time() . '.' . $image->getClientOriginalName();
        $upload = $file->upload . $name;
        $thumb = $file->thumb . $name;
        if(in_array(strtolower($image->getClientOriginalExtension()), ['jpeg','png','jpg','gif'])){
            $img = Img::make($image->getRealPath());
            if ($w || $h) {
                $img->resize($w, $h, function ($constraint) {
                    $constraint->aspectRatio();
                });
            }
            $img->save($upload, 100);
            $img->fit($this->w, $this->h)->save($thumb, 100);
        }else{
            File::copy($image->getRealPath(), $upload);
            if($image->getClientOriginalExtension() == 'svg')
                File::copy($image->getRealPath(), $thumb);
        }
        
        
        $file->url = $name;
        return $file;
        
    }
    
    public function deleteImage($object) {
        if($object->picture){
            $thumb = public_path($object->picture->thumb.$object->picture->url);
            $upload = public_path($object->picture->upload.$object->picture->url);
            File::delete($thumb, $upload);
            return $object->picture->delete();
        }
        return false;
    }

    public function deleteImages($object) {
        echo $object->picture;
        // dd(sizeof($object->picture) > 0);
        if(sizeof($object->picture) > 0){
            foreach ($object->picture as $image) {
                $thumb = public_path($image->thumb.$image->url);
                $upload = public_path($image->upload.$image->url);
                File::delete($thumb, $upload);
                $image->delete();
            }
            return true;
        }
        return false;
    }

//    public function upload($images = [], $w = null, $h = null) {
//        if (is_array($images)) {
//            $file = new \App\Models\Image();
//            $fileNames = null;
//            $i = 0;
//            foreach ($images as $image) {
//                $name = \Carbon\Carbon::now()->format('Y-m-d') . '-' . time() . '.' . $image->getClientOriginalExtension();
//                $upload = $file->path . $name;
//                $thumb = $file->thumb . $name;
//                $img = Image::make($image->getRealPath());
//                if($w || $h){
//                    $img->resize($w, $h, function ($constraint) {
//                        $constraint->aspectRatio();
//                    });
//                }
//                $img->save($upload, 100);
//                $img->fit($file->w, $file->h)->save($thumb, 100);
//                $fileNames[$i]['url'] = $name;
//                $fileNames[$i]['title'] = $image->getClientOriginalName();
//                $i++;
//            }
//            return $fileNames;
//        } 
//        return null;
//    }
}
