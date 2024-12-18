<?php

namespace App\Http\Controllers\DocumentAction;

use App\Http\Controllers\Controller;
use App\Models\RequestDocument;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ArchiveDocumentController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(RequestDocument $resident): RedirectResponse
    {
        $resident->update(
            [
                'isArchived' => true,
            ]
        );
        flash()->success('Document Successfully Archived!');
        return redirect()->route('resident.index');
    }
}
