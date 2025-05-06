<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class App
{
    public function handle(Request $request, Closure $next)
    {
        $licensePath = storage_path('app.key');
        if (!file_exists($licensePath)) {
            abort(403, 'Aplikasi tidak dapat dijalankan tanpa lisensi yang valid. 
            Hubungi pengembang untuk mendapatkan lisensi.');
        }
        return $next($request);
    }
}
