<?php
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

if (!function_exists('s3Asset')) {
    function s3Asset($filePath, $expiration = 10)
    {
        // Check if filePath is null or empty
        if (empty($filePath)) {
            return asset(''); // Return default asset URL or empty string
        }

        // Use local/public disk instead of S3
        $disk = Storage::disk('public');

        if (Storage::disk('public')->exists($filePath)) {
            Log::info('v public');
            // For local storage, return the direct asset URL
            return asset('storage/' . $filePath);
        } else {
            // Fallback to checking other disks if needed
            // For local storage, we typically only use 'public' disk
            // You can add additional disk checks here if necessary
            
            // If file doesn't exist in public storage, return default asset
            return asset($filePath);
        }
    }
}