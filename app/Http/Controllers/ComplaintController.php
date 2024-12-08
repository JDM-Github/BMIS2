<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class ComplaintController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke($id)
    {
        $complaint = Complaint::where('request_document_id', $id)->first();

        $pdf = Pdf::loadView('pdf.complaint', compact('complaint'));

        return $pdf->stream('complaint.pdf');
    }
}
