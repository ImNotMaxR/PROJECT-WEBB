<?php  
  
use App\Http\Controllers\ProfileController;  
use App\Http\Controllers\AdminController;  
use App\Http\Controllers\LandingController;  
use App\Http\Controllers\BukuController;  
use App\Http\Controllers\UserController;
use App\Http\Controllers\KategoriController;  
use Illuminate\Support\Facades\Route;  
  
// Public routes (akses untuk semua pengguna, termasuk non-user)  
Route::get('/', [BukuController::class, 'index'])->name('home');  
Route::get('/home', [BukuController::class, 'index'])->name('home');  
Route::get('/bukus', [BukuController::class, 'index'])->name('bukus.index');  
  
// Authenticated User Routes (akses untuk user yang login)  
Route::middleware(['auth'])->group(function () {  

    // Tampilin Buku Khusus User Di HOME
    Route::get('/bukus/{id}', [BukuController::class, 'show'])->name('bukus.show');  


    // Profile routes  
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');  
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');  
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');  
});  
  
// Admin Routes (akses untuk admin saja)  
Route::middleware(['CheckUserRole:admin'])->prefix('admin')->group(function () {  
    Route::get('/dashboard', [BukuController::class, 'Dashboard'])->name('admin.dashboard');  

    // Profile routes  
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');  
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');  
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');  

    // User management routes for admin
    Route::prefix('users')->group(function () {
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/edit/{id}', [UserController::class, 'edit'])->name('users.edit');  
    Route::put('/users/update/{id}', [UserController::class, 'update'])->name('users.update');  
    Route::delete('/users/destroy/{id}', [UserController::class, 'destroy'])->name('users.destroy');  
});

  
    // Buku management routes for admin  
    Route::prefix('buku')->group(function () {
    Route::get('/buku', [BukuController::class, 'crud'])->name('buku.index');  
    Route::get('/buku/create', [BukuController::class, 'create'])->name('buku.create');  
    Route::post('/buku', [BukuController::class, 'store'])->name('buku.store');  
    Route::get('/buku/edit/{id}', [BukuController::class, 'edit'])->name('buku.edit');  
    Route::put('/buku/update/{id}', [BukuController::class, 'update'])->name('buku.update');  
    Route::delete('/buku/destroy/{id}', [BukuController::class, 'destroy'])->name('buku.destroy');  
});
  
    // Kategori management routes for admin  
    Route::prefix('kategori')->group(function () {    
        Route::get('/', [KategoriController::class, 'index'])->name('kategori.index');      
        Route::get('/create', [KategoriController::class, 'create'])->name('kategori.create');      
        Route::post('/', [KategoriController::class, 'store'])->name('kategori.store');        
        Route::put('/update/{id}', [KategoriController::class, 'update'])->name('kategori.update'); // Route untuk update  
        Route::delete('/destroy/{id}', [KategoriController::class, 'destroy'])->name('kategori.destroy');      
        Route::get('/data', [KategoriController::class, 'getKategoris'])->name('kategori.data'); // Route untuk mendapatkan data  
    });
});  
  
require __DIR__ . '/auth.php';  
