<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\UserCreate;
use App\Http\Requests\UserUpdate;
use App\Mail\PasswordChanged;
use App\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller {

    protected $user;

    public function __construct(User $user) {
        $this->user = $user;
    }

    public function index() {
        $breadcrumb = breadcrumb(['users']);
        $users = $this->user->where('is_dev', '!=', 1)->where('id', '!=', auth()->user()->id)->get();
        return view('admin.user.index', compact('users', 'breadcrumb'));
    }

    public function trash() {
        $breadcrumb = breadcrumb([route('user.index') => 'users', 'trash']);
        $users = $this->user->where('is_dev', '!=', 1)->where('id', '!=', auth()->user()->id)->onlyTrashed()->get();
        return view('admin.user.index', compact('users', 'breadcrumb'));
    }

    public function withTrash() {
        $breadcrumb = breadcrumb([route('user.index') => 'users', 'all']);
        $users = $this->user->where('is_dev', '!=', 1)->where('id', '!=', auth()->user()->id)->withTrashed()->get();
        return view('admin.user.index', compact('users', 'breadcrumb'));
    }
    
    public function restore($id) {
        $this->user->where('id', $id)->restore();
        return redirect()->route('user.index')->with('success', 'Successfully Restored.');
    }
    
    public function delete($id) {
        $this->user->where('id', $id)->forceDelete();
        return redirect()->back()->with('success', 'Permanently Deleted.');
    }

    public function create() {
        $breadcrumb = breadcrumb([route('user.index') => 'users', 'create']);
        return view('admin.user.form', compact('breadcrumb'));
    }

    public function store(UserCreate $request) {
        $attrs = $request->all();
        $attrs['password'] = bcrypt(request('password'));
//        $this->user->create($attrs);
        event(new Registered($this->user->create($attrs)));
        return redirect()->route('user.index')->with('success', 'Successfully Created.');
    }

    public function show(User $user) {
        $breadcrumb = breadcrumb([route('user.index') => 'users', 'show']);
        return view('admin.user.show', compact('user', 'breadcrumb'));
    }

    public function edit(User $user) {
        $breadcrumb = breadcrumb([route('user.index') => 'users', 'edit']);
        return view('admin.user.form', compact('user', 'breadcrumb'));
    }

    public function update(UserUpdate $request, User $user) {
        $attrs = $request->all();
        if(request('password')):
            $attrs['password'] = bcrypt(request('password'));
        endif;
        $user->update($attrs);
        return redirect()->route('user.index')->with('success', 'Successfully Updated.');
    }

    public function destroy(User $user) {
        $user->delete();
        return redirect()->route('user.index')->with('success', 'Successfully Deleted.');
    }
    
    public function password(Request $request, $id) {
        $breadcrumb = breadcrumb([route('user.index') => 'users', 'change password']);
        if (request()->post()) {
            $rules = [
                'password' => 'required|string|min:8|confirmed|regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\X]).*$/',
            ];
            $messages = [
                'password.regex' => 'Contain at least one uppercase/lowercase letters, one number and one special character().',
            ];
            if ($request->validate($rules, $messages)) {
                $user = $this->user->findOrFail($id);
                $user->fill([
                    'password' => Hash::make($request->password)
                ])->save();
                if($user){
                    Mail::to($user->email)->send(new PasswordChanged($user));
                }
                $request->session()->flash('success', 'User new password has been changed.');
                return redirect()->route('user.index');
            }
        }
        return view('admin.user.change-password', compact('breadcrumb'));
    }
    

}
