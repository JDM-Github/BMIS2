<?php

namespace App\Http\Controllers;

use App\Models\MedicalLegalCertificate;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class MedicalLegalCertificateController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke($id)
    {
        $medic = MedicalLegalCertificate::where('request_document_id', $id)->first();

        $pdf = Pdf::loadView('pdf.medical-legal-certificate', compact('medic'));

        return $pdf->stream('medical-legal-certificate.pdf');
    }
}
