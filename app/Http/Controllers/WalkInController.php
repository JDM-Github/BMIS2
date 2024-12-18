<?php

namespace App\Http\Controllers;

use App\DataTables\HouseDataTable;
use App\DataTables\WalkInDataTable;
use App\Models\House;
use App\Models\WalkIn;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class WalkInController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(WalkInDataTable $houseDataTable): JsonResponse|View
    {
        return $houseDataTable->render('walkin.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(House $house): JsonResponse|View
    {
        return response()->json($house);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'full_name' => 'required|string|max:255',
            'contact_number' => 'required|string|max:255',
            'document_type' => 'required|string|max:255',
            'purpose_of_request' => 'required|string',
        ]);

        WalkIn::create($validatedData);
        return redirect()->route('walkin.index')->with('success', 'Walk-in registered successfully!');
    }
}
