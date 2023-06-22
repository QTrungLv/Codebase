<?php

namespace App\Http\Controllers;

use App\Services\LoginServices;
use Illuminate\Http\Request;


class LoginController extends Controller
{

    private LoginServices $loginService;

    public function __construct(LoginServices $loginService)
    {
        $this->loginService = $loginService;
    }

    //Đăng nhập
    function login(Request $request, string $id)
    {
        return response()->json([
            'query' => $request->input('page'),
            'id' => $id,
            'username' => $request['username'],
            'password' => $request['password']
        ]);
    }
}
