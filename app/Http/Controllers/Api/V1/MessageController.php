<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Message;
use Illuminate\Http\Request;
use App\Models\EventCategory;
use App\Traits\ResponseTrait;
use App\Interfaces\StatusCode;
use App\Http\Controllers\Controller;
use App\Http\Requests\MessageRequest;
use Illuminate\Auth\Events\Validated;
use App\Http\Resources\MessageResource;
use App\Http\Resources\EventCategoryResources;

class MessageController extends Controller
{
    use ResponseTrait;
    public function createMessage(MessageRequest $messageRequest){
        // $data=$request->validated();
        $data = [
            'message' => $messageRequest->message,
            'event_category_id' => $messageRequest->event_category_id
        ];
        if(Message::updateOrCreate($data)){
            return $this->apiResponse('Message Created Successfully', $data, StatusCode::CREATED);
        }
    }
    public function listMessage(){
        $data=Message::paginate(5);
        return $this->apiResponse('Message Listed Successfully', $data, StatusCode::OK);

        // return $this->apiResponse('Message Listed Successfully', MessageResource::collection($data), StatusCode::OK);
    }
}
