<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Maker;
use App\Http\Requests\CreateMakerRequest;

class MakerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $makers = Maker::all();

        return response()->json(['data' => $makers], 200);
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
    public function store(CreateMakerRequest $request)
    {
        
        $values = $request->only(['name', 'phone']);

        Maker::create($values);

        return response()->json(['message' => 'Maker Correctly added'],201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $maker = Maker::find($id);

        if (!$maker) 
        {
            return response()->json(['message' => 'This Maker does not exists', 'code' => 404], 404);
        }
        return response()->json(['data' => $maker], 200);
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
    public function update(CreateMakerRequest $request, $id)
    {
        $maker = Maker::find($id);
        
        if (!$maker) 
        {
            return response()->json(['message' => 'This Maker does not exists', 'code' => 404], 404);
        }

        $name = $request->get('name');
        $phone = $request->get('phone');

        $maker->name = $name;
        $maker->phone = $phone;

        $maker->save();
        return response()->json(['message'=> 'The maker has been updated'], 200);
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
