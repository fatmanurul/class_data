<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CobaController extends Controller
{
    public function index(){
        $gender = 2;
        if($gender == 1){
          return "perempuan";
        }elseif($gender == 2){
            return "laki-laki";
        }else{
            return "secret";
        }
    }
   
}
