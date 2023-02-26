<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DetailController extends Controller
{
    public function index(){
        return view('success_page');
    }

    public function show(){
        return view('detail');
    }
} 
