<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
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
        
        $users=User::all();
        return view('users.index',['users'=>$users]);

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
        if (Auth::user()->cargo == 'admin') {
        
        
        return view('users.create');

        }            
        
        else  {
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
        if (Auth::user()->cargo == 'admin' )
        {
            $user = New User;
        $user->email = request()->email;
        $user->name = request()->nombre;
        $user->password = Hash::make(request()->password);

        

        $user->save();
            
            

            $user->save();

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
        if (Auth::user()->cargo == 'admin')
        {

        $user = User::find($id);
        return view('users.edit',['user'=>$user]);

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
        if (Auth::user()->cargo == 'admin')
        {

            $user = User::find($id);

            if(request()->estado == 1)
            {
                $user->cargo = 'admin';
            }
            else
            {
                if (request()->estado == 3) 
                {
                    $user->cargo = 'editor';
                }

                else
                {
                    $user->cargo = 'user';
                }
            }
            
            $user->save();
            return redirect('/users');

        }            
        else 
        {
            abort(403, 'No tiene acceso');
        }
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
