<?php

namespace App\Http\Controllers;

use App\Http\Requests\SendMail;
use App\Http\Requests\Subscribe as Subscribe2;
use App\Mail\ContactMail;
use App\Mail\ThankYouMail;
use App\Models\Banner;
use App\Models\Department;
use App\Models\Page;
use App\Models\Subscribe;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller {

    protected $department;
    protected $page;
    protected $banner;
    protected $subscribe;
    
    public function __construct(Department $department, Page $page, Banner $banner, Subscribe $subscribe) {
        $this->department = $department;
        $this->page = $page;
        $this->banner = $banner;
        $this->subscribe = $subscribe;
    }

    /**
     * Show the application dashboard.
     *
     * @return Renderable
     */
    public function index() {
        $departments = $this->department->all();
        $about = $this->page->whereslug('about-us')->first();
        $banners = $this->banner->whereNull('department_id')->get();
        $home = $this->page->whereslug('home')->first();
        if($home){
            $seo = $home->seo;
            $mimage = $home->picture ? $home->picture->upload.$home->picture->url : null;
        }
//        dd($mimage);
//        (object) [
//            'title' => 'Home',
//            'keys' => 'website development, web app development, eCommerce, architechture, consultancy',
//            'description' => 'Remember Spices Research & Consulting Pvt. Ltd. for Web Application Development, Architecture and Business Research',
//            'og_title' => 'Spices Research & Consulting Pvt. Ltd.',
//            'og_description' => 'Spices Research & Consulting Pvt. Ltd. experienced in Information and Communication Technologies, Architecture Designing and Consulting, and Business Research and Management',
//            'og_url'=>'http://spicesresearch.com',
//            'og_site_name'=>'Spices Research & Consulting Pvt.Ltd',
//            'og_type'=>'website'
//        ];
        return view('home', compact('departments', 'about', 'banners', 'seo', 'mimage'));
    }
    
    public function sendMail(SendMail $request) {
        $msg = '<p>Thank you for your message.</p>';
        // Mail::to('info@spicesresearch.com')->send(new ContactMail($request->all()));
        Mail::to(request('email_id'))->send(new ThankYouMail($msg));
        if(Mail::failures())
            return redirect()->back()->with('error', 'Somethings went wrong! Please try later.');
        return redirect()->back()->with('success', 'Your mail has been send. We will contact you ASAP.');
    }
    
    public function subscribe(Subscribe2 $request) {
        $msg = '<p>Thank you for subscribe.</p>';
        Mail::to(request('email'))->send(new ThankYouMail($msg));
        if(Mail::failures()):
            return redirect()->back()->with('error-subscribe', 'Somethings went wrong! Please try later.');
        else:
            $this->subscribe->create($request->all());
            return redirect()->back()->with('success-subscribe', 'Thank you for subscribe!');
        endif;
    }

}
