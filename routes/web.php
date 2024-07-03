    <?php

    use App\Http\Controllers\ProfileController;
    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\HomeController;
    use App\Http\Controllers\SupplierController;
    use App\Http\Controllers\DashboardController;

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware(['auth', 'verified'])->name('dashboard');

    Route::middleware('auth')->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });

    Route::get('/', function () {
        return view('welcome');
    });
    Route::get('/suppliers', [SupplierController::class, 'index'])->name('suppliers.index');
    // routes/web.php
    Route::get('/suppliers/{id}/products', [SupplierController::class, 'showProducts'])->name('suppliers.showProducts');
    Route::get('/suppliers/{leverancierId}/products/{productId}/edit', [SupplierController::class, 'edit'])->name('suppliers.edit');
    Route::patch('/suppliers/{leverancierId}/products/{productId}', [SupplierController::class, 'updateProduct'])->name('suppliers.updateProduct');


    require __DIR__ . '/auth.php';
