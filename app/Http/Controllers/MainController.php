<?php

namespace App\Http\Controllers;

use App\Main;
use Illuminate\Http\Request;

class MainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mains = Main::oldest()->get();
        return response()->json($mains,200);
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
        $this->validate($request,[

            'text_data' => 'required',
            'number_data' => 'required',
            'date_data' => 'required',
            'textarea_data' => 'required'
        ]);

        $main = Main::create([

            'contact_id' => $request->contact_id,
            'text_data' => $request->text_data,
            'number_data' => $request->number_data,
            'date_data' => $request->date_data,
            'textarea_data' => $request->textarea_data
        ]);

        return response()->json('success',200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Main  $main
     * @return \Illuminate\Http\Response
     */
    public function show(Main $main)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Main  $main
     * @return \Illuminate\Http\Response
     */
    public function edit(Main $main)
    {
        if($main){

            return response()->json($main, 200);
        }else{

            return response()->json('failed', 404);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Main  $main
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Main $main)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Main  $main
     * @return \Illuminate\Http\Response
     */
    public function destroy(Main $main)
    {
        //
    }
}
