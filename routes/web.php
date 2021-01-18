<?php

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

//Enabling DEBUGBAR in Production Only for developers
if(in_array(Request::ip(), ['86.92.52.147'])) {
    config(['app.debug' => true]);
}


Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/', [App\Http\Livewire\Dashboard::class, 'index'])->name('dashboard');

    Route::get('/instances', [App\Http\Livewire\Instances::class, 'render'])->name('instances');
    Route::get('/instances/import', [App\Http\Livewire\Instances::class, 'import'])->name('instances.import');
    Route::get('/instances/refreshcache', [App\Http\Livewire\Instances::class, 'refreshcache'])->name('instances.refreshcache');
    Route::get('/instances/redirector', [App\Http\Livewire\Instances::class, 'redirector'])->name('instances.redirect');
    Route::get('/instances/{vmid}/boot', [App\Http\Livewire\Instances::class, 'boot'])->name('instances.boot');
    Route::get('/instances/{vmid}/shutdown', [App\Http\Livewire\Instances::class, 'shutdown'])->name('instances.shutdown');
    Route::get('/instances/{vmid}/revert', [App\Http\Livewire\Instances::class, 'revert'])->name('instances.revert');

    Route::get('/submitflag', [App\Http\Livewire\FlagController::class, 'render'])->name('submitflag');
    Route::post('/submitflag', [App\Http\Livewire\FlagController::class, 'store']);

    Route::get('/vpn', [App\Http\Livewire\VPNController::class, 'index'])->name('vpn');
    Route::get('/log', [App\Http\Livewire\Log::class, 'index'])->name('log');
    Route::get('/leaderboard', [App\Http\Livewire\Leaderboard::class, 'render'])->name('leaderboard');

    // Sollutions routes..
    Route::get('/sollutions', [App\Http\Livewire\SollutionController::class, 'render'])->name('sollutions.index');
    Route::get('/sollutions/{title}', [App\Http\Livewire\SollutionController::class, 'show'])->name('sollutions.show');

//    Route::post('/sollutions', [App\Http\Livewire\SollutionController::class], 'store');
//    Route::put('/sollutions/{title}', [App\Http\Livewire\SollutionController::class], 'update')->where('title', '.*');
//    Route::delete('/sollutions/{title}', [App\Http\Livewire\SollutionController::class], 'destroy')->where('title', '.*');

// Admin routes..
    Route::resource('/admin/signups', App\Http\Livewire\SignupController::class);
    Route::get('/admin/signupprocess/{id}', [App\Http\Livewire\SignupController::class, 'edit'])->name('admin.signupprocess');
    Route::post('/admin/signupprocess/{id}', [App\Http\Livewire\SignupController::class, 'update'])->name('admin.signupprocess.update');
});

Route::get('/scores', [App\Http\Livewire\Leaderboard::class, 'publicrender'])->name('publicleaderboard');
Route::get('/signup', [App\Http\Livewire\SignupController::class, 'create'])->name('signup');
Route::post('/signup', [App\Http\Livewire\SignupController::class, 'store'])->name('signup.store');
#Route::get('/signup/{input}', [App\Http\Livewire\Signup::class, 'update'])->name('signup.verify');
