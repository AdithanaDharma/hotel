<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\DB;
use Doctrine\DBAL\Types\Type;
use Doctrine\DBAL\Platforms\AbstractPlatform;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // KITA BUNGKUS DENGAN TRY-CATCH
        try {
            if (!Type::hasType('enum')) {
                Type::addType('enum', 'Doctrine\DBAL\Types\StringType');
            }

            // Baris di bawah ini yang bikin error saat build karena DB belum connect.
            // Dengan try-catch, jika gagal (saat build), dia akan loncat ke catch dan lanjut (tidak error).
            $platform = DB::connection()->getDoctrineSchemaManager()->getDatabasePlatform();
            $platform->registerDoctrineTypeMapping('enum', 'string');
            
        } catch (\Throwable $e) {
            // Biarkan kosong. 
            // Artinya: Jika error koneksi database, abaikan saja.
            // Ini aman karena saat build kita tidak butuh mapping ini.
            // Saat aplikasi jalan beneran (runtime), koneksi ada, kode di atas akan jalan normal.
        }
    }
}
