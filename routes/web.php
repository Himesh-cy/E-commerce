<?php

use BaconQrCode\Renderer\Color\Rgb;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController; 
use App\Http\Controllers\AdminController;


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
//     return view('welcome');
// });
Route::get('/',[HomeController::class,'index']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/redirect',[HomeController::class,'redirect']);

route::get('/view_catagory',[AdminController::class,'view_catagory']);

route::post('/add_catagory',[AdminController::class,'add_catagory']);

route::get('/delete_catagory/{id}',[AdminController::class,'delete_catagory']);

route::get('/view_product',[AdminController::class,'view_product']);

route::post('/add_product',[AdminController::class,'add_product']);


route::get('/show_product',[AdminController::class,'show_product']);

route::get('/delete_product/{id}',[AdminController::class,'delete_product']);

route::get('/update_product/{id}',[AdminController::class,'update_product']);

route::post('/update_product_confirm/{id}',[AdminController::class,'update_product_confirm']);

//product detail route
route::get('/product_details/{id}',[HomeController::class,'product_details']);


//add cart route
route::post('/add_cart/{id}',[HomeController::class,'add_cart']);


//show cart route
route::get('/show_cart',[HomeController::class,'show_cart']);



//remove cart route
route::get('/remove_cart/{id}',[HomeController::class,'remove_cart']);

//cash order route
route::get('/cash_order',[HomeController::class,'cash_order']);






//admin order show
route::get('/order',[AdminController::class,'order']);

route::get('/delivered/{id}',[AdminController::class,'delivered']);


//print pdf
route::get('/print_pdf/{id}',[AdminController::class,'print_pdf']);


//search
route::get('/search',[AdminController::class,'searchdata']);


//show order
route::get('/show_order',[HomeController::class,'show_order']);


//cancle order
route::get('/cancle_order/{id}',[HomeController::class,'cancle_order']);



//add comment

route::post('/add_comment',[HomeController::class,'add_comment']);

//add reply
route::post('/add_reply',[HomeController::class,'add_reply']);


//search product

route::get('/product_search',[HomeController::class,'product_search']);

route::get('/search_product',[HomeController::class,'search_product']);



//product
route::get('/products',[HomeController::class,'products']);


route::get('contact_page',[HomeController::class,'contact_page']);


// payment

route::get('verify-payment',[HomeController::class,'verify']);




    

