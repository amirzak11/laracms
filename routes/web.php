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

Route::get('/login','Admin\UserController@login')->name('login');
Route::post('/login_admin','Admin\UserController@login_admin')->name('loginAdmin');
Route::get('/logout_admin','Admin\UserController@logout')->name('logoutAdmin');
Route::get('/live_search', 'LiveSearch@index');
Route::get('/live_search/action', 'LiveSearch@action')->name('live_search.action');


Route::group(['prefix' => 'admin', 'as' => 'admin', 'namespace' => 'Admin','middleware'=>'admin'], function () {
    Route::get('/', 'UserController@index');
    /*Route User*/
    Route::group(['prefix'=>'users'],function(){
        Route::get('/', 'UserController@index');
        Route::get('/list', 'UserController@list')->name('.user.list');
        Route::get('/create', 'UserController@create')->name('.user.create');
        Route::post('/create', 'UserController@store')->name('.user.store');
        Route::get('/delete/{user_id}', 'UserController@delete')->name('.user.delete');
        Route::get('/edit/{user_id}', 'UserController@edit')->name('.user.edit');
        Route::post('/edit/{user_id}', 'UserController@update')->name('.user.update');
        Route::get('/packages/{user_id}', 'UserController@packages')->name('.user.packages');
    });
    /*Route ORDER*/
    Route::group(['prefix'=>'order'],function(){
        Route::get('/list', 'OrderController@list')->name('.order.list');
        Route::get('/order/details/{order_id}','OrderController@details')->name('.order.details');
        Route::get('/delete/{order_id}', 'OrderController@delete')->name('.order.delete');

    });
    /*Route FILE*/
    Route::group(['prefix'=>'file'],function() {
        Route::get('/list', 'FileController@list')->name('.file.list');
        Route::get('/create', 'FileController@create')->name('.file.create');
        Route::post('/create', 'FileController@store')->name('.file.store');
        Route::get('/delete/{file_id}', 'FileController@delete')->name('.file.delete');
        Route::get('/edit/{file_id}', 'FileController@edit')->name('.file.edit');
        Route::post('/edit/{file_id}', 'FileController@update')->name('.file.update');
    });
    /*Route Product*/
    Route::get('/product/list', 'ProductController@list')->name('.product.list');
    /*Category*/
    Route::get('/product/category/create', 'ProductController@category_create')->name('.product.category.create');
    Route::post('/product/category/create', 'ProductController@category_store')->name('.product.category.store');

    /*Brand*/
    Route::get('/product/brand/create', 'ProductController@brand_create')->name('.product.brands.create');
    Route::post('/product/brand/create', 'ProductController@brand_store')->name('.product.brands.store');

    Route::get('/product/create/category', 'ProductController@create_category')->name('.product.create_product');
    Route::post('/product/create/category', 'ProductController@create')->name('.product.create');

    Route::post('/product/create/category/store', 'ProductController@store')->name('.product.store');

    Route::post('/product/edit/{product_id}', 'ProductController@update')->name('.product.update');
    Route::get('/product/delete/{product_id}', 'ProductController@delete')->name('.product.delete');
    Route::get('/product/image_delete/{image_id}/products/{product_id}', 'ProductController@img_delete')->name('.image.delete');
    Route::get('/product/property_delete/{property_id}/products/{product_id}', 'ProductController@property_delete')->name('.property.delete');

    Route::get('/product/edit/{product_id}', 'ProductController@edit')->name('.product.edit');


    /*Route PLAN*/
    Route::get('/plan/list', 'PlanController@list')->name('.plan.list');
    Route::get('/plan/create', 'PlanController@create')->name('.plan.create');
    Route::post('/plan/create', 'PlanController@store')->name('.plan.store');
    Route::get('/plan/delete/{plan_id}', 'PlanController@delete')->name('.plan.delete');
    Route::get('/plan/edit/{plan_id}', 'PlanController@edit')->name('.plan.edit');
    Route::post('/plan/edit/{plan_id}', 'PlanController@update')->name('.plan.update');
    Route::get('/sync_plan/edit/{plan_id}', 'PlanController@sync_file')->name('.sync_file_plan.edit');
    Route::post('/sync_plan/edit/{plan_id}', 'PlanController@update_sync_file')->name('.sync_file_plan.update');

    /*Route PACKAGE*/
    Route::get('/package/list', 'PackageController@list')->name('.package.list');
    Route::get('/package/create', 'PackageController@create')->name('.package.create');
    Route::post('/package/create', 'PackageController@store')->name('.package.store');
    Route::get('/package/delete/{package_id}', 'PackageController@delete')->name('.package.delete');
    Route::get('/package/edit/{package_id}', 'PackageController@edit')->name('.package.edit');
    Route::post('/package/edit/{package_id}', 'PackageController@update')->name('.package.update');
    Route::get('/sync_file/edit/{package_id}', 'PackageController@sync_file')->name('.sync_file.edit');
    Route::post('/sync_file/edit/{package_id}', 'PackageController@update_sync_file')->name('.sync_file.update');


    /*Route PAYMENT*/
    Route::get('/payment/list', 'PaymentController@list')->name('.payment.list');
    Route::get('/payment/delete/{payment_id}', 'PaymentController@delete')->name('.payment.delete');

    /*Route Category*/
    Route::get('/categories', 'CategoryController@index')->name('.categories.categories');
    Route::get('/categories/list', 'CategoryController@list')->name('.categories.list');
    Route::get('/categories/create', 'CategoryController@create')->name('.categories.create');
    Route::get('/categories/create2', 'CategoryController@create2')->name('.categories.create2');
    Route::post('/categories/create', 'CategoryController@store')->name('.categories.store');

    Route::get('/categories/edit/{categories_id}', 'CategoryController@edit')->name('.categories.edit');
    Route::post('/categories/edit/{categories_id}', 'CategoryController@update')->name('.categories.update');
    Route::get('/categories/delete/{categories_id}', 'CategoryController@delete')->name('.categories.delete');
    Route::get('/categories/property_delete/{property_id}/category/{category_id}', 'CategoryController@property_delete')->name('.category_property.delete');

    /*Route Province*/
    Route::get('/provinces/list', 'ProvinceController@list')->name('.provinces.list');
    Route::get('/provinces/create', 'ProvinceController@create')->name('.provinces.create');
    Route::post('/provinces/create', 'ProvinceController@store')->name('.provinces.store');
    Route::get('/provinces/edit/{provinces_id}', 'ProvinceController@edit')->name('.provinces.edit');
    Route::post('/provinces/edit/{provinces_id}', 'ProvinceController@update')->name('.provinces.update');
    Route::get('/provinces/delete/{provinces_id}', 'ProvinceController@delete')->name('.provinces.delete');
    Route::get('/province/province_delete/{city_id}/province/{province_id}', 'ProvinceController@city_delete')->name('.city_province.delete');

    /*Route City */
    Route::get('/cites/list', 'CityController@list')->name('.cites.list');
    Route::get('/cites/create', 'CityController@create')->name('.cites.create');
    Route::post('/cites/create', 'CityController@store')->name('.cites.store');
    Route::get('/cites/edit/{cites_id}', 'CityController@edit')->name('.cites.edit');
    Route::post('/cites/edit/{cites_id}', 'CityController@update')->name('.cites.update');
    Route::get('/cites/delete/{cites_id}', 'CityController@delete')->name('.cites.delete');

    /*Route Brand*/
    Route::get('/brands/list', 'BrandController@list')->name('.brands.list');
    Route::get('/brands/create', 'BrandController@create')->name('.brands.create');
    Route::post('/brands/create', 'BrandController@store')->name('.brands.store');
    Route::get('/brands/edit/{brands_id}', 'BrandController@edit')->name('.brands.edit');
    Route::post('/brands/edit/{brands_id}', 'BrandController@update')->name('.brands.update');
    Route::get('/brands/delete/{brands_id}', 'BrandController@delete')->name('.brands.delete');

    /*Route Slideshow*/
    Route::get('/slideshow/list', 'SlideshowController@list')->name('.slideshow.list');
    Route::get('/slideshow/create', 'SlideshowController@create')->name('.slideshow.create');
    Route::post('/slideshow/create', 'SlideshowController@store')->name('.slideshow.store');
    Route::get('/slideshow/delete/{slideshow_id}', 'SlideshowController@delete')->name('.slideshow.delete');
    Route::get('/slideshow/edit/{slideshow_id}', 'SlideshowController@edit')->name('.slideshow.edit');
    Route::post('/slideshow/edit/{slideshow_id}', 'SlideshowController@update')->name('.slideshow.update');

    /*Route Article*/
    Route::get('/article/list', 'ArticleController@list')->name('.article.list');
    Route::get('/article/create', 'ArticleController@create')->name('.article.create');
    Route::post('/article/create', 'ArticleController@store')->name('.article.store');
    Route::get('/article/delete/{article_id}', 'ArticleController@delete')->name('.article.delete');
    Route::get('/article/edit/{article_id}', 'ArticleController@edit')->name('.article.edit');
    Route::post('/article/edit/{article_id}', 'ArticleController@update')->name('.article.update');

    /*Route SlideShop*/
    Route::get('/slideshop/list', 'SlideShopController@list')->name('.slideshop.list');
    Route::get('/slideshop/create', 'SlideShopController@create')->name('.slideshop.create');
    Route::post('/slideshop/create', 'SlideShopController@store')->name('.slideshop.store');
    Route::get('/slideshop/delete/{cat_id}', 'SlideShopController@delete')->name('.slideshop.delete');

    /*Route Banner*/
    Route::get('/banner/list', 'BannerController@list')->name('.banner.list');
    Route::get('/banner/create', 'BannerController@create')->name('.banner.create');
    Route::post('/banner/create', 'BannerController@store')->name('.banner.store');
    Route::get('/banner/delete/{cat_id}', 'SlideShopController@delete')->name('.slideshop.delete');


    /*Route Information Web*/

    Route::get('/information/edit', 'InformationController@edit')->name('.info.edit');
    Route::post('/information/edit','InformationController@update')->name('.info.update');

});



