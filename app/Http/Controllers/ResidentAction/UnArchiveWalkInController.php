<?php

namespace App\Http\Controllers\ResidentAction;

use App\Http\Controllers\Controller;
use App\Models\WalkIn;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class UnArchiveWalkInController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(WalkIn $resident): RedirectResponse
    {
        $resident->update([
            'isArchived' => false,
        ]);

        // flash()->success('Resident Rejected Successfully!');
        return redirect()->route('walkin.index');
    }
}
