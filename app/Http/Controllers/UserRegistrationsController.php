<?php

namespace App\Http\Controllers;

use App\Mail\SendMail;
use App\Models\UsersRegistration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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
        $validateData = $request->validate([
            'name'      => 'required|max:255|unique:users',
            'email'     => 'required|email|max:255|unique:users_registrations,email',
            "street_name" => 'required',
            "phone" => 'required',
            "house_no" => 'required',
            "postal_code" => 'required',
            "unit_number" => 'required',         
        ]);
        UsersRegistration::create($validateData);

        //send email when success registred
        Mail::to($validateData['email'])
            ->send(new SendMail($validateData));

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
