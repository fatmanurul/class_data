@extends('admin.layouts.main')
@section('title')
Halaman Tambah Guru
@endsection
@section('container')
 
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Tambah</h1>
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

<form method="post" action="/admin/teachers" class="mb-5" enctype="multipart/form-data" data-parsley-validate>
    @csrf
  <div class="mb-3">
    <label for="tcr_NUPTK" class="form-label">NUPTK</label>
    <input type="number" class="form-control @error ('tcr_NUPTK') is-invalid @enderror" id="tcr_NUPTK" name="tcr_NUPTK" autofocus value="{{old('tcr_NUPTK')}}" required data-parsley-inputs data-parsley-trigger="keyup">
    <!-- pesan error -->
    @error('tcr_NUPTK')
    <div class="invalid-feedback">
     {{ $message }}
    </div>
    @enderror
  </div>

  <div class="mb-3">
    <label for="tcr_name" class="form-label">Nama Guru</label>
    <input type="text" class="form-control @error ('tcr_name') is-invalid @enderror" id="tcr_name" name="tcr_name" autofocus value="{{old('tcr_name')}}" required data-parsley-inputs data-parsley-trigger="keyup">
    <!-- pesan error -->
    @error('tcr_name')
    <div class="invalid-feedback">
     {{ $message }}
    </div>
    @enderror
  </div>

  <div class="mb-3">
    <label for="tcr_religion" class="form-label">Agama</label>
    <select class="form-select" name="tcr_religion" required data-parsley-inputs data-parsley-trigger="keyup">
        <option value="">Pilih Agama</option>
        <option value="1">Islam</option>
        <option value="2">Kristen</option>
        <option value="3">Katolik</option>
        <option value="4">Hindu</option>
        <option value="5">Budha</option>
    </select>
    @error('tcr_religion')
    <div class="text-danger">{{ $message }}</div>
    @enderror
  </div>


  <div class="mb-3">
    <label for="tcr_gender" class="form-label">Jenis Kelamin</label>
    <select class="form-select" name="tcr_gender" required data-parsley-inputs data-parsley-trigger="keyup">
        <option value="">Pilih Jenis Kelamin</option>
        <option value="1">Laki-laki</option>
        <option value="2">Perempuan</option>
    </select>
    @error('tcr_gender')
    <div class="text-danger">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="tcr_place_of_birth" class="form-label">Tempat Lahir</label>
    <input type="text" class="form-control @error ('tcr_place_of_birth') is-invalid @enderror" id="tcr_place_of_birth" name="tcr_place_of_birth" autofocus value="{{old('tcr_place_of_birth')}}" required data-parsley-inputs data-parsley-trigger="keyup">
    <!-- pesan error -->
    @error('tcr_place_of_birth')
    <div class="invalid-feedback">
     {{ $message }}
    </div>
    @enderror
  </div>

  <div class="mb-3">
    <label for="tcr_date_of_birth" class="form-label">Tanggal Lahir</label>
    <input type="date" class="form-control @error ('tcr_date_of_birth') is-invalid @enderror" id="tcr_date_of_birth" name="tcr_date_of_birth" autofocus value="{{old('tcr_date_of_birth')}}" required data-parsley-inputs data-parsley-trigger="keyup">
    <!-- pesan error -->
    @error('tcr_date_of_birth')
    <div class="invalid-feedback">
     {{ $message }}
    </div>
    @enderror
  </div>

  <div class="mb-3">
    <label for="tcr_subjects" class="form-label">Mata Pelajaran</label>
    <input type="text" class="form-control @error ('tcr_subjects') is-invalid @enderror" id="tcr_subjects" name="tcr_subjects" autofocus value="{{old('tcr_subjects')}}" required data-parsley-inputs data-parsley-trigger="keyup">
    <!-- pesan error -->
    @error('tcr_subjects')
    <div class="invalid-feedback">
     {{ $message }}
    </div>
    @enderror
  </div>

  <div class="mb-3">
    <label for="tcr_number_phone" class="form-label">Nomor Telepon</label>
    <input type="number" class="form-control @error ('tcr_number_phone') is-invalid @enderror" id="tcr_number_phone" name="tcr_number_phone" autofocus value="{{old('tcr_number_phone')}}" required data-parsley-inputs data-parsley-trigger="keyup">
    <!-- pesan error -->
    @error('tcr_number_phone')
    <div class="invalid-feedback">
     {{ $message }}
    </div>
    @enderror
  </div>

  <div class="mb-3">
    <label for="tcr_address" class="form-label" >Alamat</label>
    @error('tcr_address')
              <p class="text-danger">{{ $message }}</p>
    @enderror
    <input id="tcr_address" type="hidden" name="tcr_address" value="{{ old('tcr_address')}}"> 
    <textarea class="form-control" name="tcr_address" id="floatingTextarea2" style="height: 100px" required data-parsley-inputs data-parsley-trigger="keyup"></textarea>
  </div>

  <a href="/admin/teachers" class="btn btn-secondary">Batal</a>
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
