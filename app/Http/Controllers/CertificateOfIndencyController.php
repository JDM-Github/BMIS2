<?php

namespace App\Http\Controllers;

use App\Models\CertificateOfIndigency;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class CertificateOfIndencyController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke($id)
    {
        $certificate = CertificateOfIndigency::where('request_document_id', $id)->first();

        $pdf = Pdf::loadView('pdf.certificate-of-indigency', compact('certificate'));

        return $pdf->stream('certificate-of-indency.pdf');
    }
}
