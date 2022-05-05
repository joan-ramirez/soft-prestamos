<?php

namespace App\Http\Controllers;

use App\Models\Deuda;
use Illuminate\Http\Request;

class DeudaController extends Controller
{
    /*public function __construct()
    {
        $this->middleware('auth');
    }*/

    public function index()
    {
        $events = Deuda::where('status', 0)->get(['id', 'title', 'start']);
   
        $eventList = array();

        foreach ($events as $even) {
            array_push($eventList, (object) [
                'start' => $even['start'],
                'title' =>  $even['title'],
                'url' => route('show.cobro', ['deuda' => $even['id']])
            ]);
        }

        
        return json_encode($eventList, true);

        // return response()->json(["events" => $eventList]);
    }


    public function update(Deuda $deuda)
    {
        // Marcar cuota  como pagada
        $deuda->update([
            'status' => 1,
        ]);
        
        return back();
    }
}