Route::group(['prefix' => '/','as' => 'frontend',  'namespace' => 'Frontend'], function () {
    /*Route Home*/
    Route::get('/', 'HomeController@index')->name('.home');;
    Route::get('/search/{cat_id}', 'ProductController@list')->name('.search.list');
    Route::get('/search/filter/{brand_id}/{cat_id}', 'ProductController@filter_search')->name('.filter.search');
    Route::get('/product/{id}', 'ProductController@index')->name('.product.list');
    /*Route Article*/
    Route::get('/article/{id}', 'ArticleController@index')->name('.article.view');

    /*Route Brands*/
    Route::get('/brand/{id}', 'BrandController@index')->name('.brand.view');

    /*Route Page*/
    Route::get('/page/contact-us','HomeController@contact')->name('.page.contact');
    Route::get('/page/about','HomeController@about')->name('.page.about');
    Route::get('/page/my_site','SiteController@my_site')->name('.page.my_site');

    /*Route UserSeller*/

    Route::get('/page/seller','UserSellerController@index')->name('.page.seller-introduction');

    /*Route Product*/
    Route::get('/add_to_cart/{id}', 'ProductController@GetAddToCart')->name('.product.addtocart');
    Route::get('/cart_container', 'ProductController@GetCart')->name('.product.cart_container');
    Route::get('/remove_from_cart/{id}', 'ProductController@RemoveCart')->name('.product.remove_from_cart');

    /*Route Order*/
    Route::get('/order', 'OrderController@post_information')->name('.order.post_information');
    Route::post('/order', 'OrderController@order_register')->name('.order.register');
    Route::post('/order/payment', 'OrderController@post_payment')->name('.order.post_payment');


    /*Route user login and logout*/
    Route::get('/user/login','UserController@login')->name('.user.login');
    Route::get('/user/logout','UserController@logout')->name('.user.logout');
    Route::post('/profile','UserController@login_user')->name('.user.loginUser');
    Route::get('/user/register','UserController@register')->name('.user.register');
    Route::post('/user/register','UserController@singin')->name('.user.singin');

    /*Route seller*/
    Route::get('/seller/view','SellerController@view')->name('.seller.view');

    /*Route profile*/
    Route::get('/profile/view','ProfileController@view')->name('.profile.view');
    Route::get('/profile/edit','ProfileController@edit')->name('.profile.edit');
    Route::post('/profile/edit', 'ProfileController@update')->name('.profile.update');

    /*Route interest*/
    Route::get('/interest/view','InterestController@view')->name('.interest.view');
    Route::get('/interest/{product_id}','InterestController@add')->name('.interest.add');


    /*Route Address*/
    Route::get('/address/view','AddressController@view')->name('.address.view');
    Route::get('/address/create','AddressController@create')->name('.address.create');
    Route::post('/address/create','AddressController@store')->name('.address.store');
    Route::get('/address/delete/{address_id}', 'AddressController@delete')->name('.address.delete');
    Route::get('/address/edit/{address_id}', 'AddressController@edit')->name('.address.edit');
    Route::post('/address/edit/{address_id}', 'AddressController@update')->name('.address.update');
    /*Route Order*/
    Route::get('/order/view','OrderController@view')->name('.order.view');
    Route::get('/order/details/{order_id}','OrderController@details')->name('.order.details');


    Route::get('/product', 'SearchController@index');
    Route::get('/product/simple', 'SearchController@simple')->name('.simple_search');
    Route::get('/product/advance', 'SearchController@advance')->name('.advance_search');

});



