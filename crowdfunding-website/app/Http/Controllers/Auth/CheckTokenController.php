<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CheckTokenController extends Controller
{
    public function __invoke(Request $request)
    {
        return response()->json([
            'response_code' => '00',
            'response_message' => 'token valid',
            'data' => true
        ]);   
    }
}
