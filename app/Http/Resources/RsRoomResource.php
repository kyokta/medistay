<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class RsRoomResource extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'hospital_id' => $this->hospital_id,
            'kelas_kamar' => $this->kelas_kamar,
            'jumlah_kamar_terisi' => $this->jumlah_kamar_terisi,
            'jumlah_kamar_kosong' => $this->jumlah_kamar_kosong,
            'usia' => $this->usia,
            'hospital' => $this->whenLoaded(
                'hospital',
                function () {
                    return [
                        'id' => $this->hospital->id,
                        'name' => $this->hospital->name, // Assuming 'name' is a field in the Hospital model
                        // Add other fields as needed
                    ];
                }
            ),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
