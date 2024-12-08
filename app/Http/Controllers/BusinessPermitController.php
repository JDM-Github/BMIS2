<?php

namespace App\Http\Controllers;

use App\Models\BusinessPermit;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class BusinessPermitController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke($id)
    {
        $business = BusinessPermit::where('request_document_id', $id)->first();

        $pdf = Pdf::loadView('pdf.business-permit', compact('business'));

        return $pdf->stream('business-permit.pdf');
    }
}
