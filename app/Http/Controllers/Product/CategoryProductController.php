<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\ProductCategoryRequest;
use App\Http\Requests\Product\ProductCategoryUpdateRequest;
use App\Models\MasterCategorieProduct;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class CategoryProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $category = MasterCategorieProduct::latest()->get();
        return view('dashboard.product.category.category-product', compact('category'));
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
    public function store(ProductCategoryRequest $request) : RedirectResponse
    {
        $validator = Validator::make(
            $request->all(),
            $request->rules()
        );

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        try {
            $category = [
                'categoryName' => $request->categoryName
            ];

            MasterCategorieProduct::create($category);

            return redirect()->route('product-category.index')->with('success', __('alert.saved'));
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
    public function update(ProductCategoryUpdateRequest $request, string $id): RedirectResponse
    {
        $validator = Validator::make(
            $request->all(),
            $request->rules()
        );

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        try {


            $data = MasterCategorieProduct::find($id);
            $data->categoryName = $request->categoryName;
            $data->update();

            return redirect()->route('product-category.index')->with('success', __('alert.updated'));
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


            $data = MasterCategorieProduct::find($id);
            $data->delete();
            return redirect()->route('product-category.index')->with('success', __('alert.deleted'));
        } catch (\Throwable $e) {
            return back()->with('failed', $e->getMessage())->withInput();
        }
    }
}
