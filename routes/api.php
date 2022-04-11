<?php

// use App\Models\Category;
// use App\Http\Controllers\Api\CatController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Api\User\AuthController;
use App\Http\Controllers\Api\Admin\AdminAuthController;
use App\Http\Controllers\Api\Admin\WarehouseController;
use App\Http\Controllers\Api\Admin\AvailableController;
use App\Http\Controllers\Api\Admin\PickupDeliveryManController;
use App\Http\Controllers\Api\Admin\LocationController;
use App\Http\Controllers\Api\Admin\ParcelController;
use App\Http\Controllers\Api\Admin\ProductController;
use App\Http\Controllers\Api\Admin\MerchantController;
use App\Http\Controllers\Api\Admin\MerchantUserController;
use App\Http\Controllers\Api\meet\TaskController;

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
    //***Admin Login***//
    Route::post('/register', [AdminAuthController::class, 'register']);
    Route::post('/login', [AdminAuthController::class, 'login']);
    Route::post('/change-password', [AdminAuthController::class, 'passwordChange']);
    // Route::get('/userList', [AdminAuthController::class, 'userList']);
});

//*** Admin Login with middleware***//
Route::group(['prefix' => 'v1/admin', 'namespace' => 'Api\Admin', 'middleware' => 'checkAdmin'], function () {
    //***Admin Login***//
    Route::get('/userList', [AdminAuthController::class, 'userList']);
    Route::post('/logout', [AdminAuthController::class, 'logout']);
    Route::post('/profile', [AdminAuthController::class, 'profile']);
    //***Spatie Permission***//
    Route::get('/permission', [HomeController::class, 'permission']);
    Route::post('/permission-store', [HomeController::class, 'permissionCreate']);
    Route::get('/permission-edit/{id}', [HomeController::class, 'permissionEdit']);
    Route::put('/permission-update', [HomeController::class, 'permissionUpdate']);
    Route::get('/permission-delete/{id}', [HomeController::class, 'permissionDelete']);
    Route::get('/permission-search/{name}', [HomeController::class, 'permissionSearch']);
    Route::get('/permission-search ', [HomeController::class, 'empty']);
    //***Spatie Role***//
    Route::get('/role', [HomeController::class, 'role']);
    Route::get('/role-find/{id}', [HomeController::class, 'roleFind']);
    Route::post('/role-store', [HomeController::class, 'roleStore']);
    Route::get('/role-edit/{id}', [HomeController::class, 'roleEdit']);
    Route::put('/role-update', [HomeController::class, 'roleUpdate']);
    Route::delete('/role-destroy', [HomeController::class, 'roleDestroy']);
    //***Spatie Expra***//
    Route::post('/roleDelete', [HomeController::class, 'roleDelete']);
    Route::post('/remove-role', [HomeController::class, 'removeRole']);
    Route::post('/role-has-permission', [HomeController::class, 'roleHasPermission']);
    Route::post('/revoke-Permission-To', [HomeController::class, 'revokePermissionTo']);
    //***Spatie Model***//
    Route::post('/model-Has-Permission', [HomeController::class, 'modelHasPermission']);
    Route::post('/model-Has-Role', [HomeController::class, 'modelHasRole']);

    //***Warehouse Api***//
    //Route::resource('warehouse', WarehouseController::class);
    // Route::post('/warehouse', [WarehouseController::class, 'index']);
    Route::resource('warehouse', 'WarehouseController');
    Route::post('/warehouse-available','WarehouseController@available');
    Route::get('/warehouse-search/{name}','WarehouseController@warehouseSearch');
    // Route::post('/warehouse-info','WarehouseController@warehouse_info');

    //***Available Api***//
    Route::resource('available', 'AvailableController');
    Route::post('/available-warehouse-location','AvailableController@available_warehouse_location');

    //***PickupDeliveryMan Api***//
    Route::resource('pickup-delivery-man', 'PickupDeliveryManController');

    //***Location Api***//
    Route::resource('location', 'LocationController');
    Route::get('/location-search/{area}','LocationController@locationSearch');
    Route::get('/location-data','LocationController@locationData');

    //***Parcel Api***//
    Route::resource('parcel', 'ParcelController');
    Route::post('location-info', 'ParcelController@parcel_info');

    //***Product Api***//
    Route::resource('product', 'ProductController');

    //***Merchant Api***//
    Route::resource('merchant', 'MerchantController');
    Route::get('/merchant-search','MerchantController@merchantSearch');

    //***MerchantUser Api***//
    Route::resource('merchant-user', 'MerchantUserController');
    Route::post('merchant-user-info', 'MerchantUserController@merchant_user_info');

    //***PickupAssign Api***//
    Route::resource('pickup-assign', 'PickupAssignController');
});

Route::group(['prefix' => 'v1/crm', 'namespace' => 'Api\crm', 'middleware' => 'checkAdmin'], function () {
    //***CRM Api***//
    Route::resource('issue', 'IssueController');
    Route::resource('query', 'QueryController');
    Route::resource('regulation', 'RegulationController');
});

Route::group(['prefix' => 'v1/meet', 'namespace' => 'Api\meet', 'middleware' => 'checkAdmin'], function () {
    //***CRM Api***//
    // return 'ok';
    Route::resource('task', 'TestController');
    Route::resource('sub-task', 'SubTestController');
    Route::post('sub-task/status/{id}', 'SubTestController@status');
    Route::post('task/date', 'TestController@date');
    Route::get('virsion', 'TestController@virsion');
    // Route::get('date', 'TestController@show');
    // Route::resource('regulation', 'RegulationController');
    // Route::get('/location-search/{area}','LocationController@locationSearch');
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
