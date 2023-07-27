<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\UserRequest;
use App\Http\Requests\User\UserUpdateRequest;
use App\Models\MasterRoles;
use App\Models\MasterUser;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $user = MasterUser::with(['roles'])->latest()->get();
        $role = MasterRoles::all();
        return view('dashboard.users.users', compact('user', 'role'));
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
    public function store(UserRequest $request): RedirectResponse
    {
        $validator = Validator::make(
            $request->all(),
            $request->rules()
        );

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        try {
            if ($request->file('photo')) {
                $file = $request->file('photo')->store('assets/users', 'public');
                $request->photo = $file;
            }
            $user = [
                'fullName' => $request->fullName,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'photo' => $request->photo,
                'rolesId' => $request->rolesSelect,
            ];
            MasterUser::create($user);

            return redirect()->route('users-management.index')->with('success', __('alert.saved'));
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
    public function update(UserUpdateRequest $request, string $id): RedirectResponse
    {
        $validator = Validator::make(
            $request->all(),
            $request->rules()
        );

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        try {
            $user = MasterUser::find($id);

            if ($request->fullName != $user->fullName) {
                $user->fullName = $request->fullName;
            }

            if ($request->email != $user->email) {
                $user->email = $request->email;
            }

            if (!empty($request->password)) {
                $user->password = Hash::make($request->password);
            }

            if ($request->file('photo')) {
                $file = $request->file('photo')->store('assets/users', 'public');
                if (File::exists('storage/' . $user->photo)) {
                    unlink('storage/' . $user->photo);
                }
                $user->photo = $file;
            }

            $user->rolesId = $request->rolesSelect;
            $user->update();


            return redirect()->route('users-management.index')->with('success', __('alert.updated'));
        } catch (\Throwable $e) {
            return back()->with('failed', $e->getMessage())->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $user = MasterUser::find($id);
            if (File::exists('storage/' . $user->photo)) {
                unlink('storage/' . $user->photo);
            }
            $user->delete();
            return redirect()->route('users-management.index')->with('success', __('alert.deleted'));
        } catch (\Throwable $e) {
            return back()->with('failed', $e->getMessage())->withInput();
        }
    }
}
