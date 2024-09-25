<?php

namespace App\Http\Controllers;

use App\Http\Requests\Player\IndexPlayerRequest;
use App\Http\Requests\Player\UpdatePlayerRequest;
use App\Http\Resources\Player\ListPlayersResource;
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
    public function index(IndexPlayerRequest $request, PlayerServices $service)
    {
        $players = $service->listPlayers($request->toDTO());
        $message = $players ? 'Success retrieving players' : 'No players are registered';

        return $this->sendResponse($message, data: ListPlayersResource::collection($players));
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
    public function show(Request $request, Player $player): JsonResponse
    {
        return $this->sendResponse('Success retrieving', 200, new ShowPlayerResource($player));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePlayerRequest $request, Player $player, PlayerServices $service): JsonResponse
    {
        $updated = $service->updatePlayer($player, $request->toDTO());

        if ($updated) {
            return $this->sendResponse(
                'Sucess updating player',
                200,
                new ShowPlayerResource($player),
            );
        }

        return $this->sendFailure('Error occured through updating data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Player $player, PlayerServices $service)
    {
        $destroyed = $service->destroyPlayer($player);
        $message = $destroyed ? 'Player removed successfully' : 'Error occurred';

        return $this->sendResponse($message);
    }
}
