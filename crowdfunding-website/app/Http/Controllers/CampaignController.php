<?php

namespace App\Http\Controllers;

use App\Campaign;
use Illuminate\Http\Request;

class CampaignController extends Controller
{
    public function random($count)
    {
        $campaigns = Campaign::select('*')
                    ->inRandomOrder()
                    ->limit($count)
                    ->get();

        $data['campaigns'] = $campaigns;

        return response()->json([
            'response_code' => '00',
            'response_message' => 'data campaigns berhasil ditampilkan',
            'data' => $data
        ], 200);
    }

    public function index()
    {
        $campaigns = Campaign::paginate(2);
        $data['campaigns'] = $campaigns;

        return response()->json([
            'response_code' => '00',
            'response_message' => 'data campaigns berhasil ditampilkan',
            'data' => $data
        ], 200);
    }


    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'required' => 'required',
            'collected' => 'required',
            'address' => 'required',
            'image' => 'required|mimes:jpg,jpeg,png'
        ]);

        $campaign = Campaign::create([
            'title' => $request->title,
            'description' => $request->description,
            'required' => $request->required,
            'address' => $request->address,
            'collected' => $request->collected,
        ]);

        if ($request->hasFile('image')){

            $image = $request->file('image');
            $image_extension = $image->getClientOriginalExtension();
            $image_name = $campaign->id . "." . $image_extension;
            $image_folder = '/photos/campaign/';
            $image_location = $image_folder . $image_name;

            try{
                $image->move(public_path($image_folder), $image_name);
                $campaign->update([
                    'image' => $image_location
                ]);
            }catch(\Exception $e){
                return response()->json([
                    'response_code' => '01',
                    'response_message' => 'photo campaign gagal upload',
                ], 200);
            }
        }

        $data['campaign'] = $campaign;
        
        return response()->json([
            'response_code' => '00',
            'response_message' => 'data campaign berhasil ditambahkan',
            'data' => $data
        ], 200);
    }

    public function detail($id)
    {
        $campaign = Campaign::find($id);

        $data['campaign'] = $campaign;

        return response()->json([
            'response_code' => '00',
            'response_message' => 'data campaign berhasil ditampilkan',
            'data' => $data
        ], 200);
    } 

    public function search($keyword)
    {
        $campaigns = Campaign::select('*')
                    ->where('title', 'LIKE', "%".$keyword."%")
                    ->get();
        
        $data['campaigns'] = $campaigns;

        return response()->json([
            'response_code' => '00',
            'response_message' => 'data campaigns berhasil ditampilkan',
            'data' => $data
        ], 200);
    }


    public function show($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
