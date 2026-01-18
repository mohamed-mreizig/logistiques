<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PdfViewController extends Controller
{
    public function viewPdf($url)
    {
        $decodedUrl = urldecode($url);
        
        // Get file extension from URL
        $extension = pathinfo(parse_url($decodedUrl, PHP_URL_PATH), PATHINFO_EXTENSION);
        
        // For non-PDF files, show in an iframe with Google Docs Viewer
        if ($extension !== 'pdf') {
            return view('homelayout.document.viewer', [
                'url' => 'https://docs.google.com/viewer?url=' . urlencode($decodedUrl) . '&embedded=true'
            ]);
        }
        
        // For PDFs, fetch and display directly
        $response = Http::get($decodedUrl);
        
        return response($response->body(), 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="document.pdf"',
        ]);
    }
}