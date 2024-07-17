<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $user = Auth::user();

        switch ($user->role_id) {
            case 7:
                return view('/academiaimpulsa/home');
            case 9:
                return view('/cacecobeirl/home');
            case 10:
                return view('/academiaimpulsa/administrador/estatus');
            default:
                return view('home');
        }
    }
}
