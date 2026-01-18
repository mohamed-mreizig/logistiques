<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Doctype;
use App\Models\Document;
use Illuminate\Http\Request;
use Spatie\PdfToImage\Pdf;
use PhpOffice\PhpSpreadsheet\IOFactory;




class DSController extends Controller
{
    //
    public function index(Request $request, $type)
    //
    {

        // dd($type);
        $types = Doctype::findOrFail($type);
        $doc = Document::where('doctype_id', $type)->paginate(8);
        // dd(vars: $doc);
        // return response()->json($doc);  
        return view('homelayout.document.index', ['documents' => $doc, 'types' => $types]);

    }
    public function getThumbnail($id)
    {
        $document = Document::findOrFail($id);
        $fileUrl = s3asset($document->fileUrl);
        $extension = strtolower(pathinfo($document->fileUrl, PATHINFO_EXTENSION));

        // Create thumbnails directory if it doesn't exist
        $thumbnailPath = storage_path('app/public/thumbnails');
        if (!file_exists($thumbnailPath)) {
            mkdir($thumbnailPath, 0777, true);
        }

        $thumbnailFile = $thumbnailPath . '/' . $id . '.jpg';

        // Generate thumbnail if it doesn't exist
        if (!file_exists($thumbnailFile)) {
            if ($extension === 'pdf') {

                // Your pre-signed URL
                $tempPdf = tempnam(sys_get_temp_dir(), 's3_pdf_');
                file_put_contents($tempPdf, file_get_contents($fileUrl));

                try {
                    $pdf = new Pdf($tempPdf); // Now works with local path
                    $pdf->selectPage(1)->save($thumbnailFile);
                } finally {
                    unlink($tempPdf);
                }
            } elseif (in_array($extension, ['xlsx', 'xls'])) {
                // Load the spreadsheet
                // $spreadsheet = IOFactory::load($fileUrl);
                // $worksheet = $spreadsheet->getActiveSheet();
            
                // // Create a PNG writer and save as thumbnail
                // $writer = IOFactory::createWriter($spreadsheet, 'Mpdf'); // 'Mpdf' or 'Dompdf' for PDF, but for PNG:
                
                // PhpSpreadsheet doesn't natively support PNG. Alternatives:
                // Option 1: Convert to HTML -> PNG (using Dompdf + imagemagick)
                // Option 2: Use a screenshot tool (like headless Chrome with Puppeteer)
                // Option 3: Export as PDF first, then convert PDF to PNG (recommended)
                
                // Example: Export as PDF, then convert to PNG
                $tempPdfPath = tempnam(sys_get_temp_dir(), 'xlsx_') . '.pdf';
                file_put_contents($tempPdfPath, file_get_contents($fileUrl));
                $spreadsheet = IOFactory::load($tempPdfPath);
                // $worksheet = $spreadsheet->getActiveSheet();
                $writer = IOFactory::createWriter($spreadsheet, 'Mpdf');
                $writer->save($tempPdfPath);
            
            
                try {
                // Convert PDF to PNG using Spatie/pdf-to-image or Imagick

                    $pdfToImage = new Pdf($tempPdfPath);// Now works with local path
                // Saves as PNG/JPG

                    $pdfToImage->selectPage(1)->save($thumbnailFile);
                } finally {
                // Cleanup

                    unlink($tempPdfPath);

                }
            }
            elseif (in_array($extension, ['doc', 'docx'])) {
                // Save Word file locally first
                $tempWordPath = tempnam(sys_get_temp_dir(), 'doc_') . '.' . $extension;
                file_put_contents($tempWordPath, file_get_contents($fileUrl));
                
                // Create temporary PDF path
                $tempPdfPath = tempnam(sys_get_temp_dir(), 'doc_') . '.pdf';

                // Use unoconv to convert Word to PDF
                $command = "unoconv -f pdf -o $tempPdfPath $tempWordPath";
                exec($command, $output, $return_var);

                if ($return_var !== 0) {
                    throw new \Exception("Failed to convert Word document to PDF");
                }

                try {
                    // Convert PDF to image
                    $pdfToImage = new Pdf($tempPdfPath);
                    $pdfToImage->selectPage(1)->save($thumbnailFile);
                } finally {
                    // Cleanup
                    unlink($tempWordPath);
                    unlink($tempPdfPath);
                }
            }
        }

        return response()->file($thumbnailFile);
    }
}
