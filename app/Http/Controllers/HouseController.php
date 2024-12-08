<?php

namespace App\Http\Controllers;

use App\DataTables\HouseDataTable;
use App\Models\House;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class HouseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(HouseDataTable $houseDataTable): JsonResponse | View
    {
        return $houseDataTable->render('house.index');
    }

    /**
     * Display the specified resource.
     */
     public function show(House $house): JsonResponse | View
    {
        return response()->json($house);
    }
}
