<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- My style -->
    <link rel="stylesheet" href="/css/style.css">
    <!-- judul halaman ngambil dari -->
    <title>Halaman Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
     <!-- Boostrap Icons -->
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

     <style>
    .parsley-errors-list {
      margin: 2px 0 3px;
      margin-top: 10px;
      padding: 0;
      list-style-type: none;
      font-size: 0.9em;
      line-height: 0.9em;
      opacity: 0;

      transition: all .3s ease-in;
      -o-transition: all .3s ease-in;
      -moz-transition: all .3s ease-in;
      -webkit-transition: all .3s ease-in;
    }

    .parsley-errors-list.filled {
      opacity: 1;
    }
    
    .parsley-type, .parsley-required, .parsley-equalto, .parsley-pattern, .parsley-length{
    color:#ff0000;
    }
</style>
<script src="{{ asset('vendors') }}/jquery/dist/jquery.min.js"></script>
  {{-- Agar validasi parsly muncul --}}
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.2/parsley.min.js"></script>
  {{-- Agar Validasi Menggunakan bahasa indonesia --}}
  <script src="{{ asset('vendors/parsley/js/parsley.min.js') }}"></script>
  <script src="{{ asset('vendors/parsley/js/i18n/id.js') }}"></script>
  <script src="{{ asset('vendors/parsley/js/i18n/id.extra.js') }}"></script>
  </head>
  <body>
<!-- kasih tau ada navbar -->
    <!-- Agar tulisan berada di dalam container -->
    <div class="container mt-4">
        <!-- memberitahu halaman child -->
    <div class="row justify-content-center">
    <div class="col-md-4">

      @if(session()->has ('loginError'))
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
      {{ session('loginError') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
        @endif


        <main class="form-signin">
            <h1 class="h3 mb-3 fw-normal text-center">Silahkan Login</h1>
          <form action="/login" method="post" data-parsley-validate> 
            @csrf      
            <div class="form-floating">
              <input type="text" name="usr_email" class="form-control @error('usr_email') is-invalid @enderror" id="usr_email" autofocus  value="{{old('usr_email')}}" required data-parsley-inputs data-parsley-type="email">
              <label for="usr_email">Email</label>
              @error('usr_email')
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                        @enderror
            </div>
            <div class="form-floating">
              <input type="password" name="usr_password" class="form-control class @error('usr_password') is-invalid @enderror" id="usr_password" placeholder="usr_password" required data-parsley-inputs>
              <label for="usr_password">Kata Sandi</label>
              @error('usr_password')
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                        @enderror
            </div>
            <button class="w-100 btn btn-lg btn-primary" type="submit">Masuk</button>
          </form>
        </main>
    </div>
</div>
        
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

    <script>
$(document).ready(function() {
    $('form').parsley(); // Inisialisasi Parsley untuk validasi form
});
</script>     

  </body>
</html>

