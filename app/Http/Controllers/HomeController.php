<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

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
        return view('home');
    }

    public function views($view)
    {
        if ($view === 'dashboard.users.view') { 
            $data = User::paginate(100);
            
            return view($view, compact('data'));

        }else{
            return view($view);
        }
    }
}
