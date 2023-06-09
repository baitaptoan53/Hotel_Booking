<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\User;
use App\Http\Resources\User as UserResource;
use Illuminate\Pagination\LengthAwarePaginator;

use Illuminate\Http\Request;

class UsersController extends BaseController
{
    public function index(Request $request)
    {
        $users = User::paginate(10);
        // truyền các thông tin pagination vào trong resource
        $users->appends(request()->query());
        // trả về dữ liệu với resource
        return UserResource::collection($users);
        // return $this->sendResponse( $users, 'Users retrieved successfully.');

    }
    public function destroy($id)
    {

        User::find($id)->delete($id);

        return response()->json([
            'success' => 'Record deleted successfully!'
        ]);
    }
}
