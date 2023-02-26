<?php

namespace App\Http\Controllers;

use App\Models\Events;
use Illuminate\Http\Request;

class DetailController extends Controller
{
    public function index(){
        return view('success_page');
    }

    public function show($slug){
        return view('detail', [
            'events' => Events::where('slug', $slug)->latest()->get()
        ]);
    }
} 
