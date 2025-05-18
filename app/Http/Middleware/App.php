<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class App
{
    public function handle(Request $request, Closure $next)
    {
        $systemKey = env('apps', null);
        if (!$systemKey) {
            abort(403, 'Konfigurasi sistem tidak ditemukan. Hubungi pengembang.');
        }
        $configPath = storage_path('app.key');
        if (!file_exists($configPath)) {
            abort(403, 'File konfigurasi tidak ditemukan. Hubungi pengembang.');
        }
        $licenseKey = file_get_contents($configPath);
        if ($licenseKey !== $systemKey) {
            abort(403, 'Jangan Ngeclone Bang, Kalo Mau Ngeclone Tunggu PBL Selesai Ya --- Pengembang');
        }
        return $next($request);
    }
}
