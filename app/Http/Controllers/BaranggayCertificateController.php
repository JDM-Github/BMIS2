<?php

namespace App\Http\Controllers;

use App\Models\BaranggayCertificate;
use App\Models\RequestDocument;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class BaranggayCertificateController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke($id)
    {
        $certificate = BaranggayCertificate::where('request_document_id', $id)->first();

        $pdf = Pdf::loadView('pdf.brgy-certificate', compact('certificate'));

        return $pdf->stream('brgy-certificate.pdf');
    }
}
