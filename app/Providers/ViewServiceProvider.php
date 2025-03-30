<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use App\Models\Peminjaman;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        // View Composer untuk total peminjaman & breadcrumb
        View::composer('*', function ($view) {
            // 1. Hitung Total Peminjaman Berdasarkan User
            $userId = Auth::id();
            $totalPeminjaman = $userId ? Peminjaman::where('user_id', $userId)->count() : 0;

            // 2. Buat Breadcrumb Otomatis Berdasarkan Nama Route
            $routeName = request()->route() ? request()->route()->getName() : null;

            // Daftar Breadcrumb Otomatis
$breadcrumbList = [
    'admin.dashboard' => ['link'=> route('admin.dashboard'),'main' => 'Dashboard', 'sub' => 'Home', 'sub1' => 'Overview'],

    'kategori.index' => ['link'=> route('admin.dashboard'), 'main' => 'Kategori', 'sub' => 'Dashboard', 'sub1' => 'Kategori Home'],
    'kategori.create' => ['link'=> route('admin.dashboard'), 'main' => 'Kategori', 'sub' => 'Dashboard', 'sub1' => 'Tambah Kategori'],
    'kategori.edit' => ['link'=> route('admin.dashboard'), 'main' => 'Kategori', 'sub' => 'Dashboard', 'sub1' => 'Edit Kategori'],


    'produk.index' => ['link'=> route('admin.dashboard'), 'main' => 'Produk', 'sub' => 'Dashboard', 'sub1' => 'Produk Home'],


    'peminjaman.index' => ['link'=> route('admin.dashboard'), 'main' => 'Peminjaman', 'sub' => 'Dashboard', 'sub1' => 'Daftar Peminjaman'],
    'pinjam.peminjaman' => ['link'=> route('home'), 'main' => 'Peminjaman', 'sub' => 'Home', 'sub1' => 'Daftar Peminjaman'],
    'request.pinjam' => ['link'=> route('admin.dashboard'), 'main' => 'Peminjaman', 'sub' => 'Dashboard', 'sub1' => 'Konfirmasi Peminjaman'],
    'peminjaman.destroy' => ['link'=> route('admin.dashboard'), 'main' => 'Peminjaman', 'sub' => 'Dashboard', 'sub1' => 'Hapus Peminjaman'],
    'perpanjangan.index' => ['link'=> route('admin.dashboard'), 'main' => 'Perpanjangan', 'sub' => 'Dashboard', 'sub1' => 'Daftar Perpanjangan'],


    'buku.index' => ['link'=> route('admin.dashboard'), 'main' => 'Buku', 'sub' => 'Dashboard', 'sub1' => 'Daftar Buku'],
    'buku.create' => ['link'=> route('admin.dashboard'), 'main' => 'Buku', 'sub' => 'Dashboard', 'sub1' => 'Tambah Buku'],
    'buku.edit' => ['link'=> route('admin.dashboard'), 'main' => 'Buku', 'sub' => 'Dashboard', 'sub1' => 'Edit Buku'],
    'buku.destroy' => ['link'=> route('admin.dashboard'), 'main' => 'Buku', 'sub' => 'Dashboard', 'sub1' => 'Hapus Buku'],
    'bukus.show' => ['link'=> route('home'), 'main' => 'Buku', 'sub' => 'Home', 'sub1' => 'Detail Buku'],
    'bukus.index'=> ['link'=> route('home'), 'main' => 'Katalog Buku', 'sub' => 'Home', 'sub1' => 'Katalog Buku'],


    'member.index' => ['link'=> route('admin.dashboard'), 'main' => 'Member', 'sub' => 'Dashboard', 'sub1' => 'Daftar Member'],
    'member.create' => ['link'=> route('admin.dashboard'), 'main' => 'Member', 'sub' => 'Dashboard', 'sub1' => 'Tambah Member'],
    'member.edit' => ['link'=> route('admin.dashboard'), 'main' => 'Member', 'sub' => 'Dashboard', 'sub1' => 'Edit Member'],
    'member.destroy' => ['link'=> route('admin.dashboard'), 'main' => 'Member', 'sub' => 'Dashboard', 'sub1' => 'Hapus Member'],

    'profile.index' => ['link'=> route('profile.edit'), 'main' => 'Profil', 'sub' => 'Pengaturan', 'sub1' => 'Overview'],
    'profile.edit' => ['link'=> route('profile.edit'), 'main' => 'Profil', 'sub' => 'Pengaturan', 'sub1' => 'Edit Profil'],
    'profile.update' => ['link'=> route('profile.edit'), 'main' => 'Profil', 'sub' => 'Pengaturan', 'sub1' => 'Update Profil'],
    'profile.destroy' => ['link'=> route('profile.edit'), 'main' => 'Profil', 'sub' => 'Pengaturan', 'sub1' => 'Hapus Profil'],


    'menu.contactus' => ['link'=> route('menu.contactus'), 'main' => 'Menu', 'sub' => 'Informasi', 'sub1' => 'Kontak Kami'],
    'menu.faq' => ['link'=> route('menu.faq'), 'main' => 'Menu', 'sub' => 'Informasi', 'sub1' => 'FAQ'],
    'menu.help-center' => ['link'=> route('menu.help-center'), 'main' => 'Menu', 'sub' => 'Informasi', 'sub1' => 'Pusat Bantuan'],
];


            // Jika Route Tidak Ada, Default ke Home
            $breadcrumbs = $breadcrumbList[$routeName] ?? null;

            // Kirim Data ke Semua View
            $view->with([
                'totalPeminjaman' => $totalPeminjaman,
                'breadcrumbs' => $breadcrumbs,
            ]);
        });
    }
}
