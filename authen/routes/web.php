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

Route::get('/', function () {
    return view('frontend.homepages.index');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/*Route cho Administrator*/

Route::prefix('admin')->group(function (){
    //Gom nhóm các route cho phần admin

    /*
     * ------------Route admin authentication------------
     * --------------------------------------------------
     * --------------------------------------------------*/
    //route mặc định
    //URL:authen.com/admin/
    Route::get('/','AdminController@index')->name('admin.dashboard');


    //URL:authen.com/admin/dashboard
    //route đăng nhập thành công
    Route::get('/dashboard','AdminController@index')->name('admin.dashboard');

    //URL:authen.com/admin/register
    //route trả về view đăng kí tài khoản admin
    Route::get('register','AdminController@create')->name('admin.register');

    //URL:authen.com/admin/register
    //Phương thúc là post
    //route này dùng để đăng kí 1 admin từ form post
    Route::post('register','AdminController@store')->name('admin.register.store');

    //route trả về view đăng nhập admin
    //method:get
    //URL:authen.com/admin/login
    Route::get('login','Auth\Admin\LoginController@login')->name('admin.auth.login');

    //route xử lý quá trình đăng nhập admin
    //method:post
    //URL:authen.com/admin/login
    Route::post('login','Auth\Admin\LoginController@loginAdmin')->name('admin.auth.loginAdmin');

    //route dùng để đăng xuất
    //method:post
    //URL:authen.com/admin/logout
    Route::post('logout','Auth\Admin\LoginController@logout')->name('admin.auth.logout');

    /*
     * ------------Route admin shopping------------
     * --------------------------------------------------
     * --------------------------------------------------*/


    Route::get('shop/category','Admin\ShopCategoryController@index');
    Route::get('shop/category/create','Admin\ShopCategoryController@create');
    Route::get('shop/category/{id}/edit','Admin\ShopCategoryController@edit');
    Route::get('shop/category/{id}/delete','Admin\ShopCategoryController@delete');


    Route::post('shop/category','Admin\ShopCategoryController@store');
    Route::post('shop/category/{id}','Admin\ShopCategoryController@update');
    Route::post('shop/category/{id}/delete','Admin\ShopCategoryController@destroy');
    /*
         * ------------Route admin shopping product------------
         * --------------------------------------------------
         * --------------------------------------------------*/

    Route::get('shop/product','Admin\ShopProductController@index');
    Route::get('shop/product/create','Admin\ShopProductController@create');
    Route::get('shop/product/{id}/edit','Admin\ShopProductController@edit');
    Route::get('shop/product/{id}/delete','Admin\ShopProductController@delete');

    Route::post('shop/product','Admin\ShopProductController@store');
    Route::post('shop/product/{id}','Admin\ShopProductController@update');
    Route::post('shop/product/{id}/delete','Admin\ShopProductController@destroy');


    Route::get('shop/order',function (){
        return view('admin.content.shop.order.index');
    });


    Route::get('shop/review',function (){
        return view('admin.content.shop.review.index');
    });

    Route::get('shop/customer',function (){
        return view('admin.content.shop.customer.index');
    });

    Route::get('shop/brands',function (){
        return view('admin.content.shop.brands.index');
    });

    Route::get('shop/statistic',function (){
        return view('admin.content.shop.statistic.index');
    });

    Route::get('shop/product/order',function (){
        return view('admin.content.shop.adminorder.index');
    });


    /*
     * ------------Route admin Noi dung------------
     * --------------------------------------------------
     * --------------------------------------------------*/

    Route::get('content/category','Admin\ContentCategoryController@index');
    Route::get('content/category/create','Admin\ContentCategoryController@create');
    Route::get('content/category/{id}/edit','Admin\ContentCategoryController@edit');
    Route::get('content/category/{id}/delete','Admin\ContentCategoryController@delete');


    Route::post('content/category','Admin\ContentCategoryController@store');
    Route::post('content/category/{id}','Admin\ContentCategoryController@update');
    Route::post('content/category/{id}/delete','Admin\ContentCategoryController@destroy');





    Route::get('content/post','Admin\ContentPostController@index');
    Route::get('content/post/create','Admin\ContentPostController@create');
    Route::get('content/post/{id}/edit','Admin\ContentPostController@edit');
    Route::get('content/post/{id}/delete','Admin\ContentPostController@delete');

    Route::post('content/post','Admin\ContentPostController@store');
    Route::post('content/post/{id}','Admin\ContentPostController@update');
    Route::post('content/post/{id}/delete','Admin\ContentPostController@destroy');





    Route::get('content/page','Admin\ContentPageController@index');
    Route::get('content/page/create','Admin\ContentPageController@create');
    Route::get('content/page/{id}/edit','Admin\ContentPageController@edit');
    Route::get('content/page/{id}/delete','Admin\ContentPageController@delete');

    Route::post('content/page','Admin\ContentPageController@store');
    Route::post('content/page/{id}','Admin\ContentPageController@update');
    Route::post('content/page/{id}/delete','Admin\ContentPageController@destroy');


    });
    Route::get('content/Tag',function (){
        return view('admin.content.content.Tag.index');
    });

    /*
     * ------------Route admin menu------------
     * --------------------------------------------------
     * --------------------------------------------------*/

    Route::get('menu',function (){
        return view('admin.content.menu.index');
    });

    Route::get('menuitems',function (){
        return view('admin.content.menuitems.index');
    });

    /*
     * ------------Route admin user------------
     * --------------------------------------------------
     * --------------------------------------------------*/

    Route::get('users',function (){
        return view('admin.content.user.index');
    });


    /*
     * ------------Route admin media------------
     * --------------------------------------------------
     * --------------------------------------------------*/

    Route::get('media',function (){
        return view('admin.content.media.index');
    });


    /*
     * ------------Route admin Golbal Setting------------
     * --------------------------------------------------
     * --------------------------------------------------*/

    Route::get('config',function (){
        return view('admin.content.config.index');
    });



    /*
     * ------------Route admin Newletter------------
     * --------------------------------------------------
     * --------------------------------------------------*/

    Route::get('newletters',function (){
        return view('admin.content.newletters.index');
    });




    /*
     * ------------Route admin banners------------
     * --------------------------------------------------
     * --------------------------------------------------*/

    Route::get('banners',function (){
        return view('admin.content.banners.index');
    });



    /*
     * ------------Route admin Newletter------------
     * --------------------------------------------------
     * --------------------------------------------------*/

    Route::get('contact',function (){
        return view('admin.content.contact.index');
    });


    /*
     * ------------Route admin Email------------
     * --------------------------------------------------
     * --------------------------------------------------*/

    Route::get('email/inbox',function (){
        return view('admin.content.Email.inbox.index');
    });

    Route::get('email/draft',function (){
        return view('admin.content.Email.draft.index');
    });

    Route::get('email/send',function (){
        return view('admin.content.Email.send.index');
    });


/*
     * Route cho nhà cung cấp(seller)
     * */

Route::prefix('seller')->group(function (){
    //Gom nhóm các route cho phần seller


    //route mặc định
    //URL:authen.com/seller
    Route::get('/','SellerController@index')->name('seller.dashboard');


    //URL:authen.com/seller/dashboard
    //route đăng nhập thành công
    Route::get('/dashboard','SellerController@index')->name('seller.dashboard');

    //URL:authen.com/seller/register
    //route trả về view đăng kí tài khoản seller
    Route::get('register','SellerController@create')->name('seller.register');

    //URL:authen.com/seller/register
    //Phương thúc là post
    //route này dùng để đăng kí 1 admin từ form post
    Route::post('register','SellerController@store')->name('seller.register.store');

    //route trả về view đăng nhập admin
    //method:get
    //URL:authen.com/seller/login
    Route::get('login','Auth\Seller\LoginController@login')->name('seller.auth.login');

    //route xử lý quá trình đăng nhập admin
    //method:post
    //URL:authen.com/seller/login
    Route::post('login','Auth\Seller\LoginController@loginSeller')->name('seller.auth.loginSeller');

    //route dùng để đăng xuất
    //method:post
    //URL:authen.com/seller/logout
    Route::post('logout','Auth\Seller\LoginController@logout')->name('seller.auth.logout');
});

Route::prefix('shipper')->group(function (){
    //Gom nhóm các route cho phần shipper


    //route mặc định
    //URL:authen.com/shipper
    Route::get('/','ShipperController@index')->name('shipper.dashboard');


    //URL:authen.com/shipper/dashboard
    //route đăng nhập thành công
    Route::get('/dashboard','ShipperController@index')->name('shipper.dashboard');

    //URL:authen.com/shipper/register
    //route trả về view đăng kí tài khoản shipper
    Route::get('register','ShipperController@create')->name('shipper.register');

    //URL:authen.com/shipper/register
    //Phương thúc là post
    //route này dùng để đăng kí 1 shipper từ form post
    Route::post('register','ShipperController@store')->name('shipper.register.store');

    //route trả về view đăng nhập shipper
    //method:get
    //URL:authen.com/shipper/login
    Route::get('login','Auth\Shipper\LoginController@login')->name('shipper.auth.login');

    //route xử lý quá trình đăng nhập shipper
    //method:post
    //URL:authen.com/shipper/login
    Route::post('login','Auth\Shipper\LoginController@loginShipper')->name('shipper.auth.loginShipper');

    //route dùng để đăng xuất
    //method:post
    //URL:authen.com/shipper/logout
    Route::post('logout','Auth\Shipper\LoginController@logout')->name('shipper.auth.logout');
});