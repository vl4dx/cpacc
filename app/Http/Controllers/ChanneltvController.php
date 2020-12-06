<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use Illuminate\Support\Facades\Auth;
use App\Station;
use App\Estado;
use App\Cpacc;
use App\Channeltv;

class ChanneltvController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $Channels=Channeltv::all();

        

        foreach ($Channels as $i=>$channel) {
            $Channels[$i]->numero=$channel->caracteristicastv->count();
            
        }
        return view('channeltv.index',['channels'=>$Channels]);
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Channels= Channeltv::all();

        $Estaciones=Channeltv::find($id);
        
        $stations=$Estaciones->caracteristicastv;
        
        //dd($stations[1]->estadoModel->nombre);
        //dd($estacionesOperativas);
        //$station = Station::find($id);
        return view('channeltv.show',['stations'=>$stations,'canales'=>$Channels]);
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
