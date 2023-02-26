<?php

namespace App\Http\Controllers;

use App\Models\Events;
use Illuminate\Console\Scheduling\Event;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
    public function index()
    {
        return view('homepage', [
            'events' => Events::where('is_deleted', 0)->latest()->get()
        ]);
    }
    
}
