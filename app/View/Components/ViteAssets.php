<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ViteAssets extends Component
{
    public function __construct(public array $assets = [])
    {
    }

    public function render()
    {
        $manifestPath = public_path('build/manifest.json');
        
        if (!file_exists($manifestPath)) {
            return '';
        }
        
        $manifest = json_decode(file_get_contents($manifestPath), true);
        $html = '';
        
        foreach ($this->assets as $asset) {
            if (isset($manifest[$asset]['file'])) {
                $file = $manifest[$asset]['file'];
                if (str_ends_with($file, '.css')) {
                    $html .= '<link rel="stylesheet" href="/build/' . $file . '">' . "\n";
                } elseif (str_ends_with($file, '.js')) {
                    $html .= '<script src="/build/' . $file . '" defer></script>' . "\n";
                }
            }
        }
        
        return $html;
    }
}
