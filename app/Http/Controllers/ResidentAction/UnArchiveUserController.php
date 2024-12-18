<?php

namespace App\Http\Controllers\ResidentAction;

use App\Http\Controllers\Controller;
use App\Models\RequestDocument;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class UnArchiveUserController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(User $resident): RedirectResponse
    {
        $resident->update(
            [
                'isArchived' => true,
            ]
        );
        flash()->success('User Successfully Archived!');
        return redirect()->route('resident.index');
    }
}
