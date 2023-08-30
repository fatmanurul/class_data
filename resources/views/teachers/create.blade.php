@extends('admin.layouts.main')
@section('title')
Halaman Tambah Artikel
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
    <label for="std_nis" class="form-label">NUPTK</label>
    <input type="text" class="form-control @error ('std_nis') is-invalid @enderror" id="std_nis" name="std_nis" autofocus value="{{old('std_nis')}}" required data-parsley-inputs data-parsley-trigger="keyup">
    <!-- pesan error -->
    @error('std_nis')
    <div class="invalid-feedback">
     {{ $message }}
    </div>
    @enderror
  </div>

  <div class="mb-3">
    <label for="std_name" class="form-label">Nama Guru</label>
    <input type="text" class="form-control @error ('std_name') is-invalid @enderror" id="std_name" name="std_name" autofocus value="{{old('std_name')}}" required data-parsley-inputs data-parsley-trigger="keyup">
    <!-- pesan error -->
    @error('std_name')
    <div class="invalid-feedback">
     {{ $message }}
    </div>
    @enderror
  </div>

  <div class="mb-3">
    <label for="category" class="form-label">Agama</label>
    <select class="form-select" name="ctg_id" required data-parsley-inputs data-parsley-trigger="keyup">
        <option value="">Pilih Kategori</option>
        @foreach ($categories as $category)
            <option value="{{$category->ctg_id}}">{{ $category->ctg_name}}</option>
        @endforeach
    </select>
    @error('ctg_id') <!-- Menampilkan pesan error untuk field ctg_id -->
    <div class="text-danger">{{ $message }}</div>
    @enderror
  </div>


  <div class="mb-3">
    <label for="std_excerpt" class="form-label">Jenis Kelamin</label>
    <input type="text" class="form-control @error ('std_excerpt') is-invalid @enderror" id="std_excerpt" name="std_excerpt"  autofocus value="{{old('std_excerpt')}}" required data-parsley-inputs data-parsley-length="[5, 100]">
    <!-- pesan error -->
    @error('std_excerpt')
    <div class="invalid-feedback">
     {{ $message }}
    </div>
    @enderror
  </div>

  <div class="mb-3">
    <label for="category" class="form-label">Tempat Lahir</label>
    <select class="form-select" name="ctg_id" required data-parsley-inputs data-parsley-trigger="keyup">
        <option value="">Pilih Kategori</option>
        @foreach ($categories as $category)
            <option value="{{$category->ctg_id}}">{{ $category->ctg_name}}</option>
        @endforeach
    </select>
    @error('ctg_id') <!-- Menampilkan pesan error untuk field ctg_id -->
    <div class="text-danger">{{ $message }}</div>
    @enderror
  </div>

  <div class="mb-3">
    <label for="category" class="form-label">Tanggal Lahir</label>
    <select class="form-select" name="ctg_id" required data-parsley-inputs data-parsley-trigger="keyup">
        <option value="">Pilih Kategori</option>
        @foreach ($categories as $category)
            <option value="{{$category->ctg_id}}">{{ $category->ctg_name}}</option>
        @endforeach
    </select>
    @error('ctg_id') <!-- Menampilkan pesan error untuk field ctg_id -->
    <div class="text-danger">{{ $message }}</div>
    @enderror
  </div>

  <div class="mb-3">
    <label for="category" class="form-label">Mata Pelajaran</label>
    <select class="form-select" name="ctg_id" required data-parsley-inputs data-parsley-trigger="keyup">
        <option value="">Pilih Kategori</option>
        @foreach ($categories as $category)
            <option value="{{$category->ctg_id}}">{{ $category->ctg_name}}</option>
        @endforeach
    </select>
    @error('ctg_id') <!-- Menampilkan pesan error untuk field ctg_id -->
    <div class="text-danger">{{ $message }}</div>
    @enderror
  </div>

  <div class="mb-3">
    <label for="category" class="form-label">Nomor Telepon</label>
    <select class="form-select" name="ctg_id" required data-parsley-inputs data-parsley-trigger="keyup">
        <option value="">Pilih Kategori</option>
        @foreach ($categories as $category)
            <option value="{{$category->ctg_id}}">{{ $category->ctg_name}}</option>
        @endforeach
    </select>
    @error('ctg_id') <!-- Menampilkan pesan error untuk field ctg_id -->
    <div class="text-danger">{{ $message }}</div>
    @enderror
  </div>

    <div class="mb-3">
       <label for="art_content" class="form-label" >Alamat</label>
        @error('art_content')
            <p class="text-danger">{{ $message }}</p>
        @enderror
        <input id="art_content" type="hidden" name="art_content" value="{{ old('art_content')}}"> 
        <textarea id="summernote" name="art_content" required data-parsley-inputs data-parsley-trigger="keyup"></textarea>
    </div>

  <a href="/admin/articles" class="btn btn-secondary">Batal</a>
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
