<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Category\CategoryRequest;
use App\Http\Resources\Category\CategoryResource;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return CategoryResource::collection(Category::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\Api\Category\CategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        $data = $request->all();

        if ($request->hasFile('icon')) {
            $ext = $request->file('icon')->getClientOriginalExtension();
            $filename = Str::random(10) . "." . $ext;
            $request->file('icon')->storeAs('public/images/category', $filename);
            $data['icon'] = "images/category/" . $filename;
        }

        $category = Category::create($data);
        return new CategoryResource($category);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\Api\Category\CategoryRequest  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, Category $category)
    {
        $data = $request->all();

        if ($request->hasFile('icon')) {
            if (Storage::disk('public')->exists($category->icon)) {
                Storage::disk('public')->delete($category->icon);
            }

            $ext = $request->file('icon')->getClientOriginalExtension();
            $filename = Str::random(10) . "." . $ext;
            $request->file('icon')->storeAs('public/images/category', $filename);
            $data['icon'] = "images/category/" . $filename;
        }

        $category->update($data);
        $category->refresh();

        return new CategoryResource($category);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        if (Storage::disk('public')->exists($category->icon)) {
            Storage::disk('public')->delete($category->icon);
        }

        $category->delete();
    }
}
