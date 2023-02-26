<?php

namespace App\Http\Controllers;

use App\Models\Events;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Exception;

class DashboardEventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.event.index', [
            'data' => Events::where('is_deleted', 0)->latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.event.create', [
            'categories' => Events::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            "title" => 'required|max:255',
            'text_button' => 'required|',
            'image' => 'image|file|max:1024'
        ]);    
        
        $slug = str_replace(' ','-', strtolower($validatedData['title'])).'-'.rand(1000,9999);
        $validatedData['slug'] = $slug;
        
        if($request->file('image')){
            $validatedData['image'] = $request->file('image')->store('images');
        }

        Events::create($validatedData);
        return redirect('/dashboard/events')->with('success', 'news post has been added');
    }

    /**
     * Display the specified resource.
     */
    public function show(Events $events)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // if($events->user->id !== auth()->user()->id) {
        //     abort(403);
        // }
        $event = Events::findOrFail($id);
        return view('dashboard.event.edit', [
            'post' => $event
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
         try {
            $rules = [
                "title" => 'required|max:255',
                'image' => 'image|file|max:1024',                
                'text_button' => 'required|max:150',
            ];      
            
            $validatedData = $request->validate($rules);
    
            if($request->file('image')){
                if($request->image_old){
                    Storage::delete($request->image_old);
                }
                $validatedData['image'] = $request->file('image')->store('images');
            }    
            
            Events::where('id', $id)->update($validatedData);
            return redirect('/dashboard/events')->with('success', 'data has been updated');

        } catch (Exception $error) {
            // if error
            return response()->json([
                'message' => 'Something went Wrong!',
                'error' => $error
            ], 500);
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            // find data by id
            $item = Events::find($id);
           
            // if response success
            if ($item) {

                // deleted
                $item->is_deleted = 1;
                $item->update();
                
                if ($item) {
                    return redirect('/dashboard/events')->with('success', 'Data has been deleted');
                }  
            }else{
                return response()->json([
                    'message' => 'Data Empty'
                    ]
                );
            }
        } catch (Exception $error) {
            // if error success
            return response()->json([
                'message' => 'Something went Wrong!',
                'error' => $error
            ], 500);
        }
    }
    
}
