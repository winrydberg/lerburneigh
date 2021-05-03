<?php

use Illuminate\Support\Facades\Route; 
use App\Http\Controllers\Users\AuthController;
use App\Http\Controllers\Users\MainController; 
use App\Http\Controllers\Users\CartController;
use App\Http\Controllers\Users\AccountController;
use App\Http\Controllers\Users\CategoryController;
use App\Http\Controllers\Users\ProductController;
use App\Http\Controllers\Users\SearchController;
use App\Http\Controllers\Users\GalleryController;
use App\Http\Controllers\Users\ContactController;
use App\Http\Controllers\Users\OrderController;
use App\Http\Controllers\Users\ShopController;
use App\Http\Controllers\Users\CheckoutController;

//ADMIN ROUTES CCONTROLLER
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\AdminMainController;
use App\Http\Controllers\Admin\AdminCategoryController;
use App\Http\Controllers\Admin\AdminCustomerController;
use App\Http\Controllers\Admin\AdminOrderController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\AdminProductController;
use App\Http\Controllers\Admin\AdminContactController;
use App\Http\Controllers\Admin\AdminRegionController;
use App\Http\Controllers\Admin\AdminGalleryController;
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

// Route::get('/', function () {
//     return view('users.index');
// });
Route::get('/login', [AuthController::class, 'auth'])->name('login');
Route::get('/register', [AuthController::class, 'getRegister'])->name('register');
Route::post('/register', [AuthController::class, 'registerUser']);
Route::post('/login', [AuthController::class, 'loginUser']);
Route::get('/logout', [AuthController::class, 'logoutUser']);
Route::get('/contact-us', [MainController::class, 'contact']);
Route::post('/contact-us', [ContactController::class, 'sendMessage']);
Route::get('/', [MainController::class, 'index']);
Route::get('/about-us', [MainController::class, 'aboutUs']);
Route::get('/my-cart', [CartController::class, 'getCart']);
Route::post('/add-to-cart', [CartController::class, 'addToCart']);
Route::post('/remove-cart-item', [CartController::class, 'removeItem']);
Route::get('/category/{slug}', [CategoryController::class, 'getCategoryProducts']);
Route::get('/products/{id}/{slug}', [ProductController::class, 'getProduct']);
Route::get('/search', [SearchController::class, 'searchProduct']);
Route::get('/gallery', [GalleryController::class, 'getGallery']);
Route::get('/track-order', [OrderController::class, 'getTracker']);
Route::post('/track-order', [OrderController::class, 'getOrderStatus']);
Route::get('/shop', [ShopController::class, 'enterShop']);
Route::get('/check-out', [CheckoutController::class, 'checkOut']);
Route::post('/get-cities', [CheckoutController::class, 'getCities']);
Route::post('/get-city-charge', [CheckoutController::class, 'getCityCharge']);
Route::post('/place-order', [CheckoutController::class, 'placeOrder']);
Route::post('/update-cart', [CartController::class, 'updateCart']);



Route::group(['middleware' => 'auth'], function(){
    Route::get('/my-account', [AccountController::class, 'getAccount']);
});



Route::prefix('admin')->group(function () {
   Route::get('/login', [AdminAuthController::class, 'login']);
   Route::post('/login', [AdminAuthController::class, 'loginAdmin']);
   Route::get('/logout', [AdminAuthController::class, 'adminLogout'] );
   Route::group(['middleware' => 'auth:admin'], function(){
      Route::get('/dashboard', [AdminMainController::class, 'index'])->name('dashboard');
      Route::get('/new-category', [AdminCategoryController::class, 'newCategory']);
      Route::post('/new-category', [AdminCategoryController::class, 'saveCategory']);
      Route::get('/categories', [AdminCategoryController::class, 'categories']);
      Route::get('/customers', [AdminCustomerController::class, 'customers']);
      Route::get('/orders', [AdminOrderController::class, 'orders']);
      Route::get('/order-details/{id}', [AdminOrderController::class, 'getOrderDetails']);
      Route::get('/banners', [BannerController::class, 'banners']);
      Route::post('/banners', [BannerController::class, 'saveBanner']);
      Route::get('/new-product', [AdminProductController::class, 'newProduct']);
      Route::post('/new-product', [AdminProductController::class, 'saveProduct']);
      Route::get('/products', [AdminProductController::class, 'getProducts']);
      Route::get('/inbox', [AdminContactController::class, 'getMessages']);
      Route::get('/new-city', [AdminRegionController::class, 'newCity']);
      Route::get('/cities', [AdminRegionController::class, 'getCities']);
      Route::post('/new-city', [AdminRegionController::class, 'saveCity']);
      Route::get('/new-gallery', [AdminGalleryController::class, 'newGallery']);
      Route::post('/new-gallery', [AdminGalleryController::class, 'saveGallery']);
      Route::post('/update-order-status', [AdminOrderController::class, 'updateOrderStatus']);
   });
   
});