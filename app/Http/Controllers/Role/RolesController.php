<?php

namespace App\Http\Controllers\Role;

use App\Http\Controllers\Controller;
use App\Http\Requests\RolesRequest;
use App\Http\Requests\RolesUpdateRequest;
use App\Models\MasterRoles;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $data = MasterRoles::all();
        return view('dashboard.roles.roles', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RolesRequest $request): RedirectResponse
    {
        $validator = Validator::make(
            $request->all(),
            $request->rules(),
            $request->messages()
        );

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        try {
            MasterRoles::create([
                'rolesName' => $request->rolesName
            ]);

            return redirect()->route('roles-management.index')->with('success', __('alert.saved'));
        } catch (\Throwable $e) {
            return back()->withException($e);
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
    public function update(RolesUpdateRequest $request, string $id): RedirectResponse
    {
        $validator = Validator::make(
            $request->all(),
            $request->rules(),
            $request->messages()
        );

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        try {
            $rolesData = MasterRoles::find($id);
            $rolesData->rolesName = $request->rolesName;
            $rolesData->update();

            return redirect()->route('roles-management.index')->with('success', __('alert.updated'));
        } catch (\Throwable $e) {
            return back()->withException($e);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $rolesData = MasterRoles::find($id);
            $rolesData->delete();

            return redirect()->route('roles-management.index')->with('success', __('alert.deleted'));
        } catch (\Throwable $e) {
            return back()->withException($e);
        }
    }
}
