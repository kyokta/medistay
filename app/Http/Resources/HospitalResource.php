<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class HospitalResource extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'nama_rumah_sakit' => $this->nama_rumah_sakit,
            'alamat_rumah_sakit' => $this->alamat_rumah_sakit,
            'jumlah_kamar' => $this->jumlah_kamar,
            'alamat_email' => $this->alamat_email,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
