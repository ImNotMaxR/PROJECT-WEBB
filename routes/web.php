<?php  
  
use App\Http\Controllers\ProfileController;  
use App\Http\Controllers\MenuController;
use App\Http\Controllers\LandingController;  
use App\Http\Controllers\BukuController;  
use App\Http\Controllers\UserController;
use App\Http\Controllers\KategoriController;  
use App\Http\Controllers\PinjamController;  
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\KatalogController;
use App\Http\Controllers\PerpanjanganController;
use Illuminate\Support\Facades\Route;  

  
// Public routes (akses untuk semua pengguna, termasuk non-user)  
Route::prefix('/')->group(function () {
Route::get('/', [LandingController::class, 'index'])->name('home');  
Route::get('home', [LandingController::class, 'index'])->name('home');  
Route::get('/bukus', [KatalogController::class, 'index'])->name('bukus.index'); 
// routes/web.php
Route::post('/search-bukus', [KatalogController::class, 'search'])->name('bukus.search');
});

Route::prefix('menu')->group(function () {
Route::get('contact-us', [MenuController::class, 'contactUs'])->name('menu.contactus');  
Route::get('faq', [MenuController::class, 'faq'])->name('menu.faq');  
Route::get('help-center', [MenuController::class, 'helpCenter'])->name('menu.help-center');  
});

// Authenticated User Routes (akses untuk user yang login)  
Route::middleware(['auth'])->group(function () {  

    // Tampilin Buku Khusus User Di HOME
    Route::post('/user/update-profile', [ProfileController::class, 'updateProfile'])->name('user.update-profile');
    Route::get('/bukus/{id}', [BukuController::class, 'show'])->name('bukus.show'); 

    // BUAT PINJAM BUKU

    Route::get('/pinjam/{id}', [BukuController::class, 'pinjam'])->name('pinjam.buku');



    // Buat Peminjaman
    Route::get('/peminjaman', [PinjamController::class, 'userPeminjaman'])->name('pinjam.peminjaman');

    // BUAT PERPANJANGAN
    Route::post('/perpanjangan/store', [PerpanjanganController::class, 'store'])->name('perpanjangan.store');


    // Profile routes  
    Route::prefix('profile')->group(function () {
    Route::get('/index', [ProfileController::class, 'index'])->name('profile.index');  
    Route::get('/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/update', [ProfileController::class, 'update'])->name('profile.update'); 
    Route::patch('/account', [ProfileController::class, 'updateAccountSettings'])->name('profile.update.account'); 
    Route::delete('/destroy', [ProfileController::class, 'destroy'])->name('profile.destroy');  
});
});  



  
// Admin Routes (akses untuk admin saja)  
Route::middleware(['CheckUserRole:admin'])->prefix('admin')->group(function () {  
    Route::get('/dashboard', [AdminDashboardController::class, 'Dashboard'])->name('admin.dashboard');   
  

  
    // Buku management routes for admin  
    Route::prefix('buku')->group(function () {
    Route::get('/', [BukuController::class, 'index'])->name('buku.index');  
    Route::post('/', [BukuController::class, 'store'])->name('buku.store');  
    Route::get('/create', [BukuController::class, 'create'])->name('buku.create');  
    Route::get('/edit/{id}', [BukuController::class, 'edit'])->name('buku.edit');  
    Route::put('/update/{id}', [BukuController::class, 'update'])->name('buku.update');  
    Route::get('/destroy/{id}', [BukuController::class, 'destroy'])->name('buku.destroy');  
    Route::get('/datatables', [BukuController::class, 'datatables'])->name('buku.datatables');  

    //konfirmasi peminjaman
    Route::get('/peminjaman', [BukuController::class, 'pinjam_request'])->name('request.pinjam');  
  
    // Route for updating the status of a peminjaman  
    Route::post('/peminjaman/update-status', [BukuController::class, 'updateStatus'])->name('peminjaman.updateStatus');  
      
    // Route for deleting a peminjaman  
    Route::delete('/peminjaman/{id}', [BukuController::class, 'destroyPeminjaman'])->name('peminjaman.destroy');  

    Route::get('/perpanjangan', [PerpanjanganController::class, 'index'])->name('perpanjangan.index');  
    Route::post('/perpanjangan/setujui/{id}', [PerpanjanganController::class, 'setujui'])->name('perpanjangan.setujui');
    Route::post('perpanjangan/tolak/{id}', [PerpanjanganController::class, 'tolak'])->name('perpanjangan.tolak');
    Route::delete('perpanjangan/hapus/{id}', [PerpanjanganController::class, 'hapus'])->name('perpanjangan.destroy');


});
  
    // Kategori management routes for admin  
    Route::prefix('kategori')->group(function () {
        Route::get('/', [KategoriController::class, 'index'])->name('kategori.index');
        Route::post('/', [KategoriController::class, 'store'])->name('kategori.store');
        Route::get('/kategori/create', [KategoriController::class, 'create'])->name('kategori.create');
        Route::get('/kategori/edit/{id}', [KategoriController::class, 'edit'])->name('kategori.edit');
        Route::put('/kategori/{id}', [KategoriController::class, 'update'])->name('kategori.update');
        Route::get('/kategori/destroy/{id}', [KategoriController::class, 'destroy'])->name('kategori.destroy');
        Route::get('/kategori/datatables', [KategoriController::class, 'datatables'])->name('kategori.datatables');  
    });

    Route::prefix('member')->group(function () {  
        Route::get('/', [UserController::class, 'index'])->name('member.index');  
        Route::get('/edit/{id}', [UserController::class, 'edit'])->name('member.edit');   
        Route::get('/create', [UserController::class, 'create'])->name('member.create'); 
        Route::put('/update/{id}', [UserController::class, 'update'])->name('member.update');    
        Route::get('/destroy/{id}', [UserController::class, 'destroy'])->name('member.destroy');    
    });  

}); 



  
require __DIR__ . '/auth.php';  
