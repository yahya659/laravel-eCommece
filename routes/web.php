<?php

use App\Http\Controllers\cartController;
use App\Http\Controllers\ContactController;
use App\Models\Cart;
use App\Models\category;
use App\Http\Controllers\FirstController;
use App\Http\Controllers\ProductController;
use App\Models\Product;
use Illuminate\Routing\Route as IlluminateRoutingRoute;
// use Illuminate\Container\Attributes\Auth;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route as AttributeRoute;
use Symfony\Component\Routing\Route as RoutingRoute;

// Auth::route();
Auth::routes(['register' => true]);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/',[FirstController::class,'mainpage']);
Route::get('/product/{catid?}',[FirstController::class,'Getproduct'])->name('pro');
Route::get('/Categry',[FirstController::class,'GetCategry'])->name('cat');
Route::get('/addproduct',[ProductController::class,'Addproduct'])->middleware('auth');
Route::get('/editeproduct/{productid?}',[ProductController::class,'Editeproduct'])->middleware('auth');
Route::get('/removeproduct/{productid?}',[ProductController::class,'Removeproduct'])->middleware('auth');
Route::post('/storeproduct',[ProductController::class,'AddproductInCategry']);
Route::post('/storeReview',[FirstController::class,'storeReview'])->middleware('auth');
Route::get('/Review',[FirstController::class,'Review']);
Route::get('/about',[FirstController::class,'about']);
Route::get('/contact',[ContactController::class,'contact']);
Route::post('/storeaddcontact',[ContactController::class,'storeaddcontact']);
Route::get('/search',[FirstController::class,'search'] );
Route::get('/single/{productid}',[cartController::class,'single']);
Route::get('/productTable',[ProductController::class,'productsTable'])->middleware('auth');
Route::get('/checkout', [cartController::class, 'checkout'])->middleware('auth');
Route::post('/sendcart', [cartController::class, 'sendcart'])->middleware('auth');
Route::get('/cart',[cartController::class,'cart'])->middleware('auth');
Route::get('/proviousorder',[cartController::class,'proviousorder'])->middleware('auth');
Route::get('/removecart/{productid}',[cartController::class,'removecart'])->middleware('auth');
Route::get('/addproducttocart/{productid}',function($productid){
$user_id=Auth()->user()->id;
$result=Cart::where('user_id',$user_id)->where('product_id',$productid)->get();
if($result->count() > 0){
    $result->first()->quantity +=1;
    $result->first()->save();

}else{
$newcart=new Cart();
$newcart->product_id =$productid;
$newcart->user_id=Auth()->user()->id;
$newcart->quantity=1;
$newcart->save();
}
return redirect('/cart');
})->middleware('auth');

// middlewar
Route::get('admin/index',function(){
    return "age admin";

})->middleware('CheckRole:admin');
///////////
