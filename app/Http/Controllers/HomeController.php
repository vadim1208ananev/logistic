<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Quotation;
use App\Purposal;
use Auth;
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
    public function notifications(){

         $role= Auth::user()->role;
        // $even = Quotation::where('created_at', '>=', date('Y-m-d'))->orderBy('created_at')->count();
        // print_r($even); exit();
        if($role=="vendor"||$role=="admin")
        {
           echo $count=Quotation::whereDate('created_at','=',date('Y-m-d'))->count();
        }
        // else
        // {
        //   echo $count=Purposal::whereDate('updated_at','=',date('Y-m-d'))->where('user_id','=',Auth::user()->id)->count();
            
        // }
    }
}