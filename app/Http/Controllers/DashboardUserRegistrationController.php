<?php

namespace App\Http\Controllers;

use App\Models\UsersRegistration;
use Illuminate\Http\Request;

class DashboardUserRegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.user_register.index', [
            'users_registers' => UsersRegistration::latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(UserRegistration $userRegistration)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UserRegistration $userRegistration)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, UserRegistration $userRegistration)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UserRegistration $userRegistration)
    {
        //
    }
}
