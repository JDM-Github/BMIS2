<?php

namespace App\Http\Controllers\ResidentAction;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class RejectResidentController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(User $resident): RedirectResponse
    {
        $resident->update(
            [
                'status' => false,
            ]
        );

        flash()->success('Resident Rejected Successfully!');

        return redirect()->route('resident.index');
    }
}
