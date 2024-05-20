<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommandesController;
use App\Http\Controllers\DetailsCommandesController;
use App\Http\Controllers\EtatsController;
use App\Http\Controllers\FamillesController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\interfaceController;
use App\Http\Controllers\MarquesController;
use App\Http\Controllers\ModeReglementsController;
use App\Http\Controllers\ProduitsController;
use App\Http\Controllers\shopController;
use App\Http\Controllers\SousFamillesController;
use App\Http\Controllers\UnitesController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;

//cart routes
Route::get('/cart', [CartController::class,'index'])->name('cart.index');
Route::post('/add/cart/', [CartController::class, 'addProductToCart'])->name('cart.add');
Route::delete('cart/remove/{id}', [CartController::class, 'removeProductFromCart'])->name('cart.remove');
Route::put('cart/update/{id}', [CartController::class, 'updateProductOnCart'])->name('cart.update');
Route::post('/cart/order', [CartController::class, 'placeOrder'])->name('cart.order');

//interface
Route::get('/', [interfaceController::class,'index'])->name('home');
Route::get('/shop', [shopController::class,'index'])->name('shop.index');
Route::get('/shop{id}', [shopController::class,'show'])->name('shop.show');

Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('user.login');
Route::post('/login/store', [AuthController::class, 'store'])->name('user.store');
Route::get('/login/logout', [AuthController::class, 'logout'])->name('logout');




// dashboard
Route::get('/dashboard', [HomeController::class,'index'])->name('dashboard');

// detail commandes

Route::get('/detailcommandes', [DetailsCommandesController::class, 'index'])->name('detailcommandes.index');
Route::get('/detailcommandes/create', [DetailsCommandesController::class, 'create'])->name('detailcommandes.create');
Route::post('/detailcommandes', [DetailsCommandesController::class, 'store'])->name('detailcommandes.store');
Route::get('/detailcommandes/{detailcommande}', [DetailsCommandesController::class, 'show'])->name('detailcommandes.show');
Route::get('/detailcommandes/{detailcommande}/edit', [DetailsCommandesController::class, 'edit'])->name('detailcommandes.edit');
Route::put('/detailcommandes/{detailcommande}', [DetailsCommandesController::class, 'update'])->name('detailcommandes.update');
Route::delete('/detailcommandes/{detailcommande}', [DetailsCommandesController::class, 'destroy'])->name('detailcommandes.destroy');


// commaneds
Route::get('/commandes', [CommandesController::class, 'index'])->name('commandes.index');
Route::get('/commandes/create', [CommandesController::class, 'create'])->name('commandes.create');
Route::post('/commandes', [CommandesController::class, 'store'])->name('commandes.store');
Route::get('/commandes/{commande}', [CommandesController::class, 'show'])->name('commandes.show');
Route::get('/commandes/{commande}/edit', [CommandesController::class, 'edit'])->name('commandes.edit');
Route::put('/commandes/{commande}', [CommandesController::class, 'update'])->name('commandes.update');
Route::delete('/commandes/{commande}', [CommandesController::class, 'destroy'])->name('commandes.destroy');

// Users
Route::get('/users', [UsersController::class, 'index'])->name('users.index');
Route::get('/users/create', [UsersController::class, 'create'])->name('users.create');
Route::post('/users', [UsersController::class, 'store'])->name('users.store');
Route::get('/users/{user}', [UsersController::class, 'show'])->name('users.show');
Route::get('/users/{user}/edit', [UsersController::class, 'edit'])->name('users.edit');
Route::put('/users/{user}', [UsersController::class, 'update'])->name('users.update');
Route::delete('/users/{user}', [UsersController::class, 'destroy'])->name('users.destroy');


// Mode reglement
Route::get('/modereglements', [ModeReglementsController::class, 'index'])->name('modereglements.index');
Route::get('/modereglements/create', [ModeReglementsController::class, 'create'])->name('modereglements.create');
Route::post('/modereglements', [ModeReglementsController::class, 'store'])->name('modereglements.store');
Route::get('/modereglements/{modereglement}', [ModeReglementsController::class, 'show'])->name('modereglements.show');
Route::get('/modereglements/{modereglement}/edit', [ModeReglementsController::class, 'edit'])->name('modereglements.edit');
Route::put('/modereglements/{modereglement}', [ModeReglementsController::class, 'update'])->name('modereglements.update');
Route::delete('/modereglements/{modereglement}', [ModeReglementsController::class, 'destroy'])->name('modereglements.destroy');


