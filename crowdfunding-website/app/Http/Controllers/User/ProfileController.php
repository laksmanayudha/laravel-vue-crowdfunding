<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['user'] = auth()->user();
        return response()->json([
            'response_code' => '00',
            'response_message' => 'profile user terauntentikasi',
            'data' => $data
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, $id)
    // {
    //     //
    // }

    public function update(Request $request)
    {

        $request->validate([
            'name' => 'nullable',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        // persiapkan field yang akan di update
        $user = auth()->user();
        $profile_folder = "profile_images";

        // cek user name baru
        $name = $request->name === null ? $user->name : $request->name;
        $imageName = $user->photo_profile;

        // cek image baru
        if ( $request->image != null ){
            // hapus image di local storage jika ada
            if ( $imageName != null ){
                unlink(public_path() . DIRECTORY_SEPARATOR . $imageName);
            }

            // buat nama images baru
            $imageName = time() . "." . $request->image->extension();

            // simpan images baru di local storage
            $request->image->move(public_path($profile_folder), $imageName);

            // path image yang disimpan  pada database
            $imageName = $profile_folder . DIRECTORY_SEPARATOR . $imageName;
        }

        // update ke database
        User::where('email', $user->email)->update([
            'name' => $name,
            "photo_profile" => $imageName
        ]);

        $updateUser = User::where('email', $user->email)->first();

        return response()->json([
            'response_code' => '00',
            'response_message' => 'berhasil update profile user',
            'data' => $updateUser
        ]);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
