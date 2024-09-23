<?php

declare(strict_types=1);

namespace App\Services;


use App\Data\PlayerDTO;
use App\Models\Player;
use Illuminate\Pagination\LengthAwarePaginator;

class PlayerServices
{
    // public function getPlayers(PaginationDTO $paginationDTO): LengthAwarePaginator
    // {
    //     $page = $paginationDTO->page;
    //     $pageSize = $paginationDTO->pageSize;

    //     return Player::query()->paginate($pageSize, page: $page);
    // }

    public function storePlayer(PlayerDTO $playerDTO): Player
    {
        return Player::create($playerDTO->toArray());
    }

    // public function showPlayer(Player $player): Player
    // {
    //     return $player;
    // }

    // public function updatePlayer(Player $player, PlayerDTO $playerDTO): bool
    // {
    //     return $player->update($playerDTO->toArray());
    // }

    // public function destroyPlayer(Player $player): ?bool
    // {
    //     return $player->delete();
    // }

    // public function getArticlesCount(Player $player): int
    // {
    //     // $count = Article::where('author', $player->id)->count();
    //     $count = $player->articles_count;

    //     return $count;
    // }
}