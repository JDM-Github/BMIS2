<?php

namespace App\Http\Controllers\DocumentAction;

use App\Enums\DocumentTypeEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRequestDocument;
use App\Models\BaranggayCertificate;
use App\Models\BaranggayClearance;
use App\Models\Complaint;
use App\Models\RequestDocument;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class AcceptRequestDocumentController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(StoreRequestDocument $storeRequestDocument, RequestDocument $requestDocument): RedirectResponse
    {
        $schedule = $storeRequestDocument->schedule;
        $valid_until = Carbon::parse($schedule)->addDays(7);

        $requestDocument->update(
            [
                'status' => 1,
                'schedule' => $schedule,
                'valid_until' => $valid_until,
                'is_announce' => 1,
            ]
        );

        if ($requestDocument->document_name === 'Barangay Blotter/Complaint Report') {
            $latestCaseNo = Complaint::whereHas('requestDocument', function ($query) {
                $query->where('status', 1)
                    ->where('document_name', 'complaint');
            })
                ->latest()
                ->first()
                ->case_no ?? 0;

            // Then update your complaint
            Complaint::where('request_document_id', $requestDocument->id)
                ->update([
                    'case_no' => $latestCaseNo + 1  // Increment the case number
                ]);
        }

        flash()->success('Request Document Accepted Successfully!');

        return redirect()->route('request-document.index');
    }
}
