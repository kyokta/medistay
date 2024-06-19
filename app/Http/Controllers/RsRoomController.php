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
    public function index(Request $request)
    {
        $query = RsRoom::query();

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
            $query->whereHas('hospital', function ($q) use ($request) {
                $q->where('nama_rumah_sakit', $request->input('hospital'));
            });
        }

        $rooms = $query->get();

        return response()->json($rooms);
    }

    public function create()
    {
        //
    }

    public function store(StoreRsRoomRequest $request)
    {
        //
    }

    public function show($id)
    {
        $rsRooms = RsRoom::where('hospital_id', $id)->get();

        $total = $rsRooms->sum('jumlah_kamar_terisi') + $rsRooms->sum('jumlah_kamar_kosong');
        $terpakai = $rsRooms->sum('jumlah_kamar_terisi');
        $kosong = $rsRooms->sum('jumlah_kamar_kosong');

        return response()->json([
            'terpakai' => $terpakai,
            'kosong' => $kosong,
            'total' => $total
        ]);
    }

    public function getDropdownData($hospitalId)
    {
        // Ambil data untuk dropdown kelas, spesialisasi, dan usia dari database
        $kelas = RsRoom::where('hospital_id', $hospitalId)->distinct()->pluck('kelas_kamar')->toArray();
        $spesialisasi = RsRoom::where('hospital_id', $hospitalId)->distinct()->pluck('spesialisasi')->toArray();
        $usia = RsRoom::where('hospital_id', $hospitalId)->distinct()->pluck('usia')->toArray();

        return response()->json([
            'kelas' => $kelas,
            'spesialisasi' => $spesialisasi,
            'usia' => $usia,
        ]);
    }

    public function getRoomsByHospital($hospitalId)
    {
        $rooms = RsRoom::where('hospital_id', $hospitalId)
                     ->get(['kelas_kamar', 'spesialisasi', 'usia', 'jumlah_kamar_terisi', 'jumlah_kamar_kosong']);
        
        return response()->json($rooms);
    }


    public function edit(RsRoom $rsRoom)
    {
        //
    }

    public function update(UpdateRsRoomRequest $request, RsRoom $rsRoom)
    {
        //
    }

    public function destroy(RsRoom $rsRoom)
    {
        //
    }
}
