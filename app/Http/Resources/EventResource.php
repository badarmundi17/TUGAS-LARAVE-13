<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EventResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'type' => 'events',
            'id' => (string) $this->id,
            'attributes' => [
                'nama' => $this->nama_event,
                'deskripsi' => $this->deskripsi,
                'tanggal_pelaksanaan' => $this->tanggal,
                'lokasi' => $this->lokasi,
                'kapasitas' => $this->kapasitas,
                'harga' => $this->harga_tiket,
            ],
            'links' => [
                'self' => route('events.show', ['event' => $this->id] ?? '') // Contoh jika ada rute show
            ]
        ];
    }
}
