 <!-- Boostrap Icons -->
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
 <!-- cara menyambungkan dengan class induk/ main -->
    @extends('admin.layouts.main')
    @section('title')
    Halaman Detail Siswa
    @endsection
<!-- memberitahu kalo ini adalah sebuah section yang bernama container -->
@section('container')
<style>
  th, td {
    vertical-align: top; /* Ini yang membuat teks di atas sel */
  }
</style>
<div class="">
<div class="card mt-4">
	<div class="card-header">
		<h3>Detail Siswa</h3>
	</div>

      @if(session()->has('success'))
          <div class="alert alert-success mt-4" role="alert" style="margin: 20px;">
            {{ session('success') }}
        </div>
      @endif
 
	<div class="card-body">
        <table cellpadding="12">
            <tr>
                <th style="vertical-align: top;"><small>Nuptk</small></th>
                <td><small>:</small></td>
                <td><small>{{$teachers->tcr_NUPTK}}</small></td>
            </tr>
            <tr>
                <th style="vertical-align: top;"><small>Nama Guru</small></th>
                <td><small>:</small></td>
                <td><small>{{$teachers->tcr_name}}</small></td>
            </tr>
            <tr>
                <th style="vertical-align: top;"><small>Agama</small></th>
                <td><small>:</small></td>
                <td><small>{{ $teachers->tcr_religion }}</small></td>
            </tr>
            <tr>
                <th style="vertical-align: top;"><small>Jenis Kelamin</small></th>
                <td><small>:</small></td>
                <td><small>{{ $teachers->tcr_gender }}</small></td>
            </tr>
            <tr>
                <th style="vertical-align: top;"><small>Tempat Lahir</small></th>
                <td><small>:</small></td>
                <td><small>{{ $teachers->tcr_place_of_birth }}</small></td>
            </tr>
            <tr>
                <th style="vertical-align: top;"><small>Tanggal Lahir</small></th>
                <td><small>:</small></td>
                <td><small>{{ $teachers->tcr_date_of_birth }}</small></td>
            </tr>
            <tr>
                <th style="vertical-align: top;"><small>Mata Pelajaran</small></th>
                <td><small>:</small></td>
                <td><small>{{ $teachers->tcr_subjects }}</small></td>
            </tr>
            <tr>
                <th style="vertical-align: top;"><small>Nomor Telepon</small></th>
                <td><small>:</small></td>
                <td><small>{{ $teachers->tcr_number_phone }}</small></td>
            </tr>
            <tr>
                <th style="vertical-align: top;"><small>Alamat</small></th>
                <td><small>:</small></td>
                <td><small>{{ $teachers->tcr_address }}</small></td>
            </tr>
           
        </table>
                <a style="color: white;" href="/admin/teachers" class="btn btn-secondary">kembali</a>
                <a style="color: white;" href="/admin/teachers/{{ $teachers->tcr_id}}/edit" class="btn btn-warning"><span data-feather="edit"></span>ubah</a>
	</div>
</div>
 </div>
 </div>
  
@endsection


  