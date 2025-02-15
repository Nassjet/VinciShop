
<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\AdminProduitController;
use App\Http\Controllers\AdminFournisseurController;
use App\Http\Controllers\AdminCategorieController;
use App\Http\Controllers\ClientCommandeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VisiteurProduitController;
use App\Http\Middleware\AdminOnly;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [MainController::class, 'index'])->name('index');

Route::get('/visiteur/produit/{id}', [MainController::class, 'product'])->name('product');
Route::get('/infos', [MainController::class, 'infos'])->name('infos');



Route::get('/cart', [CartController::class, 'index'])->name('cart');
Route::post('/cart', [CartController::class, 'add'])->name('cart.add');
Route::post('/cart/update', [CartController::class, 'update'])->name('cart.update');
Route::delete('/cart', [CartController::class, 'remove'])->name('cart.remove');
Route::get('/cart/destroy', [CartController::class, 'destroy'])->name('cart.destroy');
// Route::get('/cart/checkout', [CartController::class, 'checkout'])->name('cart.checkout');
Route::get('/cart/checkout', [CartController::class, 'checkoutSend'])->name('cart.checkout');

// Route::get('/login', [AdminController::class, 'login'])->name('login');
// Route::post('/login', [AdminController::class, 'loginSend'])->name('login.send');
// Route::get('/admin', [AdminController::class, 'index'])->middleware('auth')->name('admin.index');
// Route::get('/logout', [AdminController::class, 'logout'])->middleware('auth')->name('logout');
// Route::post('/admin/traite', [AdminController::class, 'traite'])->middleware('auth')->name('admin.traite');

//Route::get('/createCreds', [AdminController::class, 'createCreds'])->name('createCreds');

Route::resource('/admin/produit',AdminProduitController::class)->middleware(AdminOnly::class);
Route::resource('/admin/fournisseur',AdminFournisseurController::class);
Route::resource('/admin/categorie',AdminCategorieController::class);
Route::resource('/visiteur/produit',VisiteurProduitController::class);



Route::get('/dashboard', [ClientCommandeController::class,"index"])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Auth::routes();

Route::get('/home',  [ClientCommandeController::class,"index"])->middleware(['auth', 'verified'])->name('home');
