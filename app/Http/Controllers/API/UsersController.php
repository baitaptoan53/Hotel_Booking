<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\User;
use App\Http\Resources\User as UserResource;

use Illuminate\Http\Request;

class UsersController extends BaseController
{
    public function index()
    {
        $data = User::all();
        return $this->sendResponse(UserResource::collection($data), 'Posts fetched.');
    }
}
