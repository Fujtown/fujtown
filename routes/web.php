<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdvertismentController;
use App\Http\Controllers\Auth\AccountAuthController;
use App\Http\Controllers\Auth\AdminAuthController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\FAQController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\ListingController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\PromotionController;
use App\Http\Controllers\UserController;

Route::get('/',                                     [HomeController::class, 'index']);
Route::get('/home',                                 [HomeController::class, 'index'])->name('home');
Route::get('/jobs',                                 [HomeController::class, 'jobs'])->name('jobs');
Route::get('/job-details/{job}',                    [HomeController::class, 'jobDetails'])->name('job-details');
Route::post('/send-feedback',                       [HomeController::class, 'sendFeedback'])->name('send-feedback');
Route::post('/send-review',                         [HomeController::class, 'sendReview'])->name('send-review');
Route::get('/get-listing-suggestions',              [HomeController::class, 'getSuggestions'])->name('getListingSuggestions');

Route::post('/chat/respond', [ChatController::class, 'respond'])->name('chat.respond');


Route::get('/login',                                [AuthController::class, 'login'])->name('login');
Route::get('/business/{category}',                  [HomeController::class, 'Business'])->name('listing-categories');
Route::post('/login_customer',                      [AuthController::class, 'login_customer'])->name('login_customer');
Route::get('/register',                             [AuthController::class, 'register'])->name('register');
Route::post('/register_user',                       [AuthController::class, 'register_user'])->name('register_user');
Route::get('/contact',                              [HomeController::class, 'contact'])->name('contact');
Route::get('/events',                               [HomeController::class, 'events'])->name('events');
Route::get('/blog',                                 [HomeController::class, 'blogs'])->name('blog');
Route::get('/blog-details/{slug}',                  [HomeController::class, 'blogDetails'])->name('blog-details');
Route::get('/attractions',                          [HomeController::class, 'attractions'])->name('attractions');
Route::get('/submit-listing',                       [HomeController::class, 'submitListing'])->name('submit-listing');
Route::get('/about',                                [HomeController::class, 'About'])->name('about');
Route::get('/government-details',                   [HomeController::class, 'governmentDetails'])->name('government-details');
Route::get('/printing',                             [HomeController::class, 'printing'])->name('printing');
Route::get('/tourism',                              [HomeController::class, 'tourism'])->name('tourism');
Route::get('/etrading',                             [HomeController::class, 'etrading'])->name('etrading');
Route::get('/website-designing-and-development',    [HomeController::class, 'webDev'])->name('website-designing-and-development');
Route::get('/terms-and-conditions',                 [HomeController::class, 'terms'])->name('terms-and-conditions');
Route::get('/board-of-directors',                   [HomeController::class, 'bod'])->name('board-of-directors');
Route::get('/refund-policy',                        [HomeController::class, 'policy'])->name('refund-policy');
Route::get('/privacy-policy',                       [HomeController::class, 'privacy'])->name('privacy-policy');
Route::get('/how-it-work',                          [HomeController::class, 'HowItwork'])->name('how-it-work');

Route::get('/add-listing/{package}',                [HomeController::class, 'addListing'])->name('add-listing');
Route::get('/company/{listing}',                    [HomeController::class, 'Categories'])->name('company');
Route::get('/listing/{listing}',                    [HomeController::class, 'company'])->name('listing');
Route::get('/bussiness/{service}',                  [HomeController::class, 'Business'])->name('bussiness');

Route::get('/sitemap.xml', function () {
    return response()->file(public_path('sitemap.xml'));
});

//Customer Routes
Route::middleware(['customer'])->prefix('customer')->group(function () {
Route::get('/dashboard',                            [CustomerController::class, 'dashboard'])->name('customer.dashboard');
Route::get('/customer-listing',                     [CustomerController::class, 'Customerlisting'])->name('customer.customer-listing');
Route::get('/customer-act-listing',                 [CustomerController::class, 'CustomerActivelisting'])->name('customer.customer-act-listing');
Route::get('/customer-review',                      [CustomerController::class, 'Customerreview'])->name('customer.customer-review');
Route::get('/customer-adlisting/{package}',         [CustomerController::class, 'Customeradlisting'])->name('customer.customer-adlisting');
Route::get('/customer-profile',                     [CustomerController::class, 'Customerprofile'])->name('customer.customer-profile');
Route::post('/checkout-listing',                    [CustomerController::class, 'Checkout'])->name('customer.checkout-listing');

Route::post('/add-listing',                         [CustomerController::class, 'addListing'])->name('customer.add_listing');
Route::get('/logout',                               [CustomerController::class, 'Logout'])->name('customer.logout');

//payment 
Route::get('/payment',                              [CustomerController::class, 'Payment'])->name('customer.payment');
Route::get('/noon_response',                        [CustomerController::class, 'noon_response']);
Route::get('/save_noon_payment_data',               [CustomerController::class, 'save_noon_payment_data'])->name('customer.save_noon_payment_data');
Route::get('/get_noon_last_payment',                [CustomerController::class, 'get_noon_last_payment'])->name('customer.get_noon_last_payment');
});


