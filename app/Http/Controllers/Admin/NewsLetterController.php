<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\NewsLetterCreate;
use App\Http\Requests\NewsLetterUpdate;
use App\Mail\Subscriber;
use App\Models\NewsLetter;
use App\Models\Subscribe;
use Illuminate\Support\Facades\Mail;

class NewsLetterController extends Controller
{
    protected $newsLetter;
    protected $subscribe;

    public function __construct(NewsLetter $newsLetter, Subscribe $subscribe) {
        $this->newsLetter = $newsLetter;
        $this->subscribe = $subscribe;
    }
    
    public function index() {
        $breadcrumb = breadcrumb(['News Letters']);
        $newsLetters = $this->newsLetter->get();
        return view('admin.news-letter.index', compact('newsLetters', 'breadcrumb'));
    }

    public function trash() {
        $breadcrumb = breadcrumb([route('news-letter.index') => 'News Letters', 'trash']);
        $newsLetters = $this->newsLetter->onlyTrashed()->get();
        return view('admin.news-letter.index', compact('newsLetters', 'breadcrumb'));
    }

    public function withTrash() {
        $breadcrumb = breadcrumb([route('news-letter.index') => 'News Letters', 'all']);
        $newsLetters = $this->newsLetter->withTrashed()->get();
        return view('admin.news-letter.index', compact('newsLetters', 'breadcrumb'));
    }
    
    public function restore($id) {
        $this->newsLetter->where('id', $id)->restore();
        return redirect()->back()->with('success', 'Successfully Restored.');
    }
    
    public function delete($id) {
        $newsLetter = $this->newsLetter->withTrashed()->findOrFail($id);
        $this->deleteImage($newsLetter);
        $newsLetter->forceDelete();
        return redirect()->back()->with('success', 'Permanently Deleted.');
    }

    public function create() {
        $breadcrumb = breadcrumb([route('news-letter.index') => 'News Letters', 'create']);
        return view('admin.news-letter.form', compact('breadcrumb'));
    }

    public function store(NewsLetterCreate $request) {
        $newsLetter = $this->newsLetter->create($request->all());
        $this->upload($newsLetter);
        if(request('send')){
            if($this->sendMailToSubscribers($newsLetter))
                return redirect()->back()->with('success', 'Successfully Created and Send mail to Subscribers.');
        }
        return redirect()->route('news-letter.create')->with('success', 'Successfully Created.');
    }

    public function show(NewsLetter $newsLetter) {
        $breadcrumb = breadcrumb([route('news-letter.index') => 'News Letters', 'show']);
        return view('admin.news-letter.show', compact('newsLetter', 'breadcrumb'));
    }

    public function edit(NewsLetter $newsLetter) {
        $breadcrumb = breadcrumb([route('news-letter.index') => 'News Letters', 'edit']);
        return view('admin.news-letter.form', compact('newsLetter', 'breadcrumb'));
    }

    public function update(NewsLetterUpdate $request, NewsLetter $newsLetter) {
//        dd($request->all());
        $newsLetter->update($request->all());
        $this->upload($newsLetter);
        if(request('send')){
            if($this->sendMailToSubscribers($newsLetter))
                return redirect()->back()->with('success', 'Successfully Updated and Send mail to Subscribers.');
        }
        return redirect()->back()->with('success', 'Successfully Updated.');
    }

    public function destroy(NewsLetter $newsLetter) {
        $newsLetter->delete();
        return redirect()->route('news-letter.index')->with('success', 'Successfully Deleted.');
    }
    
    public function sendMailToSubscribers($object) {
        $emails = $this->subscribe->pluck('email');
        foreach ($emails as $email) {
            Mail::to($email)->queue(new Subscriber($object));
        }
        if(Mail::failures()):
            return redirect()->back()->with('error', 'Somethings went wrong! Please try later.');
        else:
            return true;
        endif;
    }
    
}
