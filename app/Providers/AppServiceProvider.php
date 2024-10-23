<?php

namespace App\Providers;

use App\Models\DeskripsiWebsite;
use App\Models\Setting;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

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
        // deskripsi website
        View::composer('*', function ($view) {
            // Ambil data title dari database
            $websiteData = DeskripsiWebsite::first(); // Mengambil record pertama, sesuaikan query jika perlu
    
            // Passing data title, atau gunakan 'Default Title' jika kosong
            $view->with('websiteTitle', $websiteData->title ?? 'Default Title');
            $view->with('websiteUrl', $websiteData->url ?? 'Default Url');
            $view->with('websiteDeskripsi', $websiteData->deskripsi ?? 'Default deskripsi');
            $view->with('websiteKeyword', $websiteData->keyword ?? 'Default keyword');
            $view->with('websiteLogo', $websiteData->logo ?? 'Default logo');

            $appUrl = $websiteData ? $websiteData->url : config('app.url');
            
            // Menyediakan URL untuk semua views
            $view->with('appUrl', $appUrl);
        });

        // Pass setting data to all views
    View::composer('*', function ($view) {
        // Ambil data dari tabel settings
        $settings = Setting::whereIn('name', ['logo', 'footer', 'tanggal_event'])->get();

        // Buat array untuk menampung data
        $settingData = [];
        
        // Loop melalui settings dan simpan ke dalam array berdasarkan nama
        foreach ($settings as $setting) {
            $settingData[$setting->name] = $setting->value;
        }

        // Pass data ke view
        $view->with('settings', $settingData);

        // penggunaan = <p>Event Date: {{ $settings['tanggal_event'] ?? 'Default Date' }}</p>

    });

    }
}
