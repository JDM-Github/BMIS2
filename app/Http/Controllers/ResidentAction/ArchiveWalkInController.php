<?php

namespace App\Http\Controllers\ResidentAction;

use App\Http\Controllers\Controller;
use App\Models\WalkIn;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Log;

class ArchiveWalkInController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(WalkIn $resident): RedirectResponse
    {
        $resident->update([
            'isArchived' => true,
        ]);
        // flash()->success('Resident Rejected Successfully!');
        return redirect()->route('walkin.index');
    }
}
