<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Vehicle;
use App\Maker;

use App\Http\Requests\CreateVehicleRequest;

class MakerVehiclesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        
        $maker = Maker::find($id);

        if (!$maker) 
        {
            return response()->json(['message' => 'This Maker does not exists', 'code' => 404], 404);
        }
        return response()->json(['data' => $maker->vehicles], 200);

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
    public function store(CreateVehicleRequest $request, $makerId)
    {
        $maker = Maker::find($makerId);
        if (!$maker) 
        {
            return response()->json(['message' => 'This Maker does not exists', 'code' => 404], 404);
        }

        $values = $request->all();

        $maker ->vehicles()->create($values);

        return response()->json(['massage' => 'The Vehicle was created'],201);
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, $vehicleId)
    {
        $maker = Maker::find($id);

        if (!$maker) 
        {
            return response()->json(['message' => 'This Maker does not exists', 'code' => 404], 404);
        }

        $vehicle = $maker->vehicles->find($vehicleId);

        if (!$vehicle) 
        {
            return response()->json(['message' => 'This Vehicle does not exists for this maker', 'code' => 404], 404);
        }

        return response()->json(['data' => $vehicle ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
