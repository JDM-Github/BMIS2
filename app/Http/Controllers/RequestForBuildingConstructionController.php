<?php

namespace App\Http\Controllers;

use App\Models\RequestForBuildingConstruction;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class RequestForBuildingConstructionController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke($id)
    {
        $permit = RequestForBuildingConstruction::where('request_document_id', $id)->first();

        $pdf = Pdf::loadView('pdf.request-for-building-construction', compact('permit'));

        return $pdf->stream('request-for-building-construction.pdf');
    }
}
