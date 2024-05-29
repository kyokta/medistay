<?php

namespace App\Http\Controllers;

use App\Models\RsRoom;
use App\Http\Requests\StoreRsRoomRequest;
use App\Http\Requests\UpdateRsRoomRequest;
use App\Http\Resources\RsRoomResource;
use App\Models\Hospital;
use Illuminate\Http\Request;

class RsRoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = RsRoom::with('hospital');

        if ($request->has('usia')) {
            $query->where('usia', $request->input('usia'));
        }
        if ($request->has('spesialisasi')) {
            $query->where('spesialisasi', $request->input('spesialisasi'));
        }
        if ($request->has('kelas_kamar')) {
            $query->where('kelas_kamar', $request->input('kelas_kamar'));
        }
        if ($request->has('hospital')) {
            $hospital = Hospital::where('nama_rumah_sakit',$request->input('hospital'))->first();
            $query->where('hospital_id', $hospital->id);
        }
        $rooms = $query->get();

        // Return the results directly as a JSON response
        return response()->json($rooms);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRsRoomRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //

        $rsRooms = RsRoom::where('hospital_id', $id)->get();

        // Transform the RsRoom model(s) into a JSON response using RsRoomResource
        return RsRoomResource::collection($rsRooms);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RsRoom $rsRoom)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRsRoomRequest $request, RsRoom $rsRoom)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RsRoom $rsRoom)
    {
        //
    }
}
