<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class DirectRootController extends Controller
{
    public function index(): RedirectResponse
    {
        if (Auth::user() == null) {
            return redirect()->route('login');
        } elseif (auth()->check()) {
            return redirect()->route('dashboard');
        }
    }

    public function dashboard(): View
    {
        return view('dashboard.index');
    }
}
