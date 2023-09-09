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
                ->addColumn('std_gender', function ($students) {
                    return $students->std_gender == 1 ? 'Laki-Laki' : 'Perempuan';
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
            'unique' => 'Nisn sudah dipakai!',
            'required' => 'Silahkan isi kolom ini!'
        ];
        $validatedData = $request->validate([
            'std_nisn' => 'required|unique:students',
            'std_name' => 'required',
            'std_religion' => 'required',
            'std_gender' => 'required',
            'std_place_of_birth' => 'required',
            'std_date_of_birth' => 'required',
            'std_student_phone_number' => 'required',
            'std_parents_name' => 'required',
            'std_parents_phone' => 'required',
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
    public function show($student)
    {
        $students = Students::where('std_id', $student)->first();
        //  dd($students->std_id);
        // dd($students);
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
    public function edit($students)
    {
        $students = Students::where('std_id', $students)
                        ->first();

        return view('admin.students.edit',[
            'students' => $students
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Students  $students
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $students_id)
    {
       
        $messages = [
            'required' => 'Silahkan isi kolom ini!',
            'unique' => 'Nis sudah dipakai!'
        ];

       
        $student = $request->validate([
            'std_nisn' => 'required|unique:students',
            'std_name' => 'required',
            'std_religion' => 'required',
            'std_gender' => 'required',
            'std_place_of_birth' => 'required',
            'std_date_of_birth' => 'required',
            'std_student_phone_number' => 'required',
            'std_parents_name' => 'required',
            'std_parents_phone' => 'required',
            'std_address' => 'required'
        ], $messages);
        // dd($request);


        $update = Students::where('std_id', $students_id)->first();
        $update->std_nisn = $request->std_nisn;
        $update->std_name = $request->std_name;
        $update->std_religion = $request->std_religion;
        $update->std_gender = $request->std_gender;
        $update->std_place_of_birth = $request->std_place_of_birth;
        $update->std_date_of_birth = $request->std_date_of_birth;
        $update->std_student_phone_number = $request->std_student_phone_number;
        $update->std_parents_name = $request->std_parents_name;
        $update->std_parents_phone = $request->std_parents_phone;
        $update->std_address = $request->std_address;
        $update['std_updated_by'] = auth()->user()->usr_id;       
        $update->save();

        return redirect('/admin/students/' . $students_id)->with('success', 'Siswa telah diperbarui!');
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
