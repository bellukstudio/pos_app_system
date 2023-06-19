<?php

namespace App\Http\Controllers\Merchant;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileRequest;
use App\Models\CategorieMerchant;
use App\Models\MasterMerchant;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;


class MerchantController extends Controller
{
    public function index(): View
    {
        $categorie = CategorieMerchant::all();
        $masterMerchant = MasterMerchant::first();
        return view('dashboard.profile.profile', compact('categorie', 'masterMerchant'));
    }

    public function createAndUpdate(ProfileRequest $request): RedirectResponse
    {
        $validator = Validator::make(
            $request->all(),
            $request->rules(),
            $request->messages(),
        );

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        try {
            $data = MasterMerchant::all();
            if ($data->count() > 0) {
                $data->first()->update([
                    'nameMerchant' => $request->merchantName,
                    'address' => $request->merchantAddress,
                    'categoryMerchantId' => $request->categoryMerchant,
                    'founder' => $request->merchantFounder
                ]);
            } else {
                MasterMerchant::create([
                    'nameMerchant' => $request->merchantName,
                    'address' => $request->merchantAddress,
                    'categoryMerchantId' => $request->categoryMerchant,
                    'founder' => $request->merchantFounder
                ]);
            }
            return redirect()->route('merchant-profile')->with('success', 'Data saved!');
        } catch (\Exception $e) {
            return back()->withErrors($e);
        }
    }
}
