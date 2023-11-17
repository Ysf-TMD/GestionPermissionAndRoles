<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth',"role:admin"])->name('admin.')->prefix('admin')->group(function (){
    //Route::get("/",[IndexController::class ,"index"])->name("index");
    Route::get("/",function(){return view('admin.index');})->name("index");

    Route::resource('/roles',\App\Http\Controllers\Admin\RoleController::class);
    Route::resource('/permissions',\App\Http\Controllers\Admin\PermissionController::class);

    Route::post("/roles/{role}/permissions",[\App\Http\Controllers\Admin\RoleController::class , "givePermission"])->name("roles.permissions");
    Route::delete("/roles/{role}/permissions/{permission}",[\App\Http\Controllers\Admin\RoleController::class , "revokePermission"])->name("roles.permissions.revoke");


    Route::post('/permissions/{permission}/roles',[\App\Http\Controllers\Admin\PermissionController::class , 'assignRole'])->name("permissions.roles");
    Route::delete('/permissions/{permission}/roles/{role}',[\App\Http\Controllers\Admin\PermissionController::class , 'removeRole'])->name("permissions.roles.remove");



    Route::get("/users",[\App\Http\Controllers\Admin\UserController::class , "index"])->name("users.index");
    Route::delete("/users/{user}",[\App\Http\Controllers\Admin\UserController::class , "destroy"])->name("users.destroy");

    Route::get("/users/{user}",[\App\Http\Controllers\Admin\UserController::class ,"show"])->name('users.show');

    Route::post("/users/{user}/roles",[\App\Http\Controllers\Admin\UserController::class , "assignRole"])->name("users.roles");
    Route::delete("/users/{user}/roles/{role}",[\App\Http\Controllers\Admin\UserController::class , "removeRole"])->name("users.roles.remove");

    Route::post("/users/{user}/permissions",[\App\Http\Controllers\Admin\UserController::class , "givePermission"])->name("users.permissions");
    Route::delete("/users/{user}/permissions/{permission}",[\App\Http\Controllers\Admin\UserController::class , "revokePermission"])->name("users.permissions.revoke");



});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
