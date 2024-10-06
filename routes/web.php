<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'HomeController@index')->name('home');
Route::post('send-mail', 'HomeController@sendMail')->name('send.mail');
Route::post('subscribe', 'HomeController@subscribe')->name('subscribe.email');

Route::group(['prefix' => 'information-technology'], function($route){
    $route->get('/', 'ItController@index')->name('it.home');
    $route->get('about-us', 'ItController@aboutUs')->name('it.about.us');
    $route->get('services', 'ItController@services')->name('it.services');
    $route->get('service/{slug}', 'ItController@serviceDetails')->name('it.service.details');
    $route->get('portfolios', 'ItController@portfolios')->name('it.portfolios');
    $route->get('portfolio/{slug}', 'ItController@portfolioDetails')->name('it.portfolio.details');
    $route->get('blogs', 'ItController@blogs')->name('it.blogs');
    $route->get('blogs/search', 'ItController@blogsSearch')->name('it.blogs.search');
    $route->get('blog/{slug}', 'ItController@blogDetails')->name('it.blog.details');
    $route->get('blogs/category/{slug}', 'ItController@blogsByCategory')->name('it.blogs.category');
    $route->get('blogs/tag/{slug}', 'ItController@blogsByTag')->name('it.blogs.tag');
    $route->get('{slug}', 'ItController@page')->name('it.page');
});
Route::group(['prefix' => 'architecture-engineering'], function($route){
    $route->get('/', 'ArchitectureController@index')->name('architecture.home');
    $route->get('about-us', 'ArchitectureController@aboutUs')->name('architecture.about.us');
    $route->get('services', 'ArchitectureController@services')->name('architecture.services');
    $route->get('service/{slug}', 'ArchitectureController@serviceDetails')->name('architecture.service.details');
    $route->get('portfolios', 'ArchitectureController@portfolios')->name('architecture.portfolios');
    $route->get('portfolio/{slug}', 'ArchitectureController@portfolioDetails')->name('architecture.portfolio.details');
    $route->get('blogs', 'ArchitectureController@blogs')->name('architecture.blogs');
    $route->get('blogs/search', 'ArchitectureController@blogsSearch')->name('architecture.blogs.search');
    $route->get('blog/{slug}', 'ArchitectureController@blogDetails')->name('architecture.blog.details');
    $route->get('blogs/category/{slug}', 'ArchitectureController@blogsByCategory')->name('architecture.blogs.category');
    $route->get('blogs/tag/{slug}', 'ArchitectureController@blogsByTag')->name('architecture.blogs.tag');
    $route->get('{slug}', 'ArchitectureController@page')->name('architecture.page');
});

Route::group(['prefix' => 'research-management'], function($route){
    $route->get('/', 'ResearchController@index')->name('research.home');
});

