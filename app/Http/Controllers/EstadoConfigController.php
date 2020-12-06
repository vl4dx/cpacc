<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use Illuminate\Support\Facades\Auth;
use App\Station;
use App\Estado;
use App\Cpacc;
use App\Color;

class EstadoConfigController extends Controller
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
        if (Auth::user()->cargo == 'admin') {
        
        $estados=Estado::all();
        return view('estadoconfig.index',['estados'=>$estados]);

        }            
        
        else  {
            abort(403, 'No tiene acceso');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $colors=Color::all();

        if (Auth::user()->cargo == 'admin' || Auth::user()->cargo == 'editor' )
        {
            return view('estadoconfig.create',['colors'=>$colors]);
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
            $estado = New Estado;

            $estado->nombre = request()->nombre;
            $estado->color = request()->color;


            $estado->save();

            return redirect('/estadoconfig');
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
        //
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
        $colors= Color::all();
        $estado = Estado::find($id);

        return view('estadoconfig.edit',['colors'=>$colors,'estado'=>$estado]);
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

        $estado = Estado::find($id);
        

        //($request);

        $estado->nombre = request()->nombre;
        $estado->color = request()->color;

        
         $estado->save();

    

        return redirect('/estadoconfig');
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
