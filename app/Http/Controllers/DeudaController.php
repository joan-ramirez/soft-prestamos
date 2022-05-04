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
        $events = Deuda::get(['id','title', 'start'])->where('status', 0);

        $eventList = array();

        foreach ($events as $even) {
            array_push($eventList, (object) [
                'start' => $even['start'],
                'title' =>  $even['title'],
                'url' => route('show.cobro',['deuda' => $even['id']])
            ]);
        }

        return json_encode($eventList, true);

        // return response()->json(["events" => $eventList]);
    }

}
