<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Spatie\Image\Image;
use Spatie\Image\Enums\CropPosition; // <-- AGGIUNTO: Importazione corretta per Spatie v3

class ResizeImage implements ShouldQueue
{
    use Queueable;

    private $w, $h, $fileName, $path;

    public function __construct($filePath, $w, $h)
    {
        $this->path = dirname($filePath);
        $this->fileName = basename($filePath);
        $this->w = $w;
        $this->h = $h;
    }

    public function handle(): void
{
    $w = $this->w;
    $h = $this->h;
    
    $srcPath = storage_path('app/public/' . $this->path . '/' . $this->fileName);
    $destPath = storage_path('app/public/' . $this->path . '/' . "crop_{$w}x{$h}_" . $this->fileName);

    \Spatie\Image\Image::load($srcPath)
        ->crop($w, $h, \Spatie\Image\Enums\CropPosition::Center)
        ->save($destPath);
}
}