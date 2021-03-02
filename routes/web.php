<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\StoreController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductPhotoController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CartController;

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
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/product/{slug}', [HomeController::class, 'single'])->name('product.single');

Route::prefix('admin')->name('admin.')->middleware('auth')->group(function(){
 
    Route::resource('stores', StoreController::class);
    Route::resource('products', ProductController::class);
    Route::resource('categories', CategoryController::class);

    Route::post('photos/remove', [ProductPhotoController::class, 'removePhoto'])->name('photo.remove');
});

Route::prefix('cart')->name('cart.')->group(function(){
    Route::get('/', [CartController::class, 'index'])->name('index');
    Route::post('add', [CartController::class, 'add'])->name('add');
    Route::get('remove/{slug}', [CartController::class, 'remove'])->name('remove');
    Route::get('cancel', [CartController::class, 'cancel'])->name('cancel');
});

Auth::routes();

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');





// Route::get('/home', function () {
//     $helloWorld = 'Hello World.';
//     return view('welcome', compact('helloWorld'));
// })->name('home');


   // Route::prefix('stores')->name('stores.')->group(function(){
    //     Route::get('/', [StoreController::class, 'index'])->name('index');
    //     Route::get('/create', [StoreController::class, 'create'])->name('create');
    //     Route::post('/store', [StoreController::class, 'store'])->name('store');
    //     Route::get('/{store}/edit', [StoreController::class, 'edit'])->name('edit');
    //     Route::put('/update/{store}', [StoreController::class, 'update'])->name('update');
    //     Route::get('/destroy/{store}',[StoreController::class, 'destroy'])->name('destroy');
    // });


// Route::get('/model', function(){
    
//     /*  
//         Utilizando o recurso chamado Active Record
//         $user = new \App\Models\User();
//         $user->name = 'Salumao';
//         $user->email= 'salubcosta@gmail.com';
//         $user->password= bcrypt('123');
//         return \App\Models\User::all();
//     */

//     /*
//         $user = \App\Models\User::find(81);
//         $user->name = 'Salumão Editado';
//         $user->save();
//         return \App\Models\User::all();
//     */

//     /**
//      * Retorna todos os usuários
//      * return \App\Models\User::All(); 
//      * 
//      * Retorna usuários específico
//      * return \App\Models\User::find(81);
//      * 
//      * Retorno com where: 
//      *             +get     - retorna array
//      *             +first   - retorna um objeto
//      * return \App\Models\User::where('name', 'Salumao Editado')->get();   # collation
//      * return \App\Models\User::where('name', 'Salumao Editado')->first(); # object
//      * 
//      * Paginação
//      * return \App\Models\User::paginate(10);
//     */
    
//     /*
//         Mass assignment - Atribuição em massa
//         $user = \App\Models\User::create([
//             'name'  => 'Salumão Barbosa',
//             'email' => 'salu.tj@hotmail.com',
//             'password' => bcrypt('123')
//         ]);

//         Mass update - Atualização em massa
//         $user = \App\Models\User::find(83);
//         $returnAction  = $user->update([
//             'name'  => 'Salumão BC',
//             'email' => 'salubcosta@outlook.com',
//             'password' => bcrypt('123')
//         ]);
//         dd($returnAction); # true or false
//     */
    
//     return \App\Models\User::paginate(10);
// });