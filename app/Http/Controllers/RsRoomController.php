<?php

namespace App\Http\Controllers;

use App\Models\RsRoom;
use App\Http\Requests\StoreRsRoomRequest;
use App\Http\Requests\UpdateRsRoomRequest;
use App\Http\Resources\RsRoomResource;

class RsRoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        // dd(RsRoom::all());
        return RsRoomResource::collection(RsRoom::all());
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
    public function show(RsRoom $rsRoom)
    {
        //
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
