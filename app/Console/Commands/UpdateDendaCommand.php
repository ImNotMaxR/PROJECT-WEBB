<?php

namespace App\Console\Commands;

use App\Models\Peminjaman;
use Carbon\Carbon;
use Illuminate\Console\Command;

class UpdateDendaCommand extends Command
{
    protected $signature = 'peminjaman:update-denda';
    protected $description = 'Update status peminjaman menjadi denda jika melewati tanggal kembali';

    public function handle()
    {
        // Ambil semua peminjaman dengan status 'disetujui'
        $peminjaman = Peminjaman::where('status', 'disetujui')->get();
        $today = now()->startOfDay();
        $count = 0;

        foreach ($peminjaman as $pinjam) {
            $tanggalKembali = Carbon::parse($pinjam->tanggal_kembali)->startOfDay();
            
            // Jika sudah melewati tanggal kembali
            if ($today->gt($tanggalKembali)) {
                $pinjam->status = 'denda';
                $pinjam->save();
                $count++;
            }
        }

        $this->info("Berhasil mengupdate $count peminjaman ke status denda.");
    }
}