<?php

namespace App\Http\Controllers;

use App\Models\Events;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator;
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
        // print_r('tambah ya'); die;
        $validatedData = $request->validate([
            "title" => 'required|max:255',
            'slug' => 'required|unique:events',
            'text_button' => 'required|',
            // 'image' => 'image|file|max:1024'
        ]);    
        
        // if($request->file('image')){
        //     $validatedData['image'] = $request->file('image')->store('post-images');
        // }

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
            // validation input
            $validator = Validator::make( $request->all(),[
                "title" => 'required|max:255',
                'text_button' => 'required|',
                // 'image' => 'image|file|max:1024'
            ]);

            // validation errors
            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'validation error',
                    'errors' => $validator->errors()
                ], 401); 
            }
            
            // find data by id
            $item = Events::findOrFail($id);
            
            // save data
            $item->update($request->all());

            // if success save data
            if ($item) {
                return redirect('/dashboard/events')->with('success', 'Data has been updated');
            }  
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
