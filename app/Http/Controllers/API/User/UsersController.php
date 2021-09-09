<?php

namespace App\Http\Controllers\API\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UsersController extends Controller
{
    public function index() {


        //return 'Funcionando!!!';

        //Get
        $user = User::all()->limit(10);

        // //Return json
        return response()->json([
            'status' => true,
            'message' => "The request has succeeded.",
            'data' => compact('user'),
        ], 200);
    }
}
