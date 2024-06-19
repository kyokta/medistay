<?php

namespace App\Http\Controllers;

use App\Models\Hospital;
use App\Http\Requests\StoreHospitalRequest;
use App\Http\Requests\UpdateHospitalRequest;

class HospitalController extends Controller
{

    public function index()
    {
        $hospitals = Hospital::all();
        return view('/homepage', compact('hospitals'));
    }

    public function create()
    {
    }


    public function store(StoreHospitalRequest $request)
    {
    }


    public function show(Hospital $hospital)
    {
    }


    public function edit(Hospital $hospital)
    {
    }


    public function update(UpdateHospitalRequest $request, Hospital $hospital)
    {
    }

    public function destroy(Hospital $hospital)
    {
    }
}
