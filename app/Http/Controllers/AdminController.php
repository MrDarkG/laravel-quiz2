<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Airport;
use App\Flight;
class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('CheckAdmin');
    }
    #airpots forms
    public function index()
    {
        return view("admin.airports.index",[
            "airports"=>Airport::get(),
            "flights"=>Flight::get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.airports.create");
    }

    public function createflight()
    {
        return view("admin.flights.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        #code   name    country     gmt 
        Airport::create(
            $this->validate($request,[
                "name"=>"required",
                "code"=>"required",
                "country"=>"required",
                "gmt"=>"required",
            ])
        );
        return redirect()->route("adminindex");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view("admin.airports.edit",
            ["ap"=>Airport::where("a_id",$id)->firstOrFail()]
        );


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        $this->validate($request,["id"=>"required|numeric"]);
        $air=Airport::where("a_id",$request->input("id"))->
        update(
            $this->validate($request,[
                "name"=>"required",
                "code"=>"required",
                "country"=>"required",
                "gmt"=>"required",
            ])
        );
        return redirect()->route("adminindex");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $this->validate($request,["id"=>"required|numeric"]);

        Airport::where("a_id",$request->input("id"))->delete();
        return back();
    }



     public function createflights()
    {
        return view("admin.flights.create");
    }

   

    public function storeflight(Request $request)
    {
        
        Flight::create(
            $this->validate($request,[
                "fly_from"=>"required|numeric",
                "fly_to"=>"required|numeric",
                "code"=>"required",
                "fly_from_time"=>"required",
                "fly_to_time"=>"required",
            ])
        );
        return redirect()->route("adminindex");
    }
    public function editflight($id)
    {
        return view("admin.flights.edit",
            ["fl"=>Flight::where("f_id",$id)->firstOrFail()]
        );


    }
    public function updateflight(Request $request)
    {

        $this->validate($request,["id"=>"required|numeric"]);
        $air=Flight::where("f_id",$request->input("id"))->
        update(
            $this->validate($request,[
                "fly_from"=>"required|numeric",
                "fly_to"=>"required|numeric",
                "code"=>"required",
                "fly_from_time"=>"required",
                "fly_to_time"=>"required",
            ])
        );
        return redirect()->route("adminindex");
    }
    public function destroyflight(Request $request)
    {
        $this->validate($request,["id"=>"required|numeric"]);

        Flight::where("f_id",$request->input("id"))->delete();
        return back();
    }

}