//Admin Route

Route::get('/coffee/login',                         [AdminAuthController::class, 'login'])->name('coffee.login');
Route::post('/coffee/login_admin',                  [AdminAuthController::class, 'login_admin'])->name('coffee.login_admin');
Route::get('/coffee/logout',                        [AdminAuthController::class, 'logout'])->name('coffee.logout');

Route::middleware(['admin'])->prefix('coffee')->group(function () {
Route::get('/dashboard',                            [AdminController::class, 'dashboard'])->name('coffee.dashboard');
Route::get('/feedback',                             [AdminController::class, 'feedback'])->name('coffee.feedback');
Route::delete('/delete-feedback/{id}',              [AdminController::class, 'deleteFeedback'])->name('coffee.delete-feedback');

//Parent Categories
Route::get('/parent-category',                      [CategoryController::class, 'parentcategory'])->name('coffee.parent-category');
Route::get('/parent-category-list',                 [CategoryController::class, 'parentcategorylist'])->name('coffee.parent-category-list');
Route::post('/add-parent-category',                 [CategoryController::class, 'Addparentcategory'])->name('coffee.add-parent-category');
Route::delete('/delete-parent-category/{id}',       [CategoryController::class, 'deleteParentCategory'])->name('coffee.delete-parent-category');
Route::put('/update-parent-category/{id}',          [CategoryController::class, 'updateParentCategory'])->name('coffee.update-parent-category');

//Categories
Route::get('/category',                             [CategoryController::class, 'category'])->name('coffee.category');
Route::get('/category-list',                        [CategoryController::class, 'categoryList'])->name('coffee.category-list');
Route::post('/add-category',                        [CategoryController::class, 'addCategory'])->name('coffee.add-category');
Route::delete('/delete-category/{id}',              [CategoryController::class, 'deleteCategory'])->name('coffee.delete-category');
Route::put('/update-category/{id}',                 [CategoryController::class, 'updateCategory'])->name('coffee.update-category');

// Listing
Route::get('/listing',                              [ListingController::class, 'listing'])->name('coffee.listing');

//Packages
Route::get('/packages',                             [PackageController::class, 'listPackages'])->name('coffee.packages');
Route::get('/add-package',                          [PackageController::class, 'addPackage'])->name('coffee.add-package');
Route::delete('/delete-package/{id}',               [PackageController::class, 'deletePackage'])->name('coffee.delete-package');
Route::put('/update-package/{id}',                  [PackageController::class, 'updatePackage'])->name('coffee.update-package');
Route::post('/store-package',                       [PackageController::class, 'Store_package'])->name('coffee.store-package');

//Blog
Route::get('/blog-category',                        [BlogController::class, 'Blogcategory'])->name('coffee.blog-category');
Route::get('/add-blogcategory',                     [BlogController::class, 'addBlogcategory'])->name('coffee.add-blogcategory');
Route::post('/store-blogcategory',                  [BlogController::class, 'storeBlogcategory'])->name('coffee.store-blogcategory');
Route::get('/blogs',                                [BlogController::class, 'Blogs'])->name('coffee.blogs');
Route::get('/add-blog',                             [BlogController::class, 'addBlog'])->name('coffee.add-blog');
Route::post('/store-blog',                          [BlogController::class, 'storeBlog'])->name('coffee.store-blog');
Route::delete('/delete-blog/{id}',                  [BlogController::class, 'deleteBlog'])->name('coffee.delete-blog');
Route::get('/edit-blog/{id}',                       [BlogController::class, 'editBlog'])->name('coffee.edit-blog');
Route::put('/update-blog/{id}',                     [BlogController::class, 'updateBlog'])->name('coffee.update-blog');

//Customers
Route::get('/customers',                            [UserController::class, 'Customers'])->name('coffee.customer');
Route::get('/add-customer',                         [UserController::class, 'addCustomer'])->name('coffee.add-customer');
Route::post('/store-customer',                      [UserController::class, 'storeCustomer'])->name('coffee.store-customer');
Route::get('/edit-customer/{id}',                   [UserController::class, 'editCustomer'])->name('coffee.edit-customer');
Route::put('/update-customer/{id}',                 [UserController::class, 'updateCustomer'])->name('coffee.update-customer');

//News
Route::get('/news',                                 [NewsController::class, 'News'])->name('coffee.news');
Route::get('/add-news',                             [NewsController::class, 'Addnews'])->name('coffee.add-news');
Route::get('/edit-news/{id}',                       [NewsController::class, 'editNews'])->name('coffee.edit-news');
Route::post('/store-news',                          [NewsController::class, 'storeNews'])->name('coffee.store-news');
Route::put('/update-news/{id}',                     [NewsController::class, 'updateNews'])->name('coffee.update-news');

//Advertisment
Route::get('/advertisment',                         [AdvertismentController::class, 'Advertisment'])->name('coffee.advertisment');
Route::get('/add-advertisment',                     [AdvertismentController::class, 'Addadvertisment'])->name('coffee.add-advertisment');
Route::delete('/delete-advertisment/{id}',          [AdvertismentController::class, 'deleteAdvertisment'])->name('coffee.delete-advertisment');
Route::get('/edit-advertisment/{id}',               [AdvertismentController::class, 'editAdvertisment'])->name('coffee.edit-advertisment');
Route::post('/store-advertisment',                  [AdvertismentController::class, 'storeAdvertisment'])->name('coffee.store-advertisment');
Route::put('/update-advertisment/{id}',             [AdvertismentController::class, 'updateAdvertisment'])->name('coffee.update-advertisment');
Route::post('/coffee/change-ad-status',             [AdvertismentController::class, 'changeAdStatus'])->name('coffee.change-ad-status');

//promotion
Route::get('/promotion',                            [PromotionController::class, 'Promotion'])->name('coffee.promotion');
Route::get('/add-promotion',                        [PromotionController::class, 'Addpromotion'])->name('coffee.add-promotion');
Route::delete('/delete-promotion/{id}',             [PromotionController::class, 'deletepromotion'])->name('coffee.delete-promotion');
Route::get('/edit-promotion/{id}',                  [PromotionController::class, 'editpromotion'])->name('coffee.edit-promotion');
Route::post('/store-promotion',                     [PromotionController::class, 'storepromotion'])->name('coffee.store-promotion');
Route::put('/update-promotion/{id}',                [PromotionController::class, 'updatepromotion'])->name('coffee.update-promotion');
Route::post('/coffee/change-ad-status',             [PromotionController::class, 'changeAdStatus'])->name('coffee.change-ad-status');

//Events
Route::get('/events',                               [EventController::class, 'Events'])->name('coffee.events');
Route::get('/add-event',                            [EventController::class, 'Addevent'])->name('coffee.add-event');
Route::delete('/delete-event/{id}',                 [EventController::class, 'deleteEvent'])->name('coffee.delete-event');
Route::get('/edit-promotion/{id}',                  [EventController::class, 'editpromotion'])->name('coffee.edit-promotion');
Route::post('/store-event',                         [EventController::class, 'storeevent'])->name('coffee.store-event');
Route::put('/update-promotion/{id}',                [EventController::class, 'updatepromotion'])->name('coffee.update-promotion');
Route::post('/coffee/change-ad-status',             [EventController::class, 'changeAdStatus'])->name('coffee.change-ad-status');

//FAQ's
Route::get('/faq-cat',                              [FAQController::class, 'FaqCat'])->name('coffee.faq-cat');
Route::get('/add-faq-category',                     [FAQController::class, 'AddFaqCat'])->name('coffee.add-faq-category');
Route::delete('/delete-faq-category/{id}',          [FAQController::class, 'deleteFAQCat'])->name('coffee.delete-faq-category');
Route::post('/store-faq-category',                  [FAQController::class, 'storeFaqCat'])->name('coffee.store-faq-category');
Route::put('/update-faq-category/{id}',             [FAQController::class, 'updateFaqCat'])->name('coffee.update-faq-category');
Route::get('/faqs',                                 [FAQController::class, 'Faq'])->name('coffee.faqs');
Route::get('/add-faq',                              [FAQController::class, 'AddFaq'])->name('coffee.add-faq');
Route::post('/store-faq',                           [FAQController::class, 'storeFaq'])->name('coffee.store-faq');
Route::delete('/delete-faq/{id}',                   [FAQController::class, 'deleteFAQ'])->name('coffee.delete-faq');
Route::get('/edit-faq/{id}',                        [FAQController::class, 'EditFAQ'])->name('coffee.edit-faq');
Route::put('/update-faq/{id}',                      [FAQController::class, 'updateFAQ'])->name('coffee.update-faq');

//Jobs
Route::get('/jobs',                                [JobController::class, 'Jobs'])->name('coffee.jobs');
Route::get('/add-job',                             [JobController::class, 'AddJob'])->name('coffee.add-job');
Route::get('/edit-job/{id}',                       [JobController::class, 'editJob'])->name('coffee.edit-job');
Route::post('/store-job',                          [JobController::class, 'storeJob'])->name('coffee.store-job');
Route::put('/update-job/{id}',                     [JobController::class, 'updateJob'])->name('coffee.update-job');
Route::get('/job-categories',                      [JobController::class, 'JobCategories'])->name('coffee.job-categories');
Route::post('/store-job-category',                 [JobController::class, 'storeJobCategory'])->name('coffee.store-job-category');
Route::delete('/delete-job-category/{id}',         [JobController::class, 'deleteJobCategory'])->name('coffee.delete-job-category');
Route::put('/update-job-category/{id}',            [JobController::class, 'updateJobCategory'])->name('coffee.update-job-category');
});

//Account User Auth
Route::get('/account/login_account',                 [AccountAuthController::class, 'login_account'])->name('account.login_account');
Route::get('/account/login',                         [AccountAuthController::class, 'login'])->name('account.login');

Route::middleware(['account'])->prefix('account')->group(function () {
    Route::get('/dashboard',                            [AccountController::class, 'dashboard'])->name('account.dashboard');
});