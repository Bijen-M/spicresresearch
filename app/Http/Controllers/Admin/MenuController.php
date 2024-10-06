<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\MenuCreate;
use App\Http\Requests\MenuUpdate;
use App\Models\Menu;

class MenuController extends Controller
{
    protected $menu;

    public function __construct(Menu $menu) {
        $this->menu = $menu;
    }

    public function index() {
        $breadcrumb = breadcrumb(['menus']);
        $menus = $this->menu->whereNull('parent_id')->get();
        cache()->flush();
        return view('admin.menu.index', compact('menus', 'breadcrumb'));
    }
    
    public function children($id) {
        $menu = $this->menu->findOrfail($id);
        $menus = $menu->children;
//        dd($menu->parent);
        $breadcrumb = breadcrumb($menu);
//        dd($menus);
        cache()->forever('menu_id', $id);
        return view('admin.menu.index', compact('breadcrumb', 'menus'));
    }

    public function trash() {
        $breadcrumb = breadcrumb([route('menu.index') => 'menus', 'trash']);
        $menus = $this->menu->onlyTrashed()->get();
        return view('admin.menu.index', compact('menus', 'breadcrumb'));
    }

    public function withTrash() {
        $breadcrumb = breadcrumb([route('menu.index') => 'menus', 'all']);
        $menus = $this->menu->withTrashed()->get();
        return view('admin.menu.index', compact('menus', 'breadcrumb'));
    }
    
    public function restore($id) {
        $this->menu->where('id', $id)->restore();
        return redirect()->back()->with('success', 'Successfully Restored.');
    }
    
    public function delete($id) {
        $menu = $this->menu->withTrashed()->findOrFail($id);
        $menu->forceDelete();
        return redirect()->back()->with('success', 'Permanently Deleted.');
    }

    public function create() {
        $breadcrumb = breadcrumb([route('menu.index') => 'menus', 'create']);
//        $menus = $this->menu->orderBy('parent_id', 'asc')->pluck('title', 'id');
        $menus = \Helper::selectOptions();
//        dd($menus);
        return view('admin.menu.form', compact('breadcrumb', 'menus', 'option'));
    }

    public function store(MenuCreate $request) {
        if(request('type') == null || request('type') == 'static'){
            $this->menu->create($request->all());
        } else {
            foreach (request('type_ids') as $value) {
                $data = \Illuminate\Support\Facades\DB::table(request('type'))->whereSlug($value)->first();
                $this->menu->create([
                    'parent_id' => request('parent_id'),
                    'department_id' => request('department_id'),
                    'title' => $data->title,
                    'slug' => request('type')=='pages' ? $data->slug : str_singular(request('type')).'/'.$data->slug,
                    'type' => request('type'),
                    'type_id' => $data->slug,
                ]);
            }
        }
        return redirect()->back()->with('success', 'Successfully Created.');
    }

    public function show(Menu $menu) {
        $breadcrumb = breadcrumb([route('menu.index') => 'menus', 'show']);
        return view('admin.menu.show', compact('menu', 'breadcrumb'));
    }

    public function edit(Menu $menu) {
        $breadcrumb = breadcrumb([route('menu.index') => 'menus', 'edit']);
//        dd(\Helper::selectOptions());
        $menus = \Helper::selectOptions($menu->parent_id);
//        $menus = $this->menu->pluck('title', 'id');
        return view('admin.menu.edit', compact('breadcrumb', 'menu', 'menus'));
    }

    public function update(MenuUpdate $request, Menu $menu) {
        $attrs = $request->all();
        if(empty($request->get('type_id')))
            $attrs['type_id'] = null;
//        $attrs['slug'] = str_singular(request('type')).'/'.request('slug');
        $menu->update($attrs);
        return redirect()->back()->with('success', 'Successfully Updated.');
    }

    public function destroy(Menu $menu) {
        $menu->delete();
        return redirect()->back()->with('success', 'Successfully Deleted.');
    }
    
    public function getPluck() {
        return \Illuminate\Support\Facades\DB::table(request('type'))->where(function($query){
            if(request('type') == 'blogs' || request('type') == 'portfolios' || request('type') == 'services')
                $query->where('department_id', request('depart'));
        })->whereNull('deleted_at')->pluck('title', 'slug');
    }
    
    public function menusSelect($parent_id = null, $sep = null) {
//        $menus = $this->menu->where('parent_id', $parent_id)->get();
////        dd($menus);
//        $list = null;
//        $sep .= '--';
//        foreach ($menus as $menu) {
//            $list .= $sep.$menu->title;
//            if($menu->children){
////                dd($menu->children);
//                $list .= $this->menusSelect($menu->id, $sep);             ;
//            }
//        }
//        return $list;
        $menus = $this->menu->where('parent_id', $parent_id)->get();
//        dd($menus);
        $list = null;
        $sep .= '--';
        foreach ($menus as $menu) {
            
            $list .= '<option>'
                    . $sep.$menu->title
                    . '</option>';
            if($menu->children){
//                dd($menu->children);
                $list .= $this->menusSelect($menu->id, $sep);             ;
            }
        }
        return $list;
    }
}
