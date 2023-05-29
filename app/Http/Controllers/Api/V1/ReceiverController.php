<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Requests\ReceiverRequest;
use App\Http\Resources\ReceiverResource;
use App\Models\Receiver;
use Illuminate\Http\Request;
use App\Interfaces\StatusCode;
use App\Http\Controllers\Controller;
use App\Traits\ResponseTrait;

class ReceiverController extends Controller
{
    use ResponseTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function listReceiver()
    {
        $data=Receiver::paginate(5);
        return $this->apiResponse('Receiver Listed Successfully', ReceiverResource::collection($data), StatusCode::OK);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createReceiver(ReceiverRequest $receiverRequest)
    {
        // $data = $receiverRequest->validated;
        $data = [
            'name' => $receiverRequest->name,
            'email' => $receiverRequest->email,
            'user_id' => auth()->user()->id,
            'phone' => $receiverRequest->phone
        ];
        if(Receiver::updateOrCreate($data)){
            return $this->apiResponse('Receiver Created Successfully', $data, StatusCode::CREATED);

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
     * @param  \App\Models\Receiver  $receiver
     * @return \Illuminate\Http\Response
     */
    public function show(Receiver $receiver)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Receiver  $receiver
     * @return \Illuminate\Http\Response
     */
    public function edit(Receiver $receiver)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Receiver  $receiver
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Receiver $receiver)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Receiver  $receiver
     * @return \Illuminate\Http\Response
     */
    public function destroy(Receiver $receiver)
    {
        //
    }
}
