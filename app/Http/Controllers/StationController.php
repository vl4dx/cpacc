<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Station;
use App\Estado;
use App\Cpacc;

class StationController extends Controller
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
        $stations=Station::all();
        return view('station.indexdiv',['stations'=>$stations]); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::user()->cargo == 'admin' || Auth::user()->cargo == 'editor' )
        {
            return view('station.create');
        }            
        
        else 
        {
            abort(403, 'No tiene acceso');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Auth::user()->cargo == 'admin' || Auth::user()->cargo == 'editor' )
        {
            $station = New Station;

            $station->region = request()->region;
            $station->provincia = request()->provincia;
            $station->distrito = request()->distrito;
            $station->localidad = request()->localidad;
            
            

            $station->save();

            return redirect('/station');
        }            
        
        else 
        {
            abort(403, 'No tiene acceso');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $station = Station::find($id);
        //dd($station->listaEncargadosModel);
        return view('station.show',['station'=>$station]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Auth::user()->cargo == 'admin' || Auth::user()->cargo == 'editor' )
        {
        $estados= Estado::all();
        $localidad = Station::find($id);
        $cpaccs= Cpacc::all();

        return view('station.edit',['localidad'=>$localidad,'estados'=>$estados,'cpaccs'=>$cpaccs]);
        }            
        
        else 
        {
            abort(403, 'No tiene acceso');
        }
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
        $station = Station::find($id);
        

        //($request);

        $station->region = request()->region;
        $station->provincia = request()->provincia;
        $station->distrito = request()->distrito;
        $station->localidad = request()->localidad;

        $station->channeltv_id =  request()->tv_canal;
        $station->frecuencyfm_id =  request()->fm_frecuencia;

        $station->cpacc_id= request()->cpacc;
        $station->observacion =  request()->observacion;
        $station->requerimiento =  request()->requerimiento;
        $station->celular = request()->celular;
        $station->encargado = request()->encargado;
        //$station->fecha=request()->date;
        $station->estado_id =  request()->estado;
        
         $station->save();

    

        return redirect('/station/'.$id)->with('success', 'Cambios Guardados');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $contact = Station::find($id);
        
        $contact->delete();

        //dd($contact);
        return redirect('/station')->with('success', 'Contact deleted!');
    }
}
