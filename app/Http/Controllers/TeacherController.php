<?php

namespace App\Http\Controllers;

use App\Models\Teachers;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Yajra\DataTables\DataTables;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
          if (request()->ajax()) {
            return DataTables::of(Teachers::query())
                ->addIndexColumn()
                ->addColumn('status', function ($teachers) {
                    return $teachers->tcr_status == 1 ? 'Aktif' : 'Tidak aktif';
                })
                ->make(true);
        }
        
        $teachers = teachers::all();
        
        return view('admin.teachers.index', ['teachers' => $teachers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.teachers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $message = [
            'unique' => 'NUPTK sudah dipakai!',
            'required' => 'Silahkan isi kolom ini!'
        ];
        $validatedData = $request->validate([
            'tcr_NUPTK' => 'required|unique:teachers',
            'tcr_name' => 'required',
            'tcr_religion' => 'required',
            'tcr_gender' => 'required',
            'tcr_place_of_birth' => 'required',
            'tcr_date_of_birth' => 'required',
            'tcr_subjects' => 'required',
            'tcr_number_phone' => 'required',
            'tcr_address' => 'required'
        ],$message
    );
        $validatedData['tcr_created_by'] = auth()->user()->usr_id;

        // insert data ke database
        Teachers::create($validatedData);

        return redirect('/admin/teachers')->with('success', 'Guru baru telah ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Teachers  $teachers
     * @return \Illuminate\Http\Response
     */
    public function show($teacher)
    {
        $teachers = Teachers::where('tcr_id', $teacher)->first();
        return view('admin.teachers.show', [
            'teachers' => $teachers,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Teachers  $teachers
     * @return \Illuminate\Http\Response
     */
    public function edit(Teachers $teachers)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Teachers  $teachers
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Teachers $teachers)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Teachers  $teachers
     * @return \Illuminate\Http\Response
     */
    public function destroy(Teachers $teachers)
    {
        //
    }

    public function switch($id)
    {
        $status = Teachers::where('tcr_id', $id)->first(); 
        if($status->tcr_status == 1){
           $status->tcr_status = 0; 
           $status->save();
        return redirect('/admin/teachers')->with('success', 'Guru telah dinonaktifkan!');
        }else{
            $status->tcr_status = 1;
            $status->save();
            return redirect('/admin/teachers')->with('success', 'Guru berhhasil diaktifkan!');  
        }
    }
}
