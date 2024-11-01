<?php

namespace App\Http\Controllers;

use App\Models\Manage;
use Illuminate\Http\Request;

class ManageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Manage::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\manage  $manage
     * @return \Illuminate\Http\Response
     */
    public function show(manage $manage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\manage  $manage
     * @return \Illuminate\Http\Response
     */
    public function edit(manage $manage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\manage  $manage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)  // Make sure to include $id in the function parameters
    {
        // Find the Manage record by ID
        $manage = Manage::find($id);

        if (!$manage) {
            return response()->json(['message' => 'Record Not Found'], 404);
        }

        // Validate request data
        $request->validate([
            'status' => 'required|string',
        ]);

        // Update the status based on the request input
        $manage->status = $request->input('status');

        // Save the changes to the database
        if ($manage->save()) {
            return response()->json(['message' => 'Status Updated Successfully'], 200);
        } else {
            return response()->json(['message' => 'Failed to Update Status'], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\manage  $manage
     * @return \Illuminate\Http\Response
     */
    public function destroy(manage $manage)
    {
        $manage = Manage::find($id);

        if(!$manage){
            return response()->json(['message' => 'Record Not Found'], 404);
        }
    }
}
