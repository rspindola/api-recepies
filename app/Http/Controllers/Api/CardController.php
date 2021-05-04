<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Card\CardRequest;
use App\Http\Resources\Card\{CardRecipeResource, CardResource};
use App\Models\Card;
use Illuminate\Http\Request;

class CardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = $request->user();
        return CardResource::collection($user->cards);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CardRequest $request)
    {
        $user = $request->user();
        $card = $user->cards()->create($request->all());
        return new CardResource($card);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Card  $card
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Card $card)
    {
        $user = $request->user();
        $card = $user->cards()->find($card->id)->load('recipes');
        return new CardRecipeResource($card);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Card  $card
     * @return \Illuminate\Http\Response
     */
    public function update(CardRequest $request, Card $card)
    {
        $user = $request->user();
        $card = $user->cards()->find($card->id)->update($request->all());
        $card->refresh();

        return new CardResource($card);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Card  $card
     * @return \Illuminate\Http\Response
     */
    public function destroy(Card $card, Request $request)
    {
        $user = $request->user();
        $user->cards()->find($card->id)->detach();
        $user->cards()->find($card->id)->delete();
    }

    /**
     * Adiciona a receita no card.
     *
     * @param  \App\Models\Card  $card
     * @return \Illuminate\Http\Response
     */
    public function addRecipe(Request $request, Card $card)
    {
        $user = $request->user();
        $data = $request->only('recipe_id');
        $user->cards()->find($card->id)->attach($data);
        $user->cards()->find($card->id)->load('recipes');

        return new CardRecipeResource($card);
    }

    /**
     * Remove a receita no card.
     *
     * @param  \App\Models\Card  $card
     * @return \Illuminate\Http\Response
     */
    public function removeRecipe(Request $request, Card $card)
    {
        $user = $request->user();
        $data = $request->only('recipe_id');
        $user->cards()->find($card->id)->detach($data);
        $user->cards()->find($card->id)->load('recipes');

        return new CardRecipeResource($card);
    }
}
