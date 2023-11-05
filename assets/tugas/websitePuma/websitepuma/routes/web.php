        <?php

use App\Http\Controllers\authController;
use App\Http\Controllers\productController;
use App\Http\Controllers\machineController;
use App\Http\Controllers\depanController; 
use App\Http\Controllers\halamanController;
use App\Http\Controllers\itemController;
use App\Http\Controllers\skillController;
use App\Http\Controllers\profileController;
use App\Http\Controllers\pengaturanHalamanController;
use App\Http\Controllers\webcontroller;
use Doctrine\DBAL\Schema\Index;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;

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


Route::get('/', [depanController::class,"index"]);
route::redirect('home','dashboard');
Route::get('/auth', [authController::class,"index"])->name('login');
Route::get('/auth/redirect', [authController::class,"redirect"])->middleware('guest');
Route::get('/auth/callback', [authController::class,"callback"])->middleware('guest');
Route::get('/auth/logout',[authController::class,"logout"]);
// route::get('interests', function () {return view('depan.contact');});
Route::get('/form',[webcontroller::class,'index']);
Route::get('/payment',[webcontroller::class,'payment']);
Route::post('/payment',[webcontroller::class,'payment_post']);


Route::prefix('dashboard')->middleware('auth')->group(
        function () {
            Route::get('/',[halamanController::class,'index']);
            Route::resource('halaman', halamanController::class);
            Route::resource('product',productController::class);
            Route::resource('machine',machineController::class);
            Route::resource('item',itemController::class);
            Route::get('profile',[profileController::class,"index"])->name('profile.index');
            Route::post('profile',[profileController::class,"update"])->name('profile.update');
            Route::get('pengaturanhalaman',[pengaturanHalamanController::class,"index"])->name('pengaturanhalaman.index');
            Route::post('pengaturanhalaman',[pengaturanHalamanController::class,"update"])->name('pengaturanhalaman.update');
            
            // route::get('interests', function () {return view('depan.contact');});
        }
    );
