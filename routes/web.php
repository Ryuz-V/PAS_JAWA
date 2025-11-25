<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\InvitationController;
use App\Http\Controllers\Admin\ProdukController;
use App\Http\Controllers\Admin\AksesorisController;


Route::get('/', function () {
    return view('index');
});

Route::prefix('admin')->name('admin.')->group(function () {

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');

    // Invitation (tamu RSVP)
    Route::resource('invitation', InvitationController::class);

    // Produk (makanan & aksesoris)
    Route::resource('produk', ProdukController::class);

    // Aksesoris (jika ingin dipisah dari produk)
    Route::resource('aksesoris', AksesorisController::class);

});