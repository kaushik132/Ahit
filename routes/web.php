<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\Pages;
use App\Http\Controllers\BotManController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ForgetPasswordController;
use App\Http\Controllers\PhonePayController;
use App\Http\Controllers\SitemapController;




// artifyme
Route::get('sitemap.xml',[SitemapController::class, 'index']);
Route::get('artifyme/privacy-policy', 'Pages@PrivacyPolicyArtifyme')->name('PrivacyPolicyArtifyme');

//end  artifyme

// Ashu Ai
Route::get('ashu/privacy-policy', 'Pages@PrivacyPolicyAshu')->name('PrivacyPolicyAshu');
Route::get('tithi/privacy-&-policy', 'Pages@PrivacyPolicyTithi')->name('PrivacyPolicyTithi');
//End Ashu Ai

// it services
// Route::get('search','Pages@search')->name('search');
Route::get('/it-services/{any?}', 'Pages@itServies')->name('itServies');
Route::get('/it-service', 'Pages@itServiesmain')->name('itServiesmain');
//end  it services


Route::get('/', 'Pages@index')->name('home');
Route::get('/about-us', 'Pages@aboutus')->name('about-us');
Route::get('/package', 'Pages@package')->name('package');
Route::get('/contact-us', 'Pages@contactus')->name('contact-us');
Route::get('/web-design', 'Pages@webdesign')->name('web-design');
Route::get('/graphic-design', 'Pages@graphicdesign')->name('graphic-design');
Route::get('/web-development', 'Pages@webdevelopment')->name('web-development');
Route::get('/digital-marketing', 'Pages@digitalmarketing')->name('digital-marketing');


Route::get('/terms-and-condition', 'Pages@terms')->name('terms');
Route::get('/privacy-and-policy', 'Pages@privacy')->name('privacy');
Route::get('/shipping-and-policy', 'Pages@shipping')->name('shipping');
Route::get('/cancellation-and-refund-policy', 'Pages@cancellation')->name('cancellation');

Route::get('/blogs/{any?}', 'Pages@blogs')->name('blogs');
Route::get('/blog/{id}',  'Pages@blogdetails')->name('blogdetails');

Route::get('/products/{any?}', 'Pages@products')->name('products');
Route::get('/single-product/{slug?}', 'Pages@singleproduct')->name('single-product');


Route::get('/project/{any?}', 'Pages@project')->name('projects');
Route::get('/project-details/{id}', 'Pages@projectdetail')->name('projectdetails');

// paypal
Route::post('pay', [PaymentController::class, 'pay'])->name('payment');
Route::get('success', [PaymentController::class, 'success']);
Route::get('error', [PaymentController::class, 'error']);
Route::get('/get-quotation', 'Pages@quotation')->name('quotation');
Route::post('/kaushik', 'Pages@quotationstore')->name('quotationstore');
Route::post('/analysis', 'Pages@analysis')->name('analysis');
Route::post('/logout', 'Pages@logout')->name('logout');
Route::get('/search', 'Pages@search');
Route::get('/search-wishlist', 'Pages@searchwishlist')->name('searchwishlist');




Route::group(['middleware' => 'auth'], function () {
    
    Route::get('profile/{id}', 'Pages@profile')->name('profile');
    Route::put('update-profile/{id}', 'Pages@updateprofile')->name('updateprofile');


    Route::get('user-orders','Pages@userOrder')->name('userOrder');
    Route::get('user-wishlist','Pages@userWishlist')->name('userWishlist');

    Route::any('/payment/process', [PhonePayController::class,'makePhonePePayment'])->name('payment/process');
Route::any('payment_callback', [PhonePayController::class,'phonePeCallback'])->name('payment_callback');


    
    
//End paypal


// dropdown start

Route::post('api/fetch-state','Pages@fatchState');
Route::post('api/fetch-cities','Pages@fatchCity');
// dropdown end




//UniverseController start

// Route::get('/countries', [UniverseController::class, 'index']);
Route::get('/states','Pages@getStates')->name('states');
Route::get('/cities', 'Pages@getCities')->name('cities');

//UniverseController end



Route::get('cart/{id}', 'Pages@cart')->name('cart');
Route::get('wishlist/{id}', 'Pages@wishlist')->name('wishlist');

Route::get('/add-to-cart', 'Pages@addtocart')->name('add-to-cart');
Route::get('/buy-now', 'Pages@buynowpage')->name('buy-now');
Route::put('updatecart/{id}', 'Pages@updatecart')->name('updatecart');
Route::get('delete/{id}', 'Pages@deletecart');



Route::get('edit/{id}', 'Pages@edit')->name('edit');



Route::patch('update-cart', 'Pages@update')->name('update_cart');
Route::delete('remove-from-cart', 'Pages@remove')->name('remove_from_cart');



});




Route::match(['get','post'],'/botman',[BotManController::class , "handle"]);
Route::group(['middleware' => 'guest'], function () {
Route::get('/login_page', 'Pages@loginpage')->name('loginpage');
Route::post('/login_page', 'Pages@loginPost')->name('login');
Route::get('/sign_up_page', 'Pages@signpage')->name('signpage');
Route::post('/sign_up_page','Pages@registerPost')->name('register');


});



Route::get('/forget-password',[ForgetPasswordController::class, 'forgetPassword'])->name('forgetPassword');
Route::post('/forget-password-post',[ForgetPasswordController::class, 'forgetPasswordPost'])->name('forgetPasswordPost');
Route::get('/reset-password/{token}',[ForgetPasswordController::class, 'resetPassword'])->name('resetPassword');
Route::post('/reset-password',[ForgetPasswordController::class, 'resetPasswordPost'])->name('resetPasswordPost');


Route::get('/load-cart-data', 'Pages@cartcount')->name('cartcount');

  



Route::get('/blank-page', 'Pages@blankpage')->name('blank-page');
Route::post('/contacfrom', 'Pages@contacfrom')->name('contacfrom');
Route::get('/foo', function () {
    Artisan::call('storage:link');
});

Route::get('/robots.txt',function(){
      $xml = View::make('robots');
     return Response::make($xml, 200)->header('Content-Type', 'text/plain');
});




Route::get('/cc',function (){
    Artisan::call('route:clear');
    Artisan::call('view:clear');
    Artisan::call('config:clear');
    Artisan::call('cache:clear');
    echo 'clear';
});

// Route::get('/cc', function () {
//     Artisan::call('optimize:clear ');
// });
