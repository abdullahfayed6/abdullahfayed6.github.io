<?php

/**
 * SnapFolio Static Site Exporter
 * This script crawls the local development server and exports the pages as static HTML
 * so that they can be hosted 100% free on GitHub Pages / Vercel with your custom domain.
 */

$localUrl = 'http://127.0.0.1:8000';
$outputDir = __DIR__;

echo "=== SnapFolio Static Exporter ===\n";

// 1. Check if the local server is running
$headers = @get_headers($localUrl);
if (!$headers) {
    echo "ERROR: Local server is not running at {$localUrl}.\n";
    echo "Please run 'php artisan serve' first in another terminal.\n";
    exit(1);
}

echo "Local server detected. Starting export...\n\n";

// Helper function to fetch and clean HTML
function fetchAndClean($url, $localUrl) {
    echo "Fetching: {$url} ... ";
    $html = file_get_contents($url);
    if ($html === false) {
        echo "FAILED!\n";
        return false;
    }
    
    // Replace local server URL with absolute path from root
    $html = str_replace($localUrl . '/projects/', '/projects/', $html);
    $html = str_replace($localUrl . '/service-details', '/service-details.html', $html);
    $html = str_replace($localUrl . '/starter-page', '/starter-page.html', $html);
    
    // Rewrite asset paths to the public directory
    $html = str_replace($localUrl . '/assets/', '/public/assets/', $html);
    $html = str_replace('="/assets/', '="/public/assets/', $html);
    $html = str_replace('=\'/assets/', '=\'/public/assets/', $html);
    
    // Rewrite upload paths to the public directory
    $html = str_replace($localUrl . '/uploads/', '/public/uploads/', $html);
    $html = str_replace('="/uploads/', '="/public/uploads/', $html);
    $html = str_replace('=\'/uploads/', '=\'/public/uploads/', $html);
    
    $html = str_replace($localUrl . '/', '/', $html);
    $html = str_replace($localUrl, '', $html); // catch any trailing references
    
    echo "Done.\n";
    return $html;
}

// 2. Export Homepage (/) -> index.html
$homepageHtml = fetchAndClean($localUrl . '/', $localUrl);
if ($homepageHtml) {
    file_put_contents($outputDir . '/index.html', $homepageHtml);
    echo "Saved: index.html\n";
}

// 3. Export Service Details (/service-details) -> service-details.html
$serviceDetailsHtml = fetchAndClean($localUrl . '/service-details', $localUrl);
if ($serviceDetailsHtml) {
    file_put_contents($outputDir . '/service-details.html', $serviceDetailsHtml);
    echo "Saved: service-details.html\n";
}

// 4. Export Starter Page (/starter-page) -> starter-page.html
$starterPageHtml = fetchAndClean($localUrl . '/starter-page', $localUrl);
if ($starterPageHtml) {
    file_put_contents($outputDir . '/starter-page.html', $starterPageHtml);
    echo "Saved: starter-page.html\n";
}

// 5. Export Projects (/projects/{id}) -> projects/{id}/index.html
// Bootstrap Laravel to query the database and get project IDs
require_once $outputDir . '/vendor/autoload.php';
$app = require_once $outputDir . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$projectIds = \App\Models\Project::pluck('id')->all();
echo "\nFound " . count($projectIds) . " projects in database.\n";

foreach ($projectIds as $id) {
    $projectHtml = fetchAndClean($localUrl . '/projects/' . $id, $localUrl);
    if ($projectHtml) {
        $projectDir = $outputDir . '/projects/' . $id;
        if (!is_dir($projectDir)) {
            mkdir($projectDir, 0755, true);
        }
        file_put_contents($projectDir . '/index.html', $projectHtml);
        echo "Saved: projects/{$id}/index.html\n";
    }
}

echo "\n=== Export Complete! ===\n";
echo "You can now commit and push to GitHub, and your custom domain (abdullahfayed.me) will show the updated pages!\n";
