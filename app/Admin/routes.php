<?php

use Illuminate\Routing\Router;

Admin::routes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
    'as'            => config('admin.route.prefix') . '.',
], function (Router $router) {
	$router->resource('quotation', QuotationController::class);
    $router->resource('mediafile', MediaController::class);
    $router->resource('blogs', BlogController::class);
    $router->resource('blog-category', BlogCategoryController::class);
    $router->resource('it-services', ItServiceController::class);
    $router->resource('it-sub-services', ItSubServiceController::class);
    $router->resource('home-page', HomePageController::class);
    $router->resource('expert-list', ExpertListController::class);

    $router->resource('projects', ProjectController::class);
    $router->resource('project-category', ProjectCategoryController::class);
    $router->resource('media-file', MediaFileController::class);

    $router->resource('product', ItProductController::class);
    $router->resource('terms', TermsController::class);
    $router->resource('it-services-banner', ItServiceBannerController::class);

   
    $router->resource('testimonial', TestimonialController::class);
    $router->resource('analiysis', AnalysisFormController::class);
    $router->resource('contacts', ContactController::class);
    $router->resource('brand', BrandController::class);
    $router->resource('homebanner', HomeBannerController::class);
    $router->resource('enquiry', EnquiryController::class);
    $router->resource('addtocart-product', OrderProductController::class);
    $router->resource('product-user', OrderProductUserController::class);
    $router->resource('order-user', OrderUserController::class);
    $router->resource('faq', FaqHomeController::class);
   $router->get('/', 'HomeController@index')->name('home');
 });
