<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Classes;
use App\Models\Students;
use App\Models\Teachers;

class DashboardController extends Controller
{
    public function index(){
        $classes_count = Classes::all()->count();
        $students_count = Students::all()->count();
        $teachers_count = Teachers::all()->count();
        return view('admin.dashboard',[
            'classes_count' => $classes_count,
            'students_count' => $students_count,
            'teachers_count' => $teachers_count,
        ]);
    }
}
