<?php

namespace App\Http\Controllers;

use App\Models\Deuda;
use Illuminate\Http\Request;

class DeudaController extends Controller
{
    public function index()
    {
        $eventList = Deuda::get(['title', 'start']);
        return response()->json(["events" => $eventList]);
    }
}
