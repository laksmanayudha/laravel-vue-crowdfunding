<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Otp_code;
use Carbon\Carbon;

class VerificationController extends Controller
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
            'otp' => 'required'
        ]);

        // cek jika ada otp code
        $otp_code = Otp_code::where('otp', $request->otp)->first();
        if(!$otp_code){
            return response()->json([
                'response_code' => '01',
                'response_message' => 'OTP code tidak ditemukan'
            ], 400);
        }

        // cek jika waktu otp code masih valid
        $now = Carbon::now();
        if($now > $otp_code->valid_until){
            return response()->json([
                'response_code' => '01',
                'response_message' => 'Kode OTP sudah tidak berlaku, silahkan generate ulang'
            ], 400);
        }

        // update email yang terverifikasi
        $user = User::find($otp_code->user_id);
        $user->email_verified_at = Carbon::now();
        $user->save();

        // hapus otp code yang sudah tidak dipakai
        $otp_code->delete();

        $data['user'] = $user;
        return response()->json([
            'response_code' => '00',
            'response_message' => 'user berhasil terverifikasi',
            'data' => $data
        ], 200);
    }
}
