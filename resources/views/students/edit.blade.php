@extends('admin.layouts.main')
@section('title')
Halaman Ubah Artikel
@endsection
@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="h2">Ubah Artikel</h1>
      </div>

      @if(session()->has('error'))
          <div class="alert alert-danger" role="alert">
            {{ session('error') }}
        </div>
      @endif

<form method="post" action="/admin/articles/{{$article->art_id}}" class="mb-5" enctype="multipart/form-data" data-parsley-validate>
  @method('put')
    @csrf
      <div class="mb-3">
        <label for="art_title" class="form-label">Nis</label>
        <input type="text" class="form-control @error ('art_title') is-invalid @enderror" id="art_title" name="art_title" autofocus value="{{old('art_title', $article->art_title)}}" required data-parsley-inputs data-parsley-length="[5, 100]">
        <!-- pesan error -->
        @error('art_title')
        <div class="invalid-feedback">
        {{ $message }}
        </div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="category" class="form-label">Nama Siswa</label>
        <select class="form-select" name="ctg_id" required data-parsley-inputs data-parsley-trigger="keyup">
          <option value="{{$article->ctg_id}}">{{$article->ctg_name}}</option>
        @foreach ($category as $category)
        <option value="{{$category->ctg_id}}">{{ $category->ctg_name}}</option>
        @endforeach
    </select>
      </div>
      <div class="mb-3">
        <label for="art_excerpt" class="form-label">Agama</label>
        <input type="text" class="form-control @error ('art_excerpt') is-invalid @enderror" id="art_excerpt" name="art_excerpt" autofocus  value="{{old('art_excerpt', $article->art_excerpt)}}" required data-parsley-inputs data-parsley-length="[5, 100]">
        <!-- pesan error -->
        @error('art_excerpt')
          <div class="invalid-feedback">
          {{ $message }}
          </div>
        @enderror
      </div>

      <div class="mb-3">
      <label for="art_image" class="form-label">Jenis</label>
      <input type="hidden" name="oldImage" value="{{$article->art_image}}">
      @if($article->art_image)
      <!-- <img src="{{ asset($article->art_image) }}" class="img-preview img-fluid mb-3 col-sm-5"> -->
      @else
      <img class="img-preview img-fluid mb-3 col-sm-5 d-block">
      @endif
      <input class="form-control @error('art_image') is-invalid @enderror" type="file" id="art_image" name="art_image" onchange="previewImage()" required data-parsley-inputs data-parsley-trigger="keyup">{{-- : Atribut ini digunakan untuk mengidentifikasi elemen-elemen input yang akan diverifikasi. Anda dapat memberikan daftar selektor CSS (misalnya, kelas atau ID) untuk elemen-elemen input yang ingin Anda validasi. Ini memungkinkan Parsley.js untuk menargetkan input tertentu untuk validasi. --}}
        {{-- Dengan data-parsley-trigger="keyup", setiap kali pengguna mengetik di input tersebut dan kemudian melepaskan tombol, Parsley.js akan langsung memeriksa input tersebut dan memberikan umpan balik (misalnya, menunjukkan pesan kesalahan jika input tidak memenuhi persyaratan).--}}
      @error('art_image')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
      @enderror
    </div>
      
    
    <div class="mb-3">
       <label for="art_content" class="form-label" >Isi Artikel</label>
        @error('art_content')
            <p class="text-danger">{{ $message }}</p>
        @enderror
        <input id="art_content" type="hidden" name="art_content"> 
        <textarea id="summernote" name="art_content" required data-parsley-inputs data-parsley-trigger="keyup">{{$article->art_content}}</textarea>
    </div>

  <a href="/admin/articles" class="btn btn-secondary">Batal</a>
  <button type="submit" class="btn btn-primary">Simpan</button>
</form>

<script>
  $(document).ready(function() {
  $('#summernote').summernote({
        tabsize: 2,
        toolbar: [
          ['style', ['style']],
          ['font', ['bold', 'underline', 'clear']],
        ]
      });;
  });


  $(document).ready(function() {
    $('form').parsley(); // Inisialisasi Parsley untuk validasi form
  }); 

  
  function previewImage(){
 // menangkap variabel image dan mengambil inputan image
 const art_image = document.querySelector('#art_image');
  // ambil tag image kosong
  const imgPreview = document.querySelector('.img-preview')

  // membuat image block
  imgPreview.style.display = 'block';

  // perintah untuk mengambil data gambar
  const oFReader = new FileReader();
  oFReader.readAsDataUrl(image.files[0]);

  oFReader.onload = function(oFREvent){
    imgPreview.src = oFREvent.target.result;
  }
  }
    // Get a reference to our file input
    const fileInput = document.querySelector('input[type="file"]');
    var str = "{{$article->art_image}}";
    var res =  str.substring(21);
    console.log(res,str);
    
    // Create a new File object
    const myFile = new File(['file_image'], res, {
        type: 'image/png',
        lastModified: new Date(),
    });

    // Now let's create a DataTransfer to get a FileList
    const dataTransfer = new DataTransfer();
    dataTransfer.items.add(myFile);
    fileInput.files = dataTransfer.files;
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
