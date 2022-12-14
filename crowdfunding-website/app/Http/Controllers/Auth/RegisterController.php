<?php

namespace App\Http\Controllers\Auth;

use App\Events\UserRegisteredEvent;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

class RegisterController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $request->validate([
            'email' => 'required|unique:users,email|email',
            'username' => 'required|unique:users,username',
            'name' => 'required',
        ]);

        $data_request = $request->all();
        $user = User::create($data_request);

        $data['user'] = $user;

        event(new UserRegisteredEvent($user));

        return response()->json([
            'response_code' => '00',
            'response_message' => 'user berhasil didaftarkan, silahkan cek email untuk kode otpnya',
            'data' => $data
        ]);
    }
}
