<?php

namespace App\Http\Controllers;


class stop extends Controller
{
    function index(){
        $data="stop";
        return view('auth.stop');
    }
}