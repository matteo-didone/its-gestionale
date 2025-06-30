<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Vite;

class ViteServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Vite::macro('asset', function (string $asset) {
            $manifestPath = public_path('build/manifest.json');
            
            if (!file_exists($manifestPath)) {
                return $asset;
            }
            
            $manifest = json_decode(file_get_contents($manifestPath), true);
            
            if (isset($manifest[$asset]['file'])) {
                return asset('build/' . $manifest[$asset]['file']);
            }
            
            return $asset;
        });
    }
}
