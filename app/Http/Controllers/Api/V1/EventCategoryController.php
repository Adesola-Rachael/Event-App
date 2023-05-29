<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\EventCategory;
use App\Traits\ResponseTrait;
use App\Interfaces\StatusCode;
use App\Http\Controllers\Controller;
use App\Http\Requests\EventCategoryRequest;
use App\Http\Resources\EventCategoryResources;

class EventCategoryController extends Controller
{
    use ResponseTrait;
    public function createEventCategory(EventCategoryRequest $eventCategoryRequest){
        $data=$eventCategoryRequest->validated();
        if(EventCategory::updateOrCreate($data)){
            return $this->apiResponse('Category Created Successfully', $data, StatusCode::CREATED);
        }
    }
    public function listCategory(EventCategory $eventCategory){
        $data=EventCategory::with('message')->paginate(5);
        return $this->apiResponse('Category Listed Successfully', EventCategoryResources::collection($data), StatusCode::OK);

    }
}
