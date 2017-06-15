<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Support\Util;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        session(['menusValidos'=>Util::regresaRutasValidas()]);

        $lstMenus = Util::generateMenu(auth()->user()->perfil_id);

        if(auth()->user()->isActive)
        {
            return view('home')->with('elmenu',['elmenu'=>$lstMenus]);    
        }else{
            return redirect('error');
        }

        
    }

    public function noAccess()
    {
        return view('noingresar')->with('elmenu',['elmenu'=>'']);
    }
}
