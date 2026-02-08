<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class StaticImagesToWebp extends Command
{
    protected $signature = 'images:static-webp 
        {--disk=public} 
        {--dir=images} 
        {--quality=80}';

    protected $description = 'Convert static jpg/png images to webp';

    public function handle()
    {
        $disk = $this->option('disk');
        $dir = trim($this->option('dir'), '/');
        $quality = (int) $this->option('quality');

        $manager = new \Intervention\Image\ImageManager(new \Intervention\Image\Drivers\Gd\Driver);

        $files = Storage::disk($disk)->allFiles($dir);

        $this->info('Scanning images...');

        foreach ($files as $file) {
            $ext = strtolower(pathinfo($file, PATHINFO_EXTENSION));
            if (! in_array($ext, ['jpg', 'jpeg', 'png'])) {
                continue;
            }

            $content = Storage::disk($disk)->get($file);

            $image = $manager->read($content)->scaleDown(width: 1600);

            $webp = preg_replace('/\.(jpe?g|png)$/i', '.webp', $file);
            Storage::disk($disk)->put($webp, (string) $image->toWebp($quality));

            $this->line("✔ {$file} → {$webp}");
        }

        $this->info('🎉 Done.');
    }
}
