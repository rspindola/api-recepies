<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Recipe\RecipeRequest;
use Illuminate\Http\Request;
use App\Http\Resources\Recipe\RecipeResource;
use App\Models\Recipe;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class RecipeController extends Controller
{
    /**
     * Obtém os dispositivos do usuário autenticado.
     *
     * @param Request $request
     * @return RecipeResource $devices
     */
    public function getMe(Request $request)
    {
        $user = $request->user();
        return RecipeResource::collection($user->recipes);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return RecipeResource::collection(Recipe::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\Api\User\RecipeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RecipeRequest $request)
    {
        $user = $request->user();
        $data = $request->all();

        if ($request->hasFile('icon')) {
            $ext = $request->file('image')->getClientOriginalExtension();
            $filename = Str::random(10) . "." . $ext;
            $request->file('image')->storeAs('public/images/recipes', $filename);
            $data['image'] = "images/recipes/" . $filename;
        }

        $recipe = $user->recipes()->create($data);

        return new RecipeResource($recipe);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Recipe $recipe)
    {
        $user = $request->user();
        $recipe = $user->recipes()->find($recipe->id);
        return new RecipeResource($recipe);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\Api\User\RecipeRequest  $request
     * @param  \App\Models\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function update(RecipeRequest $request, Recipe $recipe)
    {
        $user = $request->user();
        $data = $request->all();

        if ($request->hasFile('icon')) {
            if (Storage::disk('public')->exists($recipe->image)) {
                Storage::disk('public')->delete($recipe->image);
            }

            $ext = $request->file('image')->getClientOriginalExtension();
            $filename = Str::random(10) . "." . $ext;
            $request->file('image')->storeAs('public/images/recipes', $filename);
            $data['image'] = "images/recipes/" . $filename;
        }

        $user->recipes()->find($recipe->id)->update($data);
        $recipe->refresh();

        return new RecipeResource($recipe);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function destroy(Recipe $recipe, Request $request)
    {
        $user = $request->user();
        if (Storage::disk('public')->exists($recipe->image)) {
            Storage::disk('public')->delete($recipe->image);
        }
        $user->recipes()->find($recipe->id)->delete();
    }
}
