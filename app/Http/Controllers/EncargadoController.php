<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Station;
use App\Estado;
use App\Cpacc;
use App\Encargado;


class EncargadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        return $id;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {

    if (Auth::user()->cargo == 'admin' )
        {

            //dd($request->all());
        $encargado = New Encargado;
        $encargado->cpacc_id = $id;
        $encargado->nombre = request()->nombre;
        $encargado->cargo = request()->cargo;
        $encargado->celular = request()->celular;

        

        $encargado->save();
            

        return redirect('/encargado/'.$id);
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
        return view('encargado.show',['station'=>$station]);
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
        
        $encargado = Encargado::find($id);
        

        return view('encargado.edit',['encargado'=>$encargado]);
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


        $encargado = Encargado::find($id);
        

        //($request);

        $encargado->nombre = request()->nombre;
        $encargado->cargo = request()->cargo;
        $encargado->celular = request()->celular;


        
         $encargado->save();

    

        return redirect('/encargado/'.$encargado->cpacc_id)->with('success', 'Cambios Guardados en el ID:'.$encargado->id);


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $contact = Encargado::find($id);
        $cpacc=$contact->cpacc_id;
        $contact->delete();

        //dd($contact);
        return redirect('/encargado/'.$cpacc)->with('success', 'Contact deleted!');
    }
}
