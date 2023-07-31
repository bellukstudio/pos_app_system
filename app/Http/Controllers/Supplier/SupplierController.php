<?php

namespace App\Http\Controllers\Supplier;

use App\Http\Controllers\Controller;
use App\Http\Requests\Supplier\SupplierRequest;
use App\Http\Requests\Supplier\SupplierUpdateRequest;
use App\Models\MasterSupplier;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $supplierData = MasterSupplier::latest()->get();
        return view('dashboard.supplier.supplier', compact('supplierData'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SupplierRequest $request): RedirectResponse
    {
        $validator = Validator::make($request->all(), $request->rules());

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        try {
            $form = [
                'supplierName' => $request->supplierName,
                'companyName' => $request->companyName,
                'phone' => $request->phoneNumber
            ];

            MasterSupplier::create($form);
            return redirect()->route('supplier-management.index')->with('success', __('alert.saved'));
        } catch (\Throwable $e) {
            return back()->with('failed', $e->getMessage())->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SupplierUpdateRequest $request, string $id): RedirectResponse
    {
        $validator = Validator::make($request->all(), $request->rules());

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        try {
            $supplier = MasterSupplier::find($id);
            $supplier->supplierName = $request->supplierName;
            $supplier->companyName = $request->companyName;
            $supplier->phone = $request->phoneNumber;
            $supplier->update();
            return redirect()->route('supplier-management.index')->with('success', __('alert.updated'));
        } catch (\Throwable $e) {
            return back()->with('failed', $e->getMessage())->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        try {
            $supplier = MasterSupplier::find($id);
            $supplier->delete();
            return redirect()->route('supplier-management.index')->with('success', __('alert.deleted'));
        } catch (\Throwable $e) {
            return back()->with('failed', $e->getMessage())->withInput();
        }
    }
}
