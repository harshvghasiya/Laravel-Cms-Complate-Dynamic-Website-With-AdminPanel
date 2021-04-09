<?php

use Illuminate\Support\Facades\Route;

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


Auth::routes();
Route::any('/admin/login',[App\Http\Controllers\AdminLoginController::class, 'showlogin'])->name('loginform');
Route::any('/admin/userlogin',[App\Http\Controllers\AdminLoginController::class, 'login'])->name('userlogin');
Route::any('/admin/register',[App\Http\Controllers\AdminLoginController::class, 'showregister'])->name('registerform');
Route::any('/admin/storeregister',[App\Http\Controllers\AdminLoginController::class, 'store'])->name('userregister');

Route::group(['middleware'=>['login']], function(){

  Route::get('/admin', function () {
    return view('admin.home');
})->name('admin');

Route::any('/admin/addblog',[App\Http\Controllers\BlogController::class, 'create'])->name('create');
Route::any('/admin/bloglist',[App\Http\Controllers\BlogController::class, 'show'])->name('blogListMain');
Route::any('/admin/blogstore',[App\Http\Controllers\BlogController::class, 'store_update'])->name('blogstore');
Route::any('/admin/blog_datable',[App\Http\Controllers\BlogController::class, 'blog_datable'])->name('blog_datable');
Route::any('/admin/del_blog',[App\Http\Controllers\BlogController::class, 'destroy'])->name('del_blog');
Route::any('/admin/status_blog',[App\Http\Controllers\BlogController::class, 'status_blog'])->name('status_blog');
Route::any('/admin/edit_blog/admin/{id}',[App\Http\Controllers\BlogController::class, 'edit'])->name('edit_blog');
Route::any('/admin/upd_blog',[App\Http\Controllers\BlogController::class, 'store_update'])->name('upd_blog');
Route::any('/admin/blogdellall',[App\Http\Controllers\BlogController::class, 'del_all'])->name('blog_del_all');
Route::any('/admin/blogstatusall',[App\Http\Controllers\BlogController::class, 'status_all'])->name('blog_status_all');


Route::any('/admin/catagorystore',[App\Http\Controllers\CatagoryController::class, 'store_update'])->name('catagorystore');
Route::any('/admin/catagorylist',[App\Http\Controllers\CatagoryController::class, 'show'])->name('catagoryListMain');
Route::any('/admin/upd_catagory',[App\Http\Controllers\CatagoryController::class, 'store_update'])->name('upd_catagory');
Route::any('/admin/edit_catagory/{id}',[App\Http\Controllers\CatagoryController::class, 'edit'])->name('edit_catagory');
Route::any('/admin/del_catagory',[App\Http\Controllers\CatagoryController::class, 'destroy'])->name('del_catagory');
Route::any('/admin/status_catagory',[App\Http\Controllers\CatagoryController::class, 'status_catagory'])->name('status_catagory');
Route::any('/admin/addcatagory',[App\Http\Controllers\CatagoryController::class, 'create'])->name('addcatagory');
Route::any('/admin/catagory_datable',[App\Http\Controllers\CatagoryController::class,'catagory_datable'])->name('catagory_datable');
Route::any('/admin/cat_del_all',[App\Http\Controllers\CatagoryController::class,'del_all'])->name('cat_del_all');
Route::any('/admin/cat_status_all',[App\Http\Controllers\CatagoryController::class,'status_all'])->name('cat_status_all');


Route::any('/admin/setting',[App\Http\Controllers\SettingController::class, 'create'])->name('setting_create');
Route::any('/admin/upd_setting',[App\Http\Controllers\SettingController::class, 'update'])->name('upd_setting');


Route::any('/admin/addsocialmedia',[App\Http\Controllers\SocialMediaController::class, 'create'])->name('create_some');
Route::any('/admin/somestore',[App\Http\Controllers\SocialMediaController::class, 'store_upd'])->name('somestore');
Route::any('/admin/socialmedialist',[App\Http\Controllers\SocialMediaController::class, 'show'])->name('someListMain');
Route::any('/admin/edit_socialmedia/{id}',[App\Http\Controllers\SocialMediaController::class, 'edit'])->name('edit_some');
Route::any('/admin/upd_some',[App\Http\Controllers\SocialMediaController::class, 'store_upd'])->name('upd_some');
Route::any('/admin/del_some',[App\Http\Controllers\SocialMediaController::class, 'destroy'])->name('del_some');
Route::any('/admin/status_some',[App\Http\Controllers\SocialMediaController::class, 'status_some'])->name('status_some');
Route::any('/admin/some_datable',[App\Http\Controllers\SocialMediaController::class, 'some_datable'])->name('some_datable');
Route::any('/admin/somedel_all',[App\Http\Controllers\SocialMediaController::class, 'del_all'])->name('some_del_all');
Route::any('/admin/some_status_all',[App\Http\Controllers\SocialMediaController::class, 'status_all'])->name('some_status_all');


Route::any('/admin/contact_datable',[App\Http\Controllers\ContactusController::class,'contact_datable'])->name('contact_datable');
Route::any('/admin/contactusList',[App\Http\Controllers\ContactusController::class,'show'])->name('contactListMain');
Route::any('/admin/del_contact',[App\Http\Controllers\ContactusController::class,'destroy'])->name('del_contact');
Route::any('/admin/contactus',[App\Http\Controllers\ContactusController::class,'store'])->name('contactus');
Route::any('/admin/contact_del_all',[App\Http\Controllers\ContactusController::class,'del_all'])->name('contact_del_all');


Route::any('/admin/modulestore',[App\Http\Controllers\ModuleController::class,'store_update'])->name('modulestore');
Route::any('/admin/modulelist',[App\Http\Controllers\ModuleController::class,'show'])->name('moduleListMain');
Route::any('/admin/addmodule',[App\Http\Controllers\ModuleController::class,'create'])->name('module_create');
Route::any('/admin/editmodule/{id}',[App\Http\Controllers\ModuleController::class,'edit'])->name('edit_module');
Route::any('/admin/upd_module',[App\Http\Controllers\ModuleController::class,'store_update'])->name('upd_module');
Route::any('/admin/del_module',[App\Http\Controllers\ModuleController::class,'destroy'])->name('del_module');
Route::any('/admin/module_datable',[App\Http\Controllers\ModuleController::class,'module_datable'])->name('module_datable');
Route::any('/admin/status_module',[App\Http\Controllers\ModuleController::class,'status_module'])->name('status_module');
Route::any('/admin/module_del_all',[App\Http\Controllers\ModuleController::class,'del_all'])->name('module_del_all');
Route::any('/admin/module_status_all',[App\Http\Controllers\ModuleController::class,'status_all'])->name('module_status_all');



Route::any('/admin/apmodulestore',[App\Http\Controllers\ApmoduleController::class,'store_update'])->name('apmodulestore');
Route::any('/admin/apmoduleupd',[App\Http\Controllers\ApmoduleController::class,'store_update'])->name('upd_apmodule');
Route::any('/admin/editapmodule/{id}',[App\Http\Controllers\ApmoduleController::class,'edit'])->name('edit_apmodule');
Route::any('/admin/addapmodule',[App\Http\Controllers\ApmoduleController::class,'create'])->name('create_apmodule');
Route::any('/admin/apmodulelist',[App\Http\Controllers\ApmoduleController::class,'show'])->name('apmoduleListMain');
Route::any('/admin/del_apmodule',[App\Http\Controllers\ApmoduleController::class,'destroy'])->name('del_apmodule');
Route::any('/admin/status_apmodule',[App\Http\Controllers\ApmoduleController::class,'status'])->name('status_apmodule');
Route::any('/admin/apmodule_datable',[App\Http\Controllers\ApmoduleController::class,'apmodule_datable'])->name('apmodule_datable');
Route::any('/admin/apmodule_del_all',[App\Http\Controllers\ApmoduleController::class,'del_all'])->name('apmodule_del_all');
Route::any('/admin/apmodule_status_all',[App\Http\Controllers\ApmoduleController::class,'status_all'])->name('apmodule_status_all');


Route::any('/admin/tag_datable',[App\Http\Controllers\TagController::class,'tag_datable'])->name('tag_datable');
Route::any('/admin/createtag',[App\Http\Controllers\TagController::class,'create'])->name('create_tag');
Route::any('/admin/tagstore',[App\Http\Controllers\TagController::class,'store_update'])->name('tagstore');
Route::any('/admin/taglist',[App\Http\Controllers\TagController::class,'show'])->name('tagListMain');
Route::any('/admin/del_tag',[App\Http\Controllers\TagController::class,'destroy'])->name('del_tag');
Route::any('/admin/status_tag',[App\Http\Controllers\TagController::class,'status_tag'])->name('status_tag');
Route::any('/admin/edit_tag/{id}',[App\Http\Controllers\TagController::class,'edit'])->name('edit_tag');
Route::any('/admin/upd_tag',[App\Http\Controllers\TagController::class,'store_update'])->name('upd_tag');
Route::any('/admin/tag_status_all',[App\Http\Controllers\TagController::class,'status_all'])->name('tag_status_all');
Route::any('/admin/tag_del_all',[App\Http\Controllers\TagController::class,'del_all'])->name('tag_del_all');


Route::any('/admin/cmsstore',[App\Http\Controllers\CmsController::class,'store_update'])->name('cmsstore');
Route::any('/admin/upd_cms',[App\Http\Controllers\CmsController::class,'store_update'])->name('upd_cms');
Route::any('/admin/edit_cms/{id}',[App\Http\Controllers\CmsController::class,'edit'])->name('edit_cms');
Route::any('/admin/cmslist',[App\Http\Controllers\CmsController::class,'show'])->name('cmsListMain');
Route::any('/admin/addcms',[App\Http\Controllers\CmsController::class,'create'])->name('cms_create');
Route::any('/admin/cms_datable',[App\Http\Controllers\CmsController::class,'cms_datable'])->name('cms_datable');
Route::any('/admin/del_cms',[App\Http\Controllers\CmsController::class,'destroy'])->name('del_cms');
Route::any('/admin/status_cms',[App\Http\Controllers\CmsController::class,'status_cms'])->name('status_cms');
Route::any('/admin/cms_statusall',[App\Http\Controllers\CmsController::class,'status_all'])->name('cms_status_all');
Route::any('/admin/cms_del_all',[App\Http\Controllers\CmsController::class,'del_all'])->name('cms_del_all');



Route::any('/admin/addbanner',[App\Http\Controllers\BannerController::class,'create'])->name('banner_create');
Route::any('/admin/bannerstore',[App\Http\Controllers\BannerController::class,'store_upd'])->name('bannerstore');
Route::any('/admin/banner_datable',[App\Http\Controllers\BannerController::class,'banner_datable'])->name('banner_datable');
Route::any('/admin/bannerlist',[App\Http\Controllers\BannerController::class,'show'])->name('bannerListMain');
Route::any('/admin/upd_banner',[App\Http\Controllers\BannerController::class,'store_upd'])->name('upd_banner');
Route::any('/admin/del_banner',[App\Http\Controllers\BannerController::class,'destroy'])->name('del_banner');
Route::any('/admin/status_banner',[App\Http\Controllers\BannerController::class,'status_banner'])->name('status_banner');
Route::any('/admin/edit_banner/{id}',[App\Http\Controllers\BannerController::class,'edit'])->name('edit_banner');
Route::any('/admin/banner_del_all',[App\Http\Controllers\BannerController::class,'del_all'])->name('banner_del_all');
Route::any('/admin/banner_status_all',[App\Http\Controllers\BannerController::class,'status_all'])->name('banner_status_all');


Route::any('/admin/newsletterstore',[App\Http\Controllers\NewsletterController::class,'store'])->name('newsletter_store');
Route::any('/admin/newsletterlist',[App\Http\Controllers\NewsletterController::class,'show'])->name('newListMain');
Route::any('/admin/news_del_all',[App\Http\Controllers\NewsletterController::class,'del_all'])->name('news_del_all');
Route::any('/admin/news_status_all',[App\Http\Controllers\NewsletterController::class,'status_all'])->name('news_status_all');
Route::any('/admin/news_datable',[App\Http\Controllers\NewsletterController::class,'news_datable'])->name('news_datable');
Route::any('/admin/del_news',[App\Http\Controllers\NewsletterController::class,'destroy'])->name('del_news');
Route::any('/admin/status_news',[App\Http\Controllers\NewsletterController::class,'status'])->name('status_news');


Route::any('/admin/portfoliolist',[App\Http\Controllers\PortfolioController::class,'show'])->name('portListMain');
Route::any('/admin/addportfolio',[App\Http\Controllers\PortfolioController::class,'create'])->name('port_create');
Route::any('/admin/upd_port',[App\Http\Controllers\PortfolioController::class,'store_upd'])->name('upd_port');
Route::any('/admin/del_port',[App\Http\Controllers\PortfolioController::class,'destroy'])->name('del_port');
Route::any('/admin/status_port',[App\Http\Controllers\PortfolioController::class,'status'])->name('status_port');
Route::any('/admin/editportfolio/{id}',[App\Http\Controllers\PortfolioController::class,'edit'])->name('edit_port');
Route::any('/admin/portstore',[App\Http\Controllers\PortfolioController::class,'store_upd'])->name('portstore');
Route::any('/admin/port_del_all',[App\Http\Controllers\PortfolioController::class,'del_all'])->name('port_del_all');
Route::any('/admin/port_datable',[App\Http\Controllers\PortfolioController::class,'port_datable'])->name('port_datable');
Route::any('/admin/port_status_all',[App\Http\Controllers\PortfolioController::class,'status_all'])->name('port_status_all');



Route::any('/admin/addqna',[App\Http\Controllers\qnaController::class,'create'])->name('qna_create');
Route::any('/admin/upd_qna',[App\Http\Controllers\qnaController::class,'store_upd'])->name('upd_qna');
Route::any('/admin/editqna/{id}',[App\Http\Controllers\qnaController::class,'edit'])->name('edit_qna');
Route::any('/admin/qnastore',[App\Http\Controllers\qnaController::class,'store_upd'])->name('qnastore');
Route::any('/admin/qnalist',[App\Http\Controllers\qnaController::class,'show'])->name('qnaListMain');
Route::any('/admin/del_qna',[App\Http\Controllers\qnaController::class,'destroy'])->name('del_qna');
Route::any('/admin/status_qna',[App\Http\Controllers\qnaController::class,'status'])->name('status_qna');
Route::any('/admin/status_all',[App\Http\Controllers\qnaController::class,'status_all'])->name('qna_status_all');
Route::any('/admin/del_all',[App\Http\Controllers\qnaController::class,'del_all'])->name('qna_del_all');
Route::any('/admin/qna_datable',[App\Http\Controllers\qnaController::class,'qna_datable'])->name('qna_datable');




Route::any('/admin/testimonialstore',[App\Http\Controllers\testimonialController::class,'store_update'])->name('testimonialstore');
Route::any('/admin/addtestimonial',[App\Http\Controllers\testimonialController::class,'create'])->name('Testimonial_create');
Route::any('/admin/testimonialListMain',[App\Http\Controllers\testimonialController::class,'show'])->name('testimonialListMain');
Route::any('/admin/testimonialupdate',[App\Http\Controllers\testimonialController::class,'store_update'])->name('upd_testimonial');
Route::any('/admin/testimonial_edit/{id}',[App\Http\Controllers\testimonialController::class,'edit'])->name('edit_Testimonial');
Route::any('/admin/testimonial_del_all',[App\Http\Controllers\testimonialController::class,'del_all'])->name('Testimonial_del_all');
Route::any('/admin/testimonial_status_all',[App\Http\Controllers\testimonialController::class,'status_all'])->name('Testimonial_status_all');
Route::any('/admin/testimonial_datatable',[App\Http\Controllers\testimonialController::class,'datable'])->name('Testimonial_datable');
Route::any('/admin/testimonial_del',[App\Http\Controllers\testimonialController::class,'destroy'])->name('del_Testimonial');
Route::any('/admin/testimonial_status',[App\Http\Controllers\testimonialController::class,'status_test'])->name('status_Testimonial');

Route::any('/admin/logout',[App\Http\Controllers\AdminLoginController::class, 'logout'])->name('logout');
Route::any('/admin/userlist',[App\Http\Controllers\AdminLoginController::class, 'show'])->name('userListMain');
Route::any('/admin/deluser',[App\Http\Controllers\AdminLoginController::class, 'destroy'])->name('del_user');
Route::any('/admin/status',[App\Http\Controllers\AdminLoginController::class, 'status'])->name('status_user');
Route::any('/admin/upd_user',[App\Http\Controllers\AdminLoginController::class, 'update'])->name('upd_user');
Route::any('/admin/edit_user/{id}',[App\Http\Controllers\AdminLoginController::class, 'edit'])->name('edit_user');
Route::any('/admin/register_upd',[App\Http\Controllers\AdminLoginController::class, 'register_upd'])->name('register_upd');
Route::any('/admin/change_password',[App\Http\Controllers\AdminLoginController::class, 'change_password'])->name('change_password');
Route::any('/admin/acpri',[App\Http\Controllers\AdminLoginController::class, 'acpri'])->name('account_private');
Route::any('/admin/updimage',[App\Http\Controllers\AdminLoginController::class, 'update_image'])->name('upd_user_image');
Route::any('/admin/userstatusall',[App\Http\Controllers\AdminLoginController::class, 'status_all'])->name('user_status_all');
Route::any('/admin/userdelall',[App\Http\Controllers\AdminLoginController::class, 'del_all'])->name('user_del_all');
Route::any('/admin/viewuser/{viewuser}',[App\Http\Controllers\AdminLoginController::class, 'viewuser'])->name('viewuser');
Route::any('/admin/userdatable',[App\Http\Controllers\AdminLoginController::class, 'user_datable'])->name('user_datable');

});
// FRONT WEB ROute
Route::get('/', function () {
    return view('front.main.main');
})->name('home');
Route::any('/blog',[App\Http\Controllers\BlogController::class,'indexFrontBlog'])->name('front_blog');
Route::any('/post/{title}',[App\Http\Controllers\BlogController::class,'showFrontBlog'])->name('blog_detail');
Route::get('/search-post',[App\Http\Controllers\BlogController::class,'search'])->name('search');
Route::any('/catagory/{catagory}',[App\Http\Controllers\CatagoryController::class,'Front_Catagory_Index'])->name('catagory_detail_show');
Route::any('/tag/{tag}',[App\Http\Controllers\TagController::class,'Front_Tag_Index'])->name('tag_detail_show');

//user Login In Web
Route::any('/userregister',[App\Http\Controllers\Auth\RegisterController::class,'register'])->name('front_user_register');
Route::any('/frontlogout',[App\Http\Controllers\Auth\LoginController::class,'logout'])->name('front_logout');
Route::any('/front_user_login',[App\Http\Controllers\Auth\LoginController::class,'login'])->name('front_user_login');

Route::any('/forget_password',[App\Http\Controllers\Auth\ForgotPasswordController::class,'forget'])->name('user_forget_password');

Route::any('{cms}',[App\Http\Controllers\CmsController::class,'cms_content'])->name('cms_content');





