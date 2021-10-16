<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Api\Users;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    // we use dependency injection to initialize users model class
    public function get(Users $usersModel)
    {
        // for demo purposes, we can return all users, but in production it should be paginated
        $users = $usersModel->select('usr_id', 'usr_name')->get();
        return response()->json($users);
    }
}
