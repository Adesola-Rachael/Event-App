<?php

namespace App\Http\Controllers\Api\V1;

use App\Traits\ResponseTrait;
use App\Interfaces\StatusCode;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    use ResponseTrait;
    
     /**
     * Welcome Page 
     * @return \Illuminate\Http\JsonResponse
     */
    public function welcome(){
        return $this->apiResponse('Welcome to our new page', null, StatusCode::OK);
    }
}