<?php

namespace App\Http\Controllers\DocumentAction;

use App\Http\Controllers\Controller;
use App\Models\RequestDocument;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class UnArchiveDocumentController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(RequestDocument $resident): RedirectResponse
    {
        $resident->update(
            [
                'isArchived' => false,
            ]
        );
        flash()->success('Document Successfully Unarchived!');
        return redirect()->route('resident.index');
    }
}
