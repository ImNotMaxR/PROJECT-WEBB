<?php  
  
use App\Http\Controllers\ProfileController;  
use App\Http\Controllers\MenuController;
use App\Http\Controllers\LandingController;  
use App\Http\Controllers\BukuController;  
use App\Http\Controllers\MemberController;
use App\Http\Controllers\KategoriController;  
use App\Http\Controllers\PeminjamanController;
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

// ONBOARDING USER (BAGI YANG BARU REGISTER)
    Route::post('/user/update-profile', [ProfileController::class, 'updateProfile'])->name('user.update-profile');
    //Lihat BUKU
    Route::get('/bukus/{id}', [BukuController::class, 'show'])->name('bukus.show'); 

    // BUAT PINJAM BUKU
    Route::get('/pinjam/{id}', [BukuController::class, 'pinjam'])->name('pinjam.buku');

    // Buat check Peminjaman
    Route::get('/peminjaman', [PeminjamanController::class, 'userPeminjaman'])->name('pinjam.peminjaman');

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



  
// Admin Routes (akses untuk superadmin dan admin)  
Route::middleware(['CheckUserRole:admin,superadmin'])->prefix('admin')->group(function () {  
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
    Route::get('/peminjaman', [PeminjamanController::class, 'index'])->name('peminjaman.index');  

    // UPDATE STATUS PEMINJAMAN  
    Route::post('/peminjaman/update-status', [PeminjamanController::class, 'updateStatus'])->name('peminjaman.updateStatus');  

    // Route for deleting a peminjaman  
    Route::delete('/peminjaman/{id}', [PeminjamanController::class, 'destroyPeminjaman'])->name('peminjaman.destroy');  

    //PERPANJANGAN PEMINJAMAN
    Route::get('/perpanjangan', [PerpanjanganController::class, 'index'])->name('perpanjangan.index');  
    Route::post('/perpanjangan/setujui/{id}', [PerpanjanganController::class, 'setujui'])->name('perpanjangan.setujui');
    Route::post('perpanjangan/tolak/{id}', [PerpanjanganController::class, 'tolak'])->name('perpanjangan.tolak');
    Route::delete('perpanjangan/hapus/{id}', [PerpanjanganController::class, 'hapus'])->name('perpanjangan.destroy');
});
  
    // Kategori management routes for admin  
    Route::prefix('kategori')->group(function () {
        Route::get('/', [KategoriController::class, 'index'])->name('kategori.index');
        Route::post('/', [KategoriController::class, 'store'])->name('kategori.store');
        Route::get('/create', [KategoriController::class, 'create'])->name('kategori.create');
        Route::get('/edit/{id}', [KategoriController::class, 'edit'])->name('kategori.edit');
        Route::put('/{id}', [KategoriController::class, 'update'])->name('kategori.update');
        Route::get('/destroy/{id}', [KategoriController::class, 'destroy'])->name('kategori.destroy');
        Route::get('/datatables', [KategoriController::class, 'datatables'])->name('kategori.datatables');  
    });

    //Kelola Member (Users)
    Route::prefix('member')->group(function () {  
        Route::get('/', [MemberController::class, 'index'])->name('member.index');  
        Route::get('/edit/{user}', [MemberController::class, 'edit'])->name('member.edit');
        Route::post('/member', [MemberController::class, 'store'])->name('member.store');
        Route::put('/update/{user}', [MemberController::class, 'update'])->name('member.update');
        Route::get('/destroy/{id}', [MemberController::class, 'destroy'])->name('member.destroy'); 
        
    });  
}); 

Route::middleware(['CheckUserRole:superadmin'])->prefix('admin')->group(function () {  

        //Kelola Member (Admin)
        Route::prefix('admin')->group(function () {  

        });  
});


  
require __DIR__ . '/auth.php';  
