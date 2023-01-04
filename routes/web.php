<?php

use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MenuController;
use Illuminate\Support\Facades\Route;

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

//Route::get('/', function () {
//    return view('welcome');
//});
Route::get('/',[HomeController::class,'index'])->name('Home-index');
Route::get('/contact',[ContactController::class,'index'])->name('Contact-index');
Route::post('/contact',[ContactController::class,'store'])->name('Contact-store');
Route::get('/menu',[MenuController::class,'index'])->name('Menu-index');
Route::get('/author',[\App\Http\Controllers\AuthorController::class,'index'])->name('Author-index');

Route::middleware(['admin'])->group(function (){

    Route::get('/products',[\App\Http\Controllers\ProductController::class,'index'])->name('Products-index');
    Route::get('/products/create',[\App\Http\Controllers\ProductController::class,'create'])->name('Products-create');
    Route::post('/products/create',[\App\Http\Controllers\ProductController::class,'store'])->name('Products-store');
    Route::delete('/products/{id}',[\App\Http\Controllers\ProductController::class,'destroy'])->name('Products-destroy');
    Route::get('/Categories',[AdminCategoryController::class,'index'])->name('Categories-index');
    Route::patch('/Categories',[AdminCategoryController::class,'update'])->name('Categories-update');
    Route::get('/Categories/create',[AdminCategoryController::class,'create'])->name('Categories-create');
    Route::post('/Categories/create',[AdminCategoryController::class,'store'])->name('Categories-store');
    Route::delete('/Categories/{id}',[AdminCategoryController::class,'destroy'])->name('Categories-destroy');
    Route::get('/Categories/{id}',[AdminCategoryController::class,'show'])->name('Categories-show');
    Route::get('/NavMenu',[\App\Http\Controllers\AdminNavMenu::class,'index'])->name('NavMenu-index');
    Route::get('/NavMenu/Create',[\App\Http\Controllers\AdminNavMenu::class,'create'])->name('NavMenu-create');
    Route::post('/NavMenu/Create',[\App\Http\Controllers\AdminNavMenu::class,'store'])->name('NavMenu-store');
    Route::get('/admin',[\App\Http\Controllers\AdminPanelController::class,'index'])->name('Admin-index');
    Route::get('/users',[\App\Http\Controllers\AdminUserController::class,'index'])->name('Users-index');
    Route::delete('/users/{id}',[\App\Http\Controllers\AdminUserController::class,'destroy'])->name('Users-destroy');
    Route::get('/tables',[\App\Http\Controllers\AdminTablesController::class,'index'])->name('Tables-index');
    Route::get('/tables/create',[\App\Http\Controllers\AdminTablesController::class,'create'])->name('Table-create');
    Route::post('/tables/create',[\App\Http\Controllers\AdminTablesController::class,'store'])->name('Table-store');
    Route::get('/adminRezervation',[\App\Http\Controllers\AdminRezervationController::class,'index'])->name('AdminRezervation-index');
    Route::get('/adminEmails',[\App\Http\Controllers\AdminEmailsController::class,'index'])->name('AdminEmails-index');
});

Route::middleware(['RegisteredUser'])->group(function (){
    Route::get('/rezervations/create',[\App\Http\Controllers\RezervationController::class,'create'])->name('Rezervation-create');
    Route::post('/rezervations/create',[\App\Http\Controllers\RezervationController::class,'store'])->name('Rezervation-store');
    Route::get('/rezervations',[\App\Http\Controllers\RezervationController::class,'index'])->name('Rezervation-index');
    Route::delete('/rezervations/{id}',[\App\Http\Controllers\RezervationController::class,'remove'])->name('Rezervation-remove');
});

Route::get('/login',[\App\Http\Controllers\AuthController::class,'index'])->name('Login-index');
Route::post('/login',[\App\Http\Controllers\AuthController::class,'LoginUser'])->name('Login-LoginUser');
Route::get('/logout',[\App\Http\Controllers\AuthController::class,'LogoutUser'])->name('Login-Logout');
Route::get('/register',[\App\Http\Controllers\RegisterController::class,'index'])->name('Login-register');
Route::post('/register',[\App\Http\Controllers\RegisterController::class,'register'])->name('Login-registerUser');
