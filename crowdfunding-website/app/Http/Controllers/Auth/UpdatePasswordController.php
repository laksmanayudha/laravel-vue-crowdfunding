<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class UpdatePasswordController extends Controller
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
            'email' => 'required|email',
            'password' => 'required|confirmed|min:6'
        ]);

        User::where('email', $request->email)->update([
            'password' => bcrypt(request('password'))
        ]);

        
        return response()->json([
            'response_code' => '00',
            'response_message' => 'response berhasil diubah'
        ], 200);
    }
}
