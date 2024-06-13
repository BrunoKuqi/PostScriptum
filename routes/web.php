<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\WriterController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\RevisorController;

Route::get('/', [PublicController::class, 'homepage'])->name('home');

Route::get('/team', [PublicController::class, 'team'])->name('team');

Route::get('/articoli', [ArticleController::class, 'index'])->name('index');    //Esibizione di tutti gli articoli

Route::get('/article/show/{article:slug}', [ArticleController::class, 'show'])->name('show');  //Esibizione del singolo articolo

Route::get('/articolo/edit/{article}', [ArticleController::class, 'edit'])->name('edit')->middleware('auth'); //Indirizzamento al Form per la modifica dell'articolo
Route::put('/articolo/update/{article}', [ArticleController::class, 'update'])->name('update')->middleware('auth'); //Richiamo della Funzione che modifica i valori dell'articolo selezionato
Route::delete('/articolo/delete/{article}', [ArticleController::class, 'delete'])->name('delete')->middleware('auth'); //Richiamo della Funzione che elimina l'articolo selezionato

Route::get('/article/category/{category}', [ArticleController::class, 'category'])->name('categories');

Route::get('/article/user/{user}', [ArticleController::class, 'user'])->name('users'); //->middleware('auth');

Route::get('/careers', [PublicController::class, 'careers'])->name('careers')->middleware('auth'); //Indirizzamento del Form di richiesta ruolo

Route::post('/careers/submit', [PublicController::class, 'careersSubmit'])->name('careers.submit')->middleware('auth');

Route::middleware('admin')->group(function () {
  Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
});

Route::middleware('admin')->group(function () {
  Route::get('/admin/{user}/set-admin', [AdminController::class, 'setAdmin'])->name('admin.setAdmin');
});

Route::middleware('admin')->group(function () {
  Route::get('/admin/{user}/set-revisor', [AdminController::class, 'setRevisor'])->name('admin.setRevisor');
});

Route::middleware('admin')->group(function () {
  Route::get('/admin/{user}/set-writer', [AdminController::class, 'setWriter'])->name('admin.setWriter');
});

Route::middleware('revisor')->group(function () {
  Route::get('/revisor/dashboard', [RevisorController::class, 'dashboard'])->name('revisor.dashboard');
});

Route::middleware('revisor')->group(function () {
  Route::get('/revisor/{article}/accept', [RevisorController::class, 'acceptArticle'])->name('revisor.acceptArticle');
});

Route::middleware('revisor')->group(function () {
  Route::get('/revisor/{article}/reject', [RevisorController::class, 'rejectArticle'])->name('revisor.rejectArticle');
});

Route::middleware('revisor')->group(function () {
  Route::get('/revisor/{article}/undo', [RevisorController::class, 'undoArticle'])->name('revisor.undoArticle');
});

Route::middleware('writer')->group(function () {

  Route::get('/create', [ArticleController::class, 'create'])->name('create')->middleware('auth');    //Indirizzamento al Form per la creazione dell'articolo

  Route::post('/store', [ArticleController::class, 'store'])->name('store')->middleware('auth');  //Acquisizione dei dati nel form

});

Route::get('/article/search', [ArticleController::class, 'articleSearch'])->name('article.search');

Route::middleware('admin')->group(function () {
  Route::put('/admin/edit/tag/{tag}', [AdminController::class, 'editTag'])->name('admin.editTag');
});

Route::middleware('admin')->group(function () {
  Route::delete('/admin/delete/tag/{tag}', [AdminController::class, 'deleteTag'])->name('admin.deleteTag');
});

Route::middleware('admin')->group(function () {
  Route::put('/admin/edit/category/{category}', [AdminController::class, 'editCategory'])->name('admin.editCategory');
});

Route::middleware('admin')->group(function () {
  Route::delete('/admin/delete/category/{category}', [AdminController::class, 'deleteCategory'])->name('admin.deleteCategory');
});

Route::middleware('admin')->group(function () {
  Route::post('/admin/category/store', [AdminController::class, 'storeCategory'])->name('admin.storeCategory');
});

Route::middleware('writer')->group(function(){
  Route::get('/writer/dashboard',[WriterController::class, 'dashboard'])->name('writer.dashboard')->middleware('auth');
  Route::get('/article/edit/{article}' , [ArticleController::class, 'edit'])->name('article.edit')->middleware('auth');
});

Route::middleware('writer')->group(function(){
  Route::put('/article/update/{article}',[ArticleController::class,'update'])->name('article.update')->middleware('auth');
});

Route::middleware('writer')->group(function(){
  Route::delete('/article/destroy/{article}',[ArticleController::class,'destroy'])->name('article.destroy')->middleware('auth');
});
