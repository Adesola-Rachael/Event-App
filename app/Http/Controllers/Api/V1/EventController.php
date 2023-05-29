<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Requests\EventRequest;
use App\Http\Resources\EventResource;
use App\Models\Event;
use App\Models\Message;
use App\Traits\ResponseTrait;
use App\Interfaces\StatusCode;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EventController extends Controller
{
    use ResponseTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function listEvent()
    {
        $data=Event::paginate(5);
        return $this->apiResponse('Event Listed Successfully', EventResource::collection($data), StatusCode::OK);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createEvent(EventRequest $eventRequest)
    {
        $data = [
        'user_id' => auth()->user()->id,
        'title' => $eventRequest->title,
        'message_id' => $eventRequest->message_id,
        'event_date' =>$eventRequest->event_date,
        'receiver_id' => $eventRequest->receiver_id
       ];
       if(Event::updateOrCreate($data)){
        return $this->apiResponse('Event Created Successfully', $data, StatusCode::CREATED);
    }


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        //
    }
}
