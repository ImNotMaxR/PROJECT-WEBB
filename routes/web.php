<?php  
  
use App\Http\Controllers\ProfileController;  
use App\Http\Controllers\AdminController;  
use App\Http\Controllers\LandingController;  
use App\Http\Controllers\BukuController;  
use App\Http\Controllers\UserController;
use App\Http\Controllers\KategoriController;  
use App\Http\Controllers\PinjamController;  
use App\Http\Controllers\AdminDashboardController;  
use Illuminate\Support\Facades\Route;  

  
// Public routes (akses untuk semua pengguna, termasuk non-user)  
Route::prefix('/')->group(function () {
Route::get('/', [BukuController::class, 'index'])->name('home');  
Route::get('home', [BukuController::class, 'index'])->name('home');  
Route::get('/bukus', [BukuController::class, 'index'])->name('bukus.index'); 
Route::get('/menu/contact-us', [LandingController::class, 'contactUs'])->name('contact.us');  
Route::get('/menu/faq', [LandingController::class, 'faq'])->name('faq');  
Route::get('/menu/help-center', [LandingController::class, 'helpCenter'])->name('help.center');  
  
});

// Authenticated User Routes (akses untuk user yang login)  
Route::middleware(['auth'])->group(function () {  

    // Tampilin Buku Khusus User Di HOME
    Route::get('/bukus/{id}', [BukuController::class, 'show'])->name('bukus.show'); 

    // BUAT PINJAM BUKU

    Route::get('/pinjam/{id}', [BukuController::class, 'pinjam'])->name('pinjam.buku');



    // Buat Peminjaman
    Route::get('/peminjaman', [PinjamController::class, 'userPeminjaman'])->name('pinjam.peminjaman');

    // Profile routes  
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');  
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');  
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');  
});  



  
// Admin Routes (akses untuk admin saja)  
Route::middleware(['CheckUserRole:admin'])->prefix('admin')->group(function () {  
    Route::get('/dashboard', [AdminDashboardController::class, 'Dashboard'])->name('admin.dashboard');   
  

    // Profile routes  
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');  
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');  
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');  


  
    // Buku management routes for admin  
    Route::prefix('buku')->group(function () {
    Route::get('/', [BukuController::class, 'crud'])->name('buku.index');  
    Route::post('/', [BukuController::class, 'store'])->name('buku.store');  
    Route::get('/create', [BukuController::class, 'create'])->name('buku.create');  
    Route::get('/edit/{id}', [BukuController::class, 'edit'])->name('buku.edit');  
    Route::put('/update/{id}', [BukuController::class, 'update'])->name('buku.update');  
    Route::delete('/destroy/{id}', [BukuController::class, 'destroy'])->name('buku.destroy');  
    Route::get('/datatables', [BukuController::class, 'datatables'])->name('buku.datatables');  

    //konfirmasi peminjaman
    Route::get('/peminjaman', [BukuController::class, 'pinjam_request'])->name('request.pinjam');  
  
    // Route for updating the status of a peminjaman  
    Route::post('/peminjaman/update-status', [BukuController::class, 'updateStatus'])->name('peminjaman.updateStatus');  
      
    // Route for deleting a peminjaman  
    Route::delete('/peminjaman/{id}', [BukuController::class, 'destroyPeminjaman'])->name('peminjaman.destroy');  

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
        Route::delete('/destroy/{id}', [UserController::class, 'destroy'])->name('member.destroy');    
    });  

}); 



  
require __DIR__ . '/auth.php';  
