<?php

namespace App\Http\Controllers;

use App\Models\FencingPermit;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class FencingPermitController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke($id)
    {
        $fencing = FencingPermit::where('request_document_id', $id)->first();

        $pdf = Pdf::loadView('pdf.fencing-permit', compact('fencing'));

        return $pdf->stream('fencing-permit.pdf');
    }
}
