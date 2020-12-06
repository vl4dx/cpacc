<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;




use Illuminate\Support\Facades\Auth;
use App\Station;
use App\Estado;
use App\Cpacc;
use App\Channeltv;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $Channels=Channeltv::all();

        foreach ($Channels as $i=>$channel) {
            $Channels[$i]->numero=$channel->caracteristicastv->count();
            
        }


        $estados=Estado::all();

        foreach ($estados as $i=>$estado) {
            $estados[$i]->numero=$estado->caracteristicas->count();
            
        }

        $cpaccs = Cpacc::all();

        foreach ($cpaccs as $i=>$cpacc) {
            $cpaccs[$i]->numero=$cpacc->caracteristicascpacc->count();
            
        }

        return view('home',['channels'=>$Channels,'estados'=>$estados,'cpaccs'=>$cpaccs]);



    }
}
