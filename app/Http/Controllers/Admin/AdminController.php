<?php

namespace App\Http\Controllers\Admin;

use App\Models\Setting;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Image;
class AdminController extends Controller {

//    public function __construct() {
//        
//    }

    public function profile(User $user) {
        $breadcrumb = breadcrumb(['profile']);
        $id = auth()->user()->id;
        $user = $user->findOrFail($id);
        return view('admin.profile', compact('breadcrumb', 'user'));
    }

    public function changePassword(Request $request, User $user) {
        $breadcrumb = breadcrumb(['Password']);
        if (request()->post()) {
            $rules = [
                'old_password' => 'required',
                'password' => 'required|string|min:8|confirmed|different:old_password|regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\X]).*$/',
            ];
            $messages = [
                'password.regex' => 'Contain at least one uppercase/lowercase letters, one number and one special character.',
            ];
            if ($request->validate($rules,$messages)) {
                $user = $user->findOrFail(auth()->user()->id);
                if (Hash::check($request->old_password, auth()->user()->password)) {
                    $user->fill([
                        'password' => Hash::make($request->password)
                    ])->save();
                    $request->session()->flash('success', 'Your new password has been changed.');
                    return redirect()->route('admin.change.password');
                } else {
                    $request->session()->flash('error', 'Old password does not match!');
                    return redirect()->route('admin.change.password');
                }
            }
        }
        return view('admin.change-password', compact('breadcrumb'));
    }
    
    public function settings(Request $request, Setting $setting) {
        $breadcrumb = breadcrumb(['Settings']);
        $settings = $setting->first();
//        dd($settings);
        if (request()->post()) {
            $attrs = $request->all();
            if($settings){
                $settings->update($attrs);
                $this->upload($settings);
                $request->session()->flash('success', 'Successfully Updated.');
            } else {
                $setting->create($attrs);
                $this->upload($setting);
                $request->session()->flash('success', 'Successfully Created.');
            }
            return redirect()->route('admin.settings');
        }
        return view('admin.settings', compact('breadcrumb', 'settings'));
    }

}
