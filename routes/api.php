<?php

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Api\CatController;
use App\Http\Controllers\Api\User\AuthController;
use App\Http\Controllers\Api\Admin\AdminAuthController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/*** User ***/

Route::group(['prefix' => 'v1/user', 'namespace' => 'Api\User'], function () {
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login']);
    // Route::post('/register', 'AuthController@register');
    // Route::post('/login', 'AuthController@login');
    // Route::post('/send-otp', 'AuthController@sendingOtp');
    // Route::post('/resend-otp', 'AuthController@resendOtp');
    // Route::post('/forgot-password', 'AuthController@forgotPassword');

    
});
 Route::group(['prefix' => 'v1/user', 'namespace' => 'Api\User', 'middleware' => 'checkUser'], function () {

    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/profile', [AuthController::class, 'profile']);
    // Route::get('/profile', 'AuthController@profile');
    // Route::post('/profile/update','AuthController@profileUpdate');
    // Route::post('/logout', 'AuthController@logout');
    // Route::post('/change-password', 'AuthController@changePassword');
    // Route::get('/orders', 'OrderController@orders');
    // Route::get('/order-details/{id}', 'OrderController@orderDetails');
    // Route::post('/coupon-check', 'OrderController@couponCheck');

});

//*** Admin ***/

Route::group(['prefix' => 'v1/admin', 'namespace' => 'Api\Admin'], function () {
    Route::post('/register', [AdminAuthController::class, 'register']);
    Route::post('/login', [AdminAuthController::class, 'login']);
});
 Route::group(['prefix' => 'v1/admin', 'namespace' => 'Api\Admin', 'middleware' => 'checkAdmin'], function () {
    Route::post('/logout', [AdminAuthController::class, 'logout']);
    Route::post('/profile', [AdminAuthController::class, 'profile']);
    Route::post('/userList', [AdminAuthController::class, 'userList']);
    Route::get('/index', [HomeController::class, 'index']);
    Route::post('/role', [HomeController::class, 'role']);
    Route::post('/roleDelete', [HomeController::class, 'roleDelete']);
    Route::post('/permission', [HomeController::class, 'permission']);
    Route::post('/permissionDelete', [HomeController::class, 'permissionDelete']);
    Route::post('/role_has_permission', [HomeController::class, 'role_has_permission']);
    Route::post('/remove_role', [HomeController::class, 'remove_role']);
    Route::post('/revoke_Permission_To', [HomeController::class, 'revoke_Permission_To']);
    Route::post('/model_Has_Permission', [HomeController::class, 'model_Has_Permission']);
    Route::post('/model_Has_Role', [HomeController::class, 'model_Has_Role']);

});

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route::get('/user', [AuthController::class, 'viewlogin']);
// Route::post('/register', [AuthController::class, 'register']);
// Route::post('/login', [AuthController::class, 'login']);
// Route::get('/products', [ProductController::class, 'index']);
// Route::get('/products/{id}', [ProductController::class, 'show']);
// Route::get('/products/search/{name}', [ProductController::class, 'search']);


// Route::group(['middleware' => ['api', 'checkPassword'], 'namespace' => 'Api'], function(){
    // Route::get('/user', [AuthController::class, 'viewlogin']);
    // Route::get('get-main-categories-me', [CatController::class, 'index']);
   // Route::post('/products', [ProductController::class, 'store']);
    // Route::put('/products/{id}', [ProductController::class, 'update']);
    // Route::delete('/products/{id}', [ProductController::class, 'destroy']);
    // Route::post('/logout', [AuthController::class, 'logout']);

//     Route::post('get-main-categories', [CatController::class, 'store']);
//     Route::group(['prefix' => 'admin', 'namespace'=>'Admin'],function(){
//         Route::post('register', [AuthController::class, 'login']);
//         Route::post('login', [AuthController::class, 'login']);
//     });
// });

// Route::group(['middleware' => ['api', 'checkPassword', 'checkAdminToken:admin-api'], 'namespace' => 'Api'], function(){
//     Route::post('get-main-categories', [CatController::class, 'store']);
// });



// Route::get('/categories', function(){
//     return Category::all();
// });

// Route::post('/categories', function(){
//     return Category::create([
//         'name_ar' => 'bangla',
//         'name_en' => 'english'
//     ]);
// });

// Route::get('/categories', [CatController::class, 'index']);

// Route::post('/categories', [CatController::class, 'store']);

// Route::resource('categories', CatController::class);

// Route::group(['middleware' => 'api', 'namespace' => 'Api'], function(){
//     Route::post('get-main-categories', ['CategoriesController']);
// });


// Route::post('/register', [AuthController::class, 'register']);
// Route::post('/login', [AuthController::class, 'login']);
// Route::get('/products', [ProductController::class, 'index']);
// Route::get('/products/{id}', [ProductController::class, 'show']);
// Route::get('/products/search/{name}', [ProductController::class, 'search']);

// Route::resource('products', ProductController::class);

/// Protected route

// Route::group(['middleware' => ['auth:sanctum']], function () {
//     Route::post('/products', [ProductController::class, 'store']);
//     Route::put('/products/{id}', [ProductController::class, 'update']);
//     Route::delete('/products/{id}', [ProductController::class, 'destroy']);
//     Route::post('/logout', [AuthController::class, 'logout']);
// });

// Route::group([

//     'middleware' => 'api',
//     'namespace' => 'App\Http\Controllers',
//     'prefix' => 'auth'

// ], function ($router) {

//     Route::post('login', 'AuthController@login');
//     Route::post('logout', 'AuthController@logout');
//     Route::post('refresh', 'AuthController@refresh');
//     Route::post('me', 'AuthController@me');

// });