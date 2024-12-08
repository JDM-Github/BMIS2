<?php

namespace App\Http\Controllers;

use App\DataTables\BlotterRecordDataTable;
use App\Http\Requests\BlotterRecord\StoreBlotterRequest;
use App\Http\Requests\BlotterRecord\UpdateBlotterRequest;
use App\Models\BlotterRecord;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class BlotterRecordController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(BlotterRecordDataTable $blotterRecordDataTable): JsonResponse|View
    {
        return $blotterRecordDataTable->render('blotter-record.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBlotterRequest $storeBlotterRequest): RedirectResponse
    {
        BlotterRecord::create($storeBlotterRequest->except('file')
            +
            [
                'file' => $storeBlotterRequest->file('file')->store('blotterFiles', 'public')
            ]);

        flash()->success('Blotter Recorded Sucessfully!');

        return redirect()->route('blotter.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(BlotterRecord $blotter): JsonResponse|View
    {
        return response()->json($blotter);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBlotterRequest $updateBlotterRequest, BlotterRecord $blotterRecord): RedirectResponse
    {
        $data = $updateBlotterRequest->except('file');

        if ($updateBlotterRequest->hasFile('file')) {
            $data['file'] = $updateBlotterRequest->file('file')->store('blotterFiles', 'public'); // Adjust storage path as needed
        }

        $blotterRecord->update($data);

        flash()->success('Blotter Updated Successfully!');

        return redirect()->route('blotter.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BlotterRecord $blotter): RedirectResponse
    {
        $blotter->delete();

        flash()->success('Blotter Deleted Successfully!');

        return redirect()->route('blotter.index');
    }
}
