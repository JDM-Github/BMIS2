<?php

namespace App\Http\Controllers;

use App\Models\BaranggayClearance;
use App\Models\RequestDocument;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class BaranggayClearanceController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke($id)
    {
        $clearance = BaranggayClearance::where('request_document_id', $id)->first();

        $pdf = Pdf::loadView('pdf.brgy-clearance', compact('clearance'));

        return $pdf->stream('brgy-clearance.pdf');
    }
}
