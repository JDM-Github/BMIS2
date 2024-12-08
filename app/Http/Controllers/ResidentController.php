<?php

namespace App\Http\Controllers;

use App\DataTables\ResidentDataTable;
use App\Models\Resident;
use App\Http\Requests\StoreResidentRequest;
use App\Http\Requests\UpdateResidentRequest;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;

class ResidentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(ResidentDataTable $residentDataTable)
    {
        return $residentDataTable->render('resident.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $resident): JsonResponse | View
    {
        $resident->load('houses');

        return response()->json($resident);
    }

    public function destroy(User $resident)
    {
        // Delete the first associated House, if it exists
        $house = $resident->houses()->first(); // Adjust the relationship name if necessary
        if ($house) {
            $house->delete();
        }

        // Delete the user
        $resident->delete();

        // Flash success message
        flash()->success('Resident deleted successfully!');

        return redirect()->route('resident.index');
    }
}
