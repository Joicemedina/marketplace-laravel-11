<?php

use App\Http\Controllers\Backend\AdminContoller;
use App\Http\Controllers\Backend\AdminController;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//Chamando Rotas da Cataloshop organizadas
foreach(File::allFiles(__DIR__ .'/web') as $route_file){
 require $route_file->getPathname();
}

require __DIR__.'/auth.php';

//Rota admin login
Route::get('admin/login', [AdminController::class, 'login'])->name('admin.login');

//Rota admin recuperação de senha
Route::get('admin/forgot-password', [AdminController::class, 'forgot'])->name('admin.forgot');
