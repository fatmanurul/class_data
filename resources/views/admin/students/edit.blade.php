@extends('admin.layouts.main')
@section('title')
Halaman Ubah Siswa
@endsection
@section('container')
 
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Ubah</h1>
      </div>
      @if(session()->has('error'))
          <div class="alert alert-danger" role="alert">
            {{ session('error') }}
        </div>
      @endif
  
      @if(session()->has('success'))
          <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
      @endif

<form method="post" action="/admin/students/{{$students->std_id}}" class="mb-5" enctype="multipart/form-data" data-parsley-validate>
@method('put')
    @csrf
  <div class="mb-3">
    <label for="std_nisn" class="form-label">Nisn</label>
    <input type="number" class="form-control @error ('std_nisn') is-invalid @enderror" id="std_nisn" name="std_nisn" autofocus value="{{old('std_nisn', $students->std_nisn)}}" required data-parsley-inputs data-parsley-trigger="keyup">
    <!-- pesan error -->
    @error('std_nisn')
    <div class="invalid-feedback">
     {{ $message }}
    </div>
    @enderror
  </div>

  <div class="mb-3">
    <label for="std_name" class="form-label">Nama Siswa</label>
    <input type="text" class="form-control @error ('std_name') is-invalid @enderror" id="std_name" name="std_name" autofocus value="{{old('std_name', $students->std_name)}}" required data-parsley-inputs data-parsley-trigger="keyup">
    <!-- pesan error -->
    @error('std_name')
    <div class="invalid-feedback">
     {{ $message }}
    </div>
    @enderror
  </div>

  <div class="mb-3">
    <label for="std_name" class="form-label">Agama</label>
    <select class="form-select" name="std_religion" required data-parsley-inputs data-parsley-trigger="keyup">
    <option value="">Pilih Agama</option>
    <option value="1" @if(old('std_religion', $students->std_religion) == 1) selected @endif>Islam</option>
    <option value="2" @if(old('std_religion', $students->std_religion) == 2) selected @endif>Kristen</option>
    <option value="3" @if(old('std_religion', $students->std_religion) == 3) selected @endif>Katolik</option>
    <option value="4" @if(old('std_religion', $students->std_religion) == 4) selected @endif>Hindu</option>
    <option value="5" @if(old('std_religion', $students->std_religion) == 5) selected @endif>Budha</option>
  </select>
  </div>



  <div class="mb-3">
    <label for="std_gender" class="form-label">Jenis Kelamin</label>
    <select class="form-select" name="std_gender" required data-parsley-inputs data-parsley-trigger="keyup">
    <option value="">Pilih Jenis Kelamin</option>
    <option value="1" @if(old('std_gender', $students->std_gender) == 1) selected @endif>Laki-Laki</option>
    <option value="2" @if(old('std_gender', $students->std_gender) == 2) selected @endif>Perempuan</option>
  </select>
  </div>

  
  <div class="mb-3">
    <label for="std_place_of_birth" class="form-label">Tempat Lahir</label>
    <input type="text" class="form-control @error ('std_place_of_birth') is-invalid @enderror" id="std_place_of_birth" name="std_place_of_birth" autofocus value="{{old('std_place_of_birth', $students->std_place_of_birth)}}" required data-parsley-inputs data-parsley-trigger="keyup">
    <!-- pesan error -->
    @error('std_place_of_birth')
    <div class="invalid-feedback">
     {{ $message }}
    </div>
    @enderror
  </div>

  <div class="mb-3">
    <label for="std_date_of_birth" class="form-label">Tanggal Lahir</label>
    <input type="date" class="form-control @error ('std_date_of_birth') is-invalid @enderror" id="std_date_of_birth" name="std_date_of_birth" autofocus value="{{old('std_date_of_birth', $students->std_date_of_birth)}}" required data-parsley-inputs data-parsley-trigger="keyup">
    <!-- pesan error -->
    @error('std_date_of_birth')
    <div class="invalid-feedback">
     {{ $message }}
    </div>
    @enderror
  </div>

  <div class="mb-3">
    <label for="std_student_phone_number" class="form-label">Nomor Telepon Siswa</label>
    <input type="number" class="form-control @error ('std_student_phone_number') is-invalid @enderror" id="std_student_phone_number" name="std_student_phone_number" autofocus value="{{old('std_student_phone_number', $students->std_student_phone_number)}}" required data-parsley-inputs data-parsley-trigger="keyup">
    <!-- pesan error -->
    @error('std_student_phone_number')
    <div class="invalid-feedback">
     {{ $message }}
    </div>
    @enderror
  </div>

  <div class="mb-3">
    <label for="std_parents_name" class="form-label">Nama Orang tua/Wali</label>
    <input type="text" class="form-control @error ('std_parents_name') is-invalid @enderror" id="std_parents_name" name="std_parents_name" autofocus value="{{old('std_parents_name', $students->std_parents_name)}}"required data-parsley-inputs data-parsley-trigger="keyup">
    <!-- pesan error -->
    @error('std_parents_name')
    <div class="invalid-feedback">
     {{ $message }}
    </div>
    @enderror
  </div>

  <div class="mb-3">
    <label for="std_parents_phone" class="form-label">Nomor Orang Tua/Wali</label>
    <input type="number" class="form-control @error ('std_parents_phone') is-invalid @enderror" id="std_parents_phone" name="std_parents_phone" autofocus value="{{old('std_parents_phone', $students->std_parents_phone)}}"required data-parsley-inputs data-parsley-trigger="keyup">
    <!-- pesan error -->
    @error('std_parents_phone')
    <div class="invalid-feedback">
     {{ $message }}
    </div>
    @enderror
  </div>

  <div class="mb-3">
    <label for="std_address" class="form-label">Alamat</label>
    @error('std_address')
    <p class="text-danger">{{ $message }}</p>
    @enderror
    <textarea class="form-control" name="std_address" id="floatingTextarea2" style="height: 100px" required data-parsley-inputs data-parsley-trigger="keyup">{{ old('std_address', $students->std_address) }}</textarea>
</div>


  <a href="/admin/students" class="btn btn-secondary">Batal</a>
  <button type="submit" class="btn btn-primary">Simpan</button>
</form>


<script>
  // parsley
  $(document).ready(function() {
      $('form').parsley(); 
  });

  //Summernote 
  $(document).ready(function() {
  $('#summernote').summernote({
        tabsize: 2,
        toolbar: [
          ['style', ['style']],
          ['font', ['bold', 'underline', 'clear']],
        ]
      });;
  });

  function previewImage(){
    // menangkap variabel image dan mengambil inputan image
    const art_image = document.querySelector('#art_image');
    // ambil tag image kosong
    const imgPreview = document.querySelector('.img-preview')

    // membuat image block
    imgPreview.style.display = 'block';

    // perintah untuk mengambil data gambar
    // const oFReader = new FileReader();
    // oFReader.readAsDataUrl(art_image.files[0]);

    oFReader.onload = function(oFREvent){
      imgPreview.src = oFREvent.target.result;
    }
  }

</script>
@endsection 

@section('summernote')
<!-- Summer -->
      <!-- include libraries(jQuery, bootstrap) -->
      
      <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

      <!-- include summernote css/js -->
      <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
      <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
@endsection
