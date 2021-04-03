<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'telpon' => 'required|max:12',
            'address' => 'required'
        ]);

        $data = $request->all();
        $events = Event::create($data);
        return ResponseFormatter::success($events, 'Data berhasil ditambah!');
    }
}
