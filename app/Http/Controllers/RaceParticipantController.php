<?php

namespace App\Http\Controllers;

use App\Models\RaceParticipant;
use Illuminate\Http\Request;

class RaceParticipantController extends Controller
{
    public function index()
    {                
        $registrations = RaceParticipant::with('user')
                ->with('race')
                ->get();
        return view('registrations.index', compact('registrations'));
    }
}
