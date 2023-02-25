<?php

namespace App\Http\Controllers;

use App\Models\UsersRegistration;
use Illuminate\Http\Request;

class UserRegistrationsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // echo 'create'; die;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            "email" => 'required',
            "name" => 'required',
            "street_name" => 'required',
            "phone" => 'required',
            "house_no" => 'required',
            "postal_code" => 'required',
            "unit_number" => 'required',
        ]);
        UsersRegistration::create($validatedData);
        return redirect('/success');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
