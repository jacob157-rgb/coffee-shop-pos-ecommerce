<?php

use App\Http\Controllers\ProductcategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductSKU;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('pages/dashboard/index');
});
Route::resource('category', ProductcategoryController::class);
Route::resource('product', ProductController::class);
Route::resource('user', UserController::class);

// Route::get('category/create', function() {
//     ProductCategory::create([
//         'category' => 'Food',
//     ]);
// });
// Route::get('product/create' , function() {
//     Product::create([
//         'category_id' => 1,
//         'product_name' => 'Burger',
//         'product_pict' => 'burger.jpg',
//         'product_desc' => 'burger adalah makanan aneh karna jika dipisah menjadi sehat tapi jika digabung menjadi junkfood',
//     ]);
//     Product::create([
//         'category_id' => 1,
//         'product_name' => 'Pizza',
//         'product_pict' => 'pizza.jpg',
//         'product_desc' => 'pizza adalah makanan yang berasal dari italia',
//     ]);
// });
// Route::get('sku/create', function() {
//     ProductSKU::create([
//         'product_id' => 3,
//         'size' => 'Small',
//         'stock' => 10,
//         'price' => 10000,
//     ]);
// });