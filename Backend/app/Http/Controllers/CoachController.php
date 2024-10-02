<?php

namespace App\Http\Controllers;

use App\Http\Requests\Coach\{
    IndexCoachRequest,
    UpdateCoachRequest,
    StoreCoachRequest,
};
use App\Http\Requests\StoreImgRequest;
use App\Http\Resources\Coach\{
    ListCoachesResource,
    ShowCoachResource,
};
use Illuminate\Http\{
    Request,
    JsonResponse,
};
use App\Models\Coach;
use App\Services\CoachServices;

class CoachController extends APIController
{
    /**
     * Display a listing of the resource.
     */
    public function index(IndexCoachRequest $request, CoachServices $service)
    {
        $coaches = $service->listCoaches($request->toDTO());
        $message = $coaches ? 'Success retrieving coaches' : 'No coaches are registered';

        return $this->sendResponse($message, data: ListCoachesResource::collection($coaches)->response()->getData(true));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCoachRequest $request, CoachServices $service): JsonResponse
    {
        $coach = $service->storeCoach($request->toDTO());

        return $this->sendResponse('Success storing new Coach', 201, new ShowCoachResource($coach));
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Coach $coach): JsonResponse
    {
        return $this->sendResponse('Success retrieving', 200, new ShowCoachResource($coach));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCoachRequest $request, Coach $coach, CoachServices $service): JsonResponse
    {
        $updated = $service->updateCoach($coach, $request->toDTO());

        if ($updated) {
            return $this->sendResponse(
                'Sucess updating coach',
                200,
                new ShowCoachResource($coach),
            );
        }

        return $this->sendFailure('Error occured through updating data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Coach $coach, CoachServices $service)
    {
        $destroyed = $service->destroyCoach($coach);
        $message = $destroyed ? 'Coach removed successfully' : 'Error occurred';

        return $this->sendResponse($message);
    }


    public function storeImg(StoreImgRequest $request, Coach $coach, CoachServices $service): JsonResponse
    {
        $coach = $service->storeImage($coach, $request);

        return $this->sendResponse('Success storing coach image', 201, new ShowCoachResource($coach));
    }
}