Route::group(['prefix' => 'admin', 'namespace' => 'Auth', 'verify' => true], function($route){
    $route->get('login', 'LoginController@showLoginForm')->name('login');
    $route->post('login', 'LoginController@login');
    $route->post('logout', 'LoginController@logout')->name('logout');
    $route->post('password/email', 'ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    $route->get('password/reset', 'ForgotPasswordController@showLinkRequestForm')->name('password.request');
    $route->post('password/reset', 'ResetPasswordController@reset')->name('password.update');
    $route->get('password/reset/{token}', 'ResetPasswordController@showResetForm')->name('password.reset');
    $route->get('email/resend', 'VerificationController@resend')->name('verification.resend');
    $route->get('email/verify', 'VerificationController@show')->name('verification.notice');
    $route->get('email/verify/{id}', 'VerificationController@verify')->name('verification.verify');
});

Route::group(['middleware' => ['auth', 'verified'], 'prefix' => 'admin', 'namespace' => 'Admin'], function($route){
    $route->get('dashboard', 'DashboardController@index')->name('admin.dashboard');
    
    $route->match(['get', 'post'], 'user/password/{id}', 'UserController@password')->name('user.password');
    $route->get('user/restore/{id}', 'UserController@restore')->name('user.restore');
    $route->get('user/delete/{id}', 'UserController@delete')->name('user.delete');
    $route->get('user/all', 'UserController@withTrash')->name('user.withtrash');
    $route->get('user/trash', 'UserController@trash')->name('user.trash');
    $route->resource('user', 'UserController');
    
    $route->get('image/delete/{id}', 'ImageController@delete')->name('image.delete');
    
    $route->get('banner/restore/{id}', 'BannerController@restore')->name('banner.restore');
    $route->get('banner/delete/{id}', 'BannerController@delete')->name('banner.delete');
    $route->get('banner/all', 'BannerController@withTrash')->name('banner.withtrash');
    $route->get('banner/trash', 'BannerController@trash')->name('banner.trash');
    $route->resource('banner', 'BannerController');
    
    $route->get('testimonial/restore/{id}', 'TestimonialController@restore')->name('testimonial.restore');
    $route->get('testimonial/delete/{id}', 'TestimonialController@delete')->name('testimonial.delete');
    $route->get('testimonial/all', 'TestimonialController@withTrash')->name('testimonial.withtrash');
    $route->get('testimonial/trash', 'TestimonialController@trash')->name('testimonial.trash');
    $route->resource('testimonial', 'TestimonialController');
    
    $route->get('page/restore/{id}', 'PageController@restore')->name('page.restore');
    $route->get('page/delete/{id}', 'PageController@delete')->name('page.delete');
    $route->get('page/all', 'PageController@withTrash')->name('page.withtrash');
    $route->get('page/trash', 'PageController@trash')->name('page.trash');
    $route->resource('page', 'PageController');
    
    $route->get('service/restore/{id}', 'ServiceController@restore')->name('service.restore');
    $route->get('service/delete/{id}', 'ServiceController@delete')->name('service.delete');
    $route->get('service/all', 'ServiceController@withTrash')->name('service.withtrash');
    $route->get('service/trash', 'ServiceController@trash')->name('service.trash');
    $route->resource('service', 'ServiceController');
    
    $route->get('blog/restore/{id}', 'BlogController@restore')->name('blog.restore');
    $route->get('blog/delete/{id}', 'BlogController@delete')->name('blog.delete');
    $route->get('blog/all', 'BlogController@withTrash')->name('blog.withtrash');
    $route->get('blog/trash', 'BlogController@trash')->name('blog.trash');
    $route->resource('blog', 'BlogController');
    
    $route->get('category/restore/{id}', 'CategoryController@restore')->name('category.restore');
    $route->get('category/delete/{id}', 'CategoryController@delete')->name('category.delete');
    $route->get('category/all', 'CategoryController@withTrash')->name('category.withtrash');
    $route->get('category/trash', 'CategoryController@trash')->name('category.trash');
    $route->resource('category', 'CategoryController');
    
    $route->get('tag/restore/{id}', 'TagController@restore')->name('tag.restore');
    $route->get('tag/delete/{id}', 'TagController@delete')->name('tag.delete');
    $route->get('tag/all', 'TagController@withTrash')->name('tag.withtrash');
    $route->get('tag/trash', 'TagController@trash')->name('tag.trash');
    $route->resource('tag', 'TagController');
    
    $route->get('portfolio/restore/{id}', 'PortfolioController@restore')->name('portfolio.restore');
    $route->get('portfolio/delete/{id}', 'PortfolioController@delete')->name('portfolio.delete');
    $route->get('portfolio/all', 'PortfolioController@withTrash')->name('portfolio.withtrash');
    $route->get('portfolio/trash', 'PortfolioController@trash')->name('portfolio.trash');
    $route->resource('portfolio', 'PortfolioController');
    
    $route->get('team/restore/{id}', 'TeamController@restore')->name('team.restore');
    $route->get('team/delete/{id}', 'TeamController@delete')->name('team.delete');
    $route->get('team/all', 'TeamController@withTrash')->name('team.withtrash');
    $route->get('team/trash', 'TeamController@trash')->name('team.trash');
    $route->resource('team', 'TeamController');
    
    $route->get('why-choose-us/restore/{id}', 'WhyChooseUsController@restore')->name('why-choose-us.restore');
    $route->get('why-choose-us/delete/{id}', 'WhyChooseUsController@delete')->name('why-choose-us.delete');
    $route->get('why-choose-us/all', 'WhyChooseUsController@withTrash')->name('why-choose-us.withtrash');
    $route->get('why-choose-us/trash', 'WhyChooseUsController@trash')->name('why-choose-us.trash');
    $route->resource('why-choose-us', 'WhyChooseUsController');
    
    $route->get('menu/restore/{id}', 'MenuController@restore')->name('menu.restore');
    $route->get('menu/delete/{id}', 'MenuController@delete')->name('menu.delete');
    $route->get('menu/all', 'MenuController@withTrash')->name('menu.withtrash');
    $route->get('menu/trash', 'MenuController@trash')->name('menu.trash');
    $route->get('menu/{id}/children', 'MenuController@children')->name('menu.children'); 
    $route->post('menu/pluck', 'MenuController@getPluck')->name('menu.pluck'); 
    $route->resource('menu', 'MenuController');
    
    $route->get('subscribe/restore/{id}', 'SubscribeController@restore')->name('subscribe.restore');
    $route->get('subscribe/delete/{id}', 'SubscribeController@delete')->name('subscribe.delete');
    $route->get('subscribe/all', 'SubscribeController@withTrash')->name('subscribe.withtrash');
    $route->get('subscribe/trash', 'SubscribeController@trash')->name('subscribe.trash');
    $route->resource('subscribe', 'SubscribeController');
    
    $route->get('news-letter/restore/{id}', 'NewsLetterController@restore')->name('news-letter.restore');
    $route->get('news-letter/delete/{id}', 'NewsLetterController@delete')->name('news-letter.delete');
    $route->get('news-letter/all', 'NewsLetterController@withTrash')->name('news-letter.withtrash');
    $route->get('news-letter/trash', 'NewsLetterController@trash')->name('news-letter.trash');
    $route->resource('news-letter', 'NewsLetterController');
    
    $route->get('profile', 'AdminController@profile')->name('admin.profile');
    $route->match(['get', 'post'], 'change-password', 'AdminController@changePassword')->name('admin.change.password');
    $route->match(['get', 'post'], 'settings', 'AdminController@settings')->name('admin.settings');
});

