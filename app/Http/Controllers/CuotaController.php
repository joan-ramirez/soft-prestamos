<?php

namespace App\Http\Controllers;

use App\Models\Cuota;

class CuotaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $events = Cuota::where('status', 0)->get(['id', 'title', 'start']);

        $eventList = array();

        foreach ($events as $even) {
            array_push($eventList, (object) [
                'start' => $even['start'],
                'title' =>  $even['title'],
                'url' => route('show.cobro', ['cuota' => $even['id']])
            ]);
        }

        return json_encode($eventList, true);

        // return response()->json(["events" => $eventList]);
    }


    public function update(Cuota $cuota)
    {
        // Marcar cuota  como pagada
        $cuota->update([
            'status' => 1,
        ]);

        return back();
    }
}
