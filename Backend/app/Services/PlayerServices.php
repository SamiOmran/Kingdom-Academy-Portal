<?php

declare(strict_types=1);

namespace App\Services;


use App\Data\{
    PaginationDTO,
    PlayerDTO,
};
use App\Models\Player;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Storage;

class PlayerServices
{
    public function listPlayers(PaginationDTO $paginationDTO): LengthAwarePaginator
    {
        $page = $paginationDTO->page;
        $pageSize = $paginationDTO->pageSize;

        return Player::query()->paginate($pageSize, page: $page);
    }

    public function storePlayer(PlayerDTO $playerDTO): Player
    {
        return Player::create($playerDTO->toArray());
    }

    public function updatePlayer(Player $player, PlayerDTO $playerDTO): bool
    {
        return $player->update($playerDTO->toArray());
    }

    public function destroyPlayer(Player $player): ?bool
    {
        $player->active = false;

        return $player->delete();
    }

    public function storePlayerImage(Player $player, Request $request): Player
    {
        $path = config('app.storage_paths.player_img');
        $imageFile = $request->file('img');

        $imageName = $imageFile->getClientOriginalName();

        $player->update(['img' => storage_path($path) . '\\' . $imageName]);
        $player->save();

        Storage::putFileAs(
            'public\imgs\\',
            $imageFile,
            $imageName,
        );

        return $player;
    }
}