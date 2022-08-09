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

Route::get('/', 'PagesController@welcome')->name('welcome');
//search
Route::any('/search','SearchController@search');
Route::get('/about','PagesController@about')->name('about');
Route::get('/terms','PagesController@terms')->name('terms');
Route::get('/return_policy','PagesController@return_policy')->name('return_policy');
Route::get('/privacy_policy','PagesController@privacy_policy')->name('privacy_policy');
Route::get('/contact','PagesController@contact')->name('contact');
Route::get('/product/({id})','PagesController@product')->name('product');
Route::get('/product/single/({id})','PagesController@productDetails')->name('productsingle');
Route::get('back','PagesController@back')->name('back');
//Route::get('/', 'ProductsController@index');
Route::get('cart', 'CartUpdateController@cart')->name('cart');
Route::get('add-to-cart/{id}', 'CartUpdateController@addToCart')->name('addToCart');
Route::patch('update-cart', 'CartUpdateController@update');
Route::delete('remove-from-cart', 'CartUpdateController@remove')->name('removeCart');
Route::get('submitCart', 'CartUpdateController@clearItems')->name('submitCart');
//CheckoutPage
Route::get('checkout','CartUpdateController@payOnDelivery')->name('payOnDelivery');
Route::post('saveCheckout','CartUpdateController@storeDelivery')->name('saveCheckout');

//This Is For Online Payment
Route::get('online','CartUpdateController@online')->name('online');

//Notify User
Route::get('/markAsRead', function(){
    Auth::guard('admin')->user()->unreadNotifications->markAsRead();
	return redirect()->back();

})->name('mark');

//Notify User
Route::get('/mark', function(){
    Auth::user()->unreadNotifications->markAsRead();
	return redirect()->back();

})->name('markUser');

//This Is For Users Authentication
Auth::routes();
//This is for the User Dashboard
Route::get('/home', 'HomeController@index')->name('home');

//Route::get('/dashbord', 'HomeController@dashbord')->name('dashbord');
//This Is For The Admin
Route::prefix('admin')->group(function(){
    //This is For Dashboard
    Route::get('/', 'AdminController@index')->name('admin.dashboard');
    //This Is The Admin Authentication
    Route::get('/login','Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login','Auth\AdminLoginController@login')->name('admin.login.submit');
    //This is for Product
    Route::resource('products', 'ProductController');
    Route::post('products/approve/{id}', 'ProductController@approve')->name('admin.product.approve');
    Route::post('products/decline/{id}', 'ProductController@decline')->name('admin.product.decline');;
    //This IS For Category
    Route::resource('category','CategoryController');
    //This Is For Unit
    Route::resource('unit','UnitController');
    //This Controls The Users
    Route::resource('user','AdminUserController');
    //This Is For The Approve or Decline User Page
    Route::resource('user/approve','ApproveVericationController');
    Route::resource('user/decline','DeclineVerificationController');
    //THis Gets The Approved User
    Route::resource('users/approved','ApproveUserVericationController');
    Route::resource('users/declined','DeclineUserVericationController');
    //This Is For Faq
    Route::resource('users/faq','FaqController');
    //This Is For Online Order
    Route::get('/online','OnlineController@index')->name('admin.online');
    Route::get('/online/single/{id}','OnlineController@single')->name('admin.online.single');
    Route::get('/online/transaction/{trx}','OnlineController@getByTrx')->name('admin.online.trx');
    Route::get('/online/date/{date}','OnlineController@getByDate')->name('admin.online.date');
    Route::post('/online/approve/{id}','OnlineController@approve')->name('admin.online.approve');
    Route::post('/online/decline/{id}','OnlineController@decline')->name('admin.online.decline');
    Route::delete('/online/delete/{id}','OnlineController@destroy')->name('admin.online.destroy');
    //This Is For Delivery
    Route::get('/delivery','DeliveryController@all')->name('admin.delivery');
    Route::get('/delivery/single/{id}','DeliveryController@single')->name('admin.delivery.single');
    Route::post('/delivery/approve/{id}','DeliveryController@approve')->name('admin.delivery.approve');
    Route::post('/delivery/decline/{id}','DeliveryController@decline')->name('admin.delivery.decline');
    Route::delete('/delivery/delete/{id}','DeliveryController@destroy')->name('admin.delivery.destroy');
    Route::get('/delivery/date/{date}','DeliveryController@getByDate')->name('admin.delivery.date');
    //This Is For About Page
    Route::resource('about','frontendController\AboutController');
    Route::get('roles','AdminController@roles')->name('roles');
    Route::post('roles','AdminController@storeroles')->name('storeroles');
    //Sends Mail
    Route::get('message/{id}','AdminController@message')->name('message');
    Route::post('mail/{id}','AdminController@mail')->name('mail');
    
});

//This Is For The Users
Route::prefix('user')->group(function(){
    Route::resource('verify','VerifyController');
    Route::get('/profile','UserController@profile')->name('profile');
    Route::post('/profile','UserController@update_avatar')->name('profiles');
    Route::resource('product','UserProductController');
    Route::post('/cart/store/{id}','CartController@store')->name('user.cart.store');
    Route::get('/cart','CartController@index')->name('user.cart.index');
    Route::post('/complete','CartController@pay')->name('user.cart.pay');
    //Route::resource('pay','OfflinePaymentController');
    Route::get('send','NotificationController@send'); //Just A Test
    // Route::get('online','CartController@onlinePayment')->name('online');
    Route::get('order','UserProductController@order')->name('user.order');
    Route::get('offlineorder','UserProductController@offlineorder')->name('user.offlineorder');
});

//This is the route for online payment
Route::post('/pay', 'RaveController@initialize')->name('pay');
Route::post('/rave/callback', 'RaveController@callback')->name('callback');
Route::get('/payment','RaveController@makePayment')->name('payment');
Route::get('/success','PagesController@success')->name('success');
Route::get('/failed','PagesController@failed')->name('failed');

//This Route Is For Paystack
Route::get('makePayment','PagesController@payStack');
Route::post('/pays', 'PaymentController@redirectToGateway')->name('pays');
Route::get('/payment/callback', 'PaymentController@handleGatewayCallback');