// Etat
Route::get('/etats', [EtatsController::class, 'index'])->name('etats.index');
Route::get('/etats/create', [EtatsController::class, 'create'])->name('etats.create');
Route::post('/etats', [EtatsController::class, 'store'])->name('etats.store');
Route::get('/etats/{etat}', [EtatsController::class, 'show'])->name('etats.show');
Route::get('/etats/{etat}/edit', [EtatsController::class, 'edit'])->name('etats.edit');
Route::put('/etats/{etat}', [EtatsController::class, 'update'])->name('etats.update');
Route::delete('/etats/{etat}', [EtatsController::class, 'destroy'])->name('etats.destroy');


// Produits
Route::get('/produits', [ProduitsController::class, 'index'])->name('produits.index');
Route::get('/produits/create', [ProduitsController::class, 'create'])->name('produits.create');
Route::post('/produits', [ProduitsController::class, 'store'])->name('produits.store');
Route::get('/produits/{id}', [ProduitsController::class, 'show'])->name('produits.show');
Route::get('/produits/{produit}/edit', [ProduitsController::class, 'edit'])->name('produits.edit');
Route::put('/produits/{produit}', [ProduitsController::class, 'update'])->name('produits.update');
Route::delete('/produits/{produit}', [ProduitsController::class, 'destroy'])->name('produits.destroy');


// Sous familles
Route::get('/sousfamilles', [SousFamillesController::class, 'index'])->name('sousfamilles.index');
Route::get('/sousfamilles/create', [SousFamillesController::class, 'create'])->name('sousfamilles.create');
Route::post('/sousfamilles', [SousFamillesController::class, 'store'])->name('sousfamilles.store');
Route::get('/sousfamilles/{sousfamille}/edit', [SousFamillesController::class, 'edit'])->name('sousfamilles.edit');
Route::put('/sousfamilles/{sousfamille}', [SousFamillesController::class, 'update'])->name('sousfamilles.update');
Route::delete('/sousfamilles/{sousfamille}', [SousFamillesController::class, 'destroy'])->name('sousfamilles.destroy');



// familles
Route::get('/familles', [FamillesController::class, 'index'])->name('familles.index');
Route::get('/familles/create', [FamillesController::class, 'create'])->name('familles.create');
Route::post('/familles', [FamillesController::class, 'store'])->name('familles.store');
Route::get('/familles/{famille}', [FamillesController::class, 'show'])->name('familles.show');
Route::get('/familles/{famille}/edit', [FamillesController::class, 'edit'])->name('familles.edit');
Route::put('/familles/{famille}', [FamillesController::class, 'update'])->name('familles.update');
Route::delete('/familles/{famille}', [FamillesController::class, 'destroy'])->name('familles.destroy');


// Marques
Route::get('/marques', [MarquesController::class, 'index'])->name('marques.index');
Route::get('/marques/create', [MarquesController::class, 'create'])->name('marques.create');
Route::post('/marques', [MarquesController::class, 'store'])->name('marques.store');
Route::get('/marques/{marque}', [MarquesController::class, 'show'])->name('marques.show');
Route::get('/marques/{marque}/edit', [MarquesController::class, 'edit'])->name('marques.edit');
Route::put('/marques/{marque}', [MarquesController::class, 'update'])->name('marques.update');
Route::delete('/marques/{marque}', [MarquesController::class, 'destroy'])->name('marques.destroy');


// Unites
Route::get('/unites', [UnitesController::class, 'index'])->name('unites.index');
Route::get('/unites/create', [UnitesController::class, 'create'])->name('unites.create');
Route::post('/unites', [UnitesController::class, 'store'])->name('unites.store');
Route::get('/unites/{unite}', [UnitesController::class, 'show'])->name('unites.show');
Route::get('/unites/{unite}/edit', [UnitesController::class, 'edit'])->name('unites.edit');
Route::put('/unites/{unite}', [UnitesController::class, 'update'])->name('unites.update');
Route::delete('/unites/{unite}', [UnitesController::class, 'destroy'])->name('unites.destroy');


