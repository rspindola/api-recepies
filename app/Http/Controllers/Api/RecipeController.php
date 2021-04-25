<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Recipe\RecipeRequest;
use App\Http\Resources\Recipe\RecipeResource;
use App\Models\Recipe;

class RecipeController extends Controller
{
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
        $data = $request->all();
        // $data['ingredients'] = serialize($request['ingredients']);
        $recipe = Recipe::create($data);
        return $recipe;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function show(Recipe $recipe)
    {
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
        $recipe->update($request->all());
        $recipe->refresh();

        return new RecipeResource($recipe);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function destroy(Recipe $recipe)
    {
        $recipe->delete();
        return new RecipeResource($recipe);
    }
}
