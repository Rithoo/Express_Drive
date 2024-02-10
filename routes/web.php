<?php

use App\Livewire\CarsComponent;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StateController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PaymentMethodController;

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

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('dashboards', 'admin.dashboards')
    ->name('dashboards');
// ->middleware(['auth', 'verified'])

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__ . '/auth.php';

// Route::middleware(['auth'])->group(function () {
// });

// Route for all files in folders countries 
Route::resource('countries', CountryController::class);

Route::resource('states', StateController::class);

Route::resource('cities', CityController::class);

Route::resource('cars', CarController::class);

Route::resource('addresses', AddressController::class);

Route::resource('payment_methods', PaymentMethodController::class);

Route::resource('payments', PaymentController::class);

Route::resource('sales', SaleController::class);

Route::resource('/users', UserController::class);

// livewire
Route::get('cars', CarsComponent::class);

// Route::patch('/update/{id}', ['as' => 'users.update', 'uses' => 'UserController@update']);
// Route::put('/users/{id}', 'UserController@update')->name('users.update');


// Route::get('/users/{id}/edit', 'UserController@edit'); // Show edit form
// Route::put('/users/{id}', 'UserController@update'); // Update data

// Route::controller(UserController::class)->group(function () {
//     Route::put('/users/{id}', 'users.update' );
//     // Route::post('/users', 'store');
// });




// Route::get('/pricing', function () {
//     return view('pages.main.pricing');
// });

// Route::get('/cars', function () {
//     return view('pages.main.cars');
// });

// Route::get('/login', function () {
//     return view('pages.main.login');
// });

// Route::get('/l ogout', function () {
//     return view('pages.main.logout');
// });

// Route::get('/buy', function () {
//     return view('pages.main.buy');
// });

// Route::get('/sale', function () {
//     return view('pages.main.sale');
// });

// Route::get('/detail', function () {
//     return view('pages.main.detail');
// });



// Route::prefix('admin')->group(function () {

//     // Route::get('/dashboards', function () {
//     //     return view('pages.admin.dashboards');
//     // }); 

//     Route::get('/users', function () {
//         return view('pages.admin.users');
//     });

//     Route::get('/admins', function () {
//         return view('pages.admin.admins');
//     });

//     Route::get('/sales', function () {
//         return view('pages.admin.sales');
//     });

//     Route::get('/cars', function () {
//         return view('pages.admin.cars');
//     });

//     Route::get('/payments', function () {
//         return view('pages.admin.payments');
//     });

//     Route::get('/invoice', function () {
//         return view('pages.admin.invoice');
//     });
    
// });
