<?php

namespace App\Http\Controllers\ResidentAction;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class AcceptResidentController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(User $resident): RedirectResponse
    {
        $resident->update(
            [
                'status' => true
            ]
        );

        flash()->success('Resident Accepted Successfully!');

        return redirect()->route('resident.index');
    }
}
