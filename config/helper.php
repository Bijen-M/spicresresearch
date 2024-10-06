<?php

use App\Models\Menu;
use Illuminate\Support\Str;

if (!function_exists('breadcrumb')) {

    function breadcrumb($data = null) {
        $seg = request()->segment(1);
        $breadcrumb = '<ol class="breadcrumb">'
                . '<li class="breadcrumb-item">'
                . '<a href="' . ($seg == 'admin' ? route('admin.dashboard') : $seg) . '">'
                . 'Home'
                . '</a>'
                . '</li>';
        if ($data):
            if (is_array($data)):
                foreach ($data as $key => $value):
                    if ($key):
                        $breadcrumb .= '<li class="breadcrumb-item">'
                                        . '<a href="' . $key . '" >'
                                            . title_case($value)
                                        . '</a>'
                                    . '</li>';
                    else:
                        $breadcrumb .= '<li class="breadcrumb-item active">'
                                        . title_case($value)
                                    . '</li>';
                    endif;
                endforeach;
            else:
                $breadcrumb .= '<li class="breadcrumb-item">'
                                . '<a href="' . route('menu.index') . '" >'
                                    . title_case('menus')
                                . '</a>'
                            . '</li>';
                $breadcrumb .= Helper::children($data);
            endif;
        endif;
        $breadcrumb .= '</ul>';
        return $breadcrumb;
    }

}

if (!function_exists('words')) {
    function words($str = null, $number = 20, $symbol = '...') {
        return Str::words(strip_tags($str, '<b><strong>'), $number, $symbol);
    }

}

class Helper {

    public static function navs($id = null, $class = null) {
        $depart = request()->segment(1);
//        $navs = Menu::whereId($id)->single()->children()->alls();
        $nav = Menu::whereId($id)->first();
        if ($nav) {
            $navs = $nav->children()->alls();
            $list = '<ul class="' . $class . '">';
            foreach ($navs as $nav) {
                $list .= '<li aria-haspopup="true">'
                        . '<a href="' . url($depart . ($nav->slug != '/' ? '/' : null) . $nav->slug) . '">' . $nav->title . '</a>';
                if ($nav->children->count() > 0) {
                    $list .= self::navs($nav->id, 'sub-menu');
                }
                $list .= '</li>';
            }
            $list .= '</ul>';
            return $list;
        }
    }

    public static function children($data = null) {
        $breadcrumb = null;
        
        if($data->parent !== null){
            $breadcrumb .= self::children($data->parent);
        }
        
        if($data){
            $breadcrumb .= '<li class="breadcrumb-item">'
                            . '<a href="' . route('menu.children', $data->id) . '" >'
                                . title_case($data->title)
                            . '</a>'
                        . '</li>';
        }
        
        
        return $breadcrumb;
    }
    
    public static function selectOptions($selected = null, $parent_id = null, $sep = null) {
//        $menus = Menu::where('parent_id', $parent_id)->get();
//        $list = [];
//        $sep .= $parent_id?'':null;
//        foreach ($menus as $key => $menu) {
//            $list[$menu->id] = $sep.$menu->title;
//            if($menu->children){
//                $list['level '.$key++] = self::selectOptions($menu->id, $sep);
//            }
//        }
//
//        return array_filter($list);
//        dd(cache()->get('menu_id'));
//        
        if($selected == null)
        $selected = cache()->get('menu_id');
        $menus = Menu::where('parent_id', $parent_id)->get();
        $list = null;
        $sep .= $parent_id?'&nbsp;&nbsp;&nbsp;':null;
        foreach ($menus as $menu) {
            $list .= '<option value="'.$menu->id.'" '
                    . ($selected == $menu->id ? 'selected' :null)
                    . '>'
                    . $sep.$menu->title
                    . '</option>';
            if($menu->children){
                $list .= self::selectOptions($selected, $menu->id, $sep);
            }
        }
        return $list;
    }
}
