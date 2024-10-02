<?php

declare(strict_types=1);

namespace App\Services;


use App\Data\{
    PaginationDTO,
    CoachDTO,
};
use App\Models\Coach;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class CoachServices
{
    public function listCoaches(PaginationDTO $paginationDTO): LengthAwarePaginator
    {
        $page = $paginationDTO->page;
        $pageSize = $paginationDTO->pageSize;

        return Coach::query()->paginate($pageSize, page: $page);
    }

    public function storeCoach(CoachDTO $coachDTO): Coach
    {
        $coachDTO->password = Hash::make($coachDTO->password); // on DTO level we can hash it

        return Coach::create($coachDTO->toArray());
    }

    public function updateCoach(Coach $coach, CoachDTO $coachDTO): Coach
    {
        $coach->update($coachDTO->toArray());
        $coach->save();

        return $coach;
    }

    public function destroyCoach(Coach $coach): true
    {
        return $coach->delete();
    }

    public function storeImage(Coach $coach, Request $request): Coach
    {
        $path = config('app.storage_paths.images') . '\\coaches';
        $imageFile = $request->file('img');

        $imageName = $imageFile->getClientOriginalName();
        $coach->update(['img' => storage_path($path) . '\\' . $imageName]);
        $coach->save();

        Storage::putFileAs(
            $path,
            $imageFile,
            $imageName,
        );

        return $coach;
    }
}