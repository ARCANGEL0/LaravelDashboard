<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
        $data =  DB::table('propostas')->get();
        $clientes = DB::table('clientes')->get();
        return view('home', compact(('data'),('clientes')));
 
    }
    public function propostas() 
    {
        $data =  DB::table('propostas')->get();
        $clientes = DB::table('clientes')->get();
        return view('propostas', compact(('data'),('clientes')));
    }
    public function clientes()
    {
        $data =  DB::table('clientes')->get();
        return view('clients', compact(('data')));
    }
}
