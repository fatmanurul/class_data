<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Students;
use Illuminate\Validation\Rule;
use Yajra\DataTables\DataTables;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            return DataTables::of(Students::query())
                ->addIndexColumn()
                ->addColumn('status', function ($students) {
                    return $students->std_status == 1 ? 'Aktif' : 'Tidak aktif';
                })
                ->make(true);
     
        }
        
        $students = Students::all();
        
        return view('admin.students.index', ['students' => $students]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.students.create');

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
            'unique' => 'Nama sudah dipakai!',
            'required' => 'Silahkan isi kolom ini!'
        ];
        $validatedData = $request->validate([
            'std_nisn' => 'required',
            'std_name' => 'required',
            'std_religion' => 'required',
            'std_gender' => 'required',
            'std_place_of_birth' => 'required',
            'std_date_of_birth' => 'required',
            'std_student_phone_number' => 'required',
            'std_parents_name' => 'required',
            'std_parents_phone_name' => 'required',
            'std_address' => 'required'
        ],$message
    );
        $validatedData['std_created_by'] = auth()->user()->usr_id;

        // insert data ke database
        Students::create($validatedData);

        return redirect('/admin/students')->with('success', 'Siswa baru telah ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Students  $students
     * @return \Illuminate\Http\Response
     */
    public function show(Students $students)
    {
        // dd($students);
        // dd($students->std_id);
        $students = Students::where('std_id', $students->std_id)->first();

        return view('admin.students.show', [
            'students' => $students,
        ]);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Students  $students
     * @return \Illuminate\Http\Response
     */
    public function edit(Students $students)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Students  $students
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Students $students)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Students  $students
     * @return \Illuminate\Http\Response
     */
    public function destroy(Students $students)
    {
        //
    }

    public function switch($id)
    {
        $status = Students::where('std_id', $id)->first();
        if($status->std_status == 1){ 
           $status->std_status = 0;  
           $status->save();
        return redirect('/admin/students')->with('success', 'Siswa telah dinonaktifkan!');
        }else{
            $status->std_status = 1;
            $status->save();
            return redirect('/admin/students')->with('success', 'Siswa berhhasil diaktifkan!');  
        }
    }
}
