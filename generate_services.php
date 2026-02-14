<?php

$services = include 'config/services.php';
$template = file_get_contents('resources/views/pages/services/show.blade.php');

if (!is_dir('resources/views/services')) {
    mkdir('resources/views/services', 0755, true);
}

foreach ($services as $slug => $data) {
    if ($slug === '{{-- KEYWORDS_PLACEHOLDER_START --}}') continue;
    if ($slug === 'buy-used-furniture') continue; // Skip as this file is manually customized
    
    $serviceData = var_export($data, true);
    
    // Insert the data variable definition after @extends
    $newContent = str_replace(
        "@extends('layouts.app')",
        "@extends('layouts.app')\n\n@php\n\$service = {$serviceData};\n\$serviceSlug = '{$slug}';\n\$relatedServices = collect([]);\n\$business = config('business');\n\$seo = ['title' => \$service['meta']['title'] ?? \$service['name'], 'description' => \$service['meta']['description'] ?? \$service['excerpt'], 'canonical' => url()->current()];\n@endphp",
        $template
    );
    
    file_put_contents("resources/views/services/{$slug}.blade.php", $newContent);
    echo "Created resources/views/services/{$slug}.blade.php\n";
}
