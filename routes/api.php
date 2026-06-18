<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Event;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

use App\Http\Resources\EventResource;

// 1. Endpoint Get All Events (Format JSON:API)
Route::get('/events', function () {
    return EventResource::collection(Event::all());
});

// 2. Endpoint Get Event Detail (Format JSON:API)
Route::get('/events/{id}', function ($id) {
    $event = Event::find($id);
    if (!$event) {
        return response()->json([
            'errors' => [
                [
                    'status' => '404',
                    'title'  => 'Not Found',
                    'detail' => 'Event tidak ditemukan'
                ]
            ]
        ], 404);
    }
    
    return new EventResource($event);
});

// 3. Endpoint Statistik
Route::get('/stats', function () {
    return response()->json([
        'success' => true,
        'message' => 'Data statistik berhasil diambil',
        'data' => [
            'total_events' => Event::count(),
            'total_kapasitas' => (int) Event::sum('kapasitas')
        ]
    ]);
});
