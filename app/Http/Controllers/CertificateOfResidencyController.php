<?php

namespace App\Http\Controllers;

use App\Models\CertificateOfResidency;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class CertificateOfResidencyController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke($id)
    {
        $certificate = CertificateOfResidency::where('request_document_id', $id)->first();

        $pdf = Pdf::loadView('pdf.certificate-of-residency', compact('certificate'));

        return $pdf->stream('certificate-of-residency.pdf');
    }
}
