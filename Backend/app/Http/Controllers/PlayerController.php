<?php

namespace App\Http\Controllers;

use App\Http\Resources\Player\ShowPlayerResource;
use Illuminate\Http\{
    Request,
    JsonResponse,
};
use App\Models\Player;
use App\Http\Requests\Player\StorePlayerRequest;
use App\Services\PlayerServices;

class PlayerController extends APIController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePlayerRequest $request, PlayerServices $service): JsonResponse
    {
        $player = $service->storePlayer($request->toDTO());

        return $this->sendResponse('Success storing new Player', 201, new ShowPlayerResource($player));
    }

    /**
     * Display the specified resource.
     */
    public function show(Player $player)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Player $player)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Player $player)
    {
        //
    }
}
