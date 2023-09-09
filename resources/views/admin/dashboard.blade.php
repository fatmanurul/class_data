@extends('admin.layouts.main')
@section('title')
Halaman Dashboard
@endsection
@section('container')

 <!-- Boostrap Icons -->
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="h2">Dasbor</h1>
        <!-- <small>Selamat Datang {{auth()->user()->usr_name}}</small> -->
      </div>
<div class="container">
    <div class="row g-5">
          <div class="col-4">
              <div style=" background-color:RGB(237, 164, 76);padding: 10px; text-align:center;">
                <h1 style="color:white;">{{$students_count}}</h1>
                <p style = "Times; color:white;">Jumlah Siswa</p>
              </div>
           </div>
        <div class="col-4">
              <div style=" background-color:RGB(93, 148, 227);padding: 10px; text-align:center;">
                <h1 style="color:white;">{{$teachers_count}}</h1>
                <p style = "Times; color:white;">Jumlah Guru</p>
               </div>
        </div>
        <div class="col-4">
              <div style=" background-color:RGB(154, 201, 105);padding: 10px; text-align:center;">
                <h1 style="color:white;">{{$classes_count}}</h1>
                <p style = "Times; color:white;">Jumlah Kelas</p>
              </div>
        </div>
    </div>
</div>

@endsection