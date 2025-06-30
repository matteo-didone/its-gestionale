<?php

if (!function_exists('vite_asset')) {
    function vite_asset($path) {
        $manifestPath = public_path('build/manifest.json');
        
        if (!file_exists($manifestPath)) {
            return $path;
        }
        
        $manifest = json_decode(file_get_contents($manifestPath), true);
        
        if (isset($manifest[$path]['file'])) {
            return '/build/' . $manifest[$path]['file'];
        }
        
        return $path;
    }
}
