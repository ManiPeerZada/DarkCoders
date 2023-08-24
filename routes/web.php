<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
/*
|
|
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
    /* return redirect('/404'); */
});
Route::get('/404', function(){
    return view('/404');
});
Auth::routes(); 
Route::group(['middleware' => ['auth']], function () {
    Route::get('/dashboard', [App\Http\Controllers\Back\HomeController::class, 'index' ])->name('dashboard');
    /**
     * Manage Users
     */
    Route::get('/manage-users', [\App\Http\Controllers\Back\UserController::class, 'index'])->name('Manage User');
    Route::post('/add_user',[\App\Http\Controllers\Back\UserController::class, 'create'])->name('Add User');
    Route::post('/update_user',[\App\Http\Controllers\Back\UserController::class, 'update'])->name('Update User');
    Route::post('/update_site_sts/{id}', [\App\Http\Controllers\Back\UserController::class, 'update_sts'])->name('Update Status');
    Route::get('/del_use/{id}',[\App\Http\Controllers\Back\UserController::class, 'destroy'])->name('Del User');
    
    /**
    * Manage User Roles
    */
    Route::get('/manage-role', [\App\Http\Controllers\Back\RoleController::class, 'index'])->name('Manage Role');
    Route::post('/add_role', [\App\Http\Controllers\Back\RoleController::class, 'store'])->name('User Role');
    Route::post('/update_role',[\App\Http\Controllers\Back\RoleController::class, 'update'])->name('Update Role');
    Route::get('/assign-role', [\App\Http\Controllers\Back\UserRoleController::class, 'index'])->name('Assign Role');
    Route::post('/save_assign_role', [\App\Http\Controllers\Back\UserRoleController::class, 'store'])->name('Assign Role');

    /* Manage Pricing */
    Route::get('/manage-pricing', [\App\Http\Controllers\Back\PricingPlanController::class, 'index'])->name('Manage Pricing');
    Route::post('/add_pricing_plan', [\App\Http\Controllers\Back\PricingPlanController::class, 'store'])->name('add_pricing_plan');
    Route::post('/update_pricing',[\App\Http\Controllers\Back\PricingPlanController::class, 'update'])->name('update_pricing');
    Route::delete('/delete_pricing', [\App\Http\Controllers\Back\PricingPlanController::class, 'destroy'])->name('delete_pricing');

});
