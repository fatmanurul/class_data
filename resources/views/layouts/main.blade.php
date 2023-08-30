<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>

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

    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    
    <!-- Custom styles for this template -->
    <link href="/css/dashboard.css" rel="stylesheet">
 
    <!-- {{-- Trix Editor --}}
    <link rel="stylesheet" type="text/css" href="/css/trix.css">
    <script src="https://cdn.jsdelivr.net/npm/trix@2.0.5/dist/trix.umd.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/trix@2.0.5/dist/trix.min.css" rel="stylesheet">
    <style>
      trix-toolbar [data-trix-button-group="file-tools"] {
        display: none;
      }
    </style> -->
    
  </head>
  <body>
    
@include('admin.layouts.header')
<div class="container-fluid">
  <div class="row">
  @include('admin.layouts.sidebar')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
     @yield('container')
    </main>
  </div>
</div>
      <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>

      <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>

      <script src="/js/dashboard.js"></script>

      @yield('summernote')

      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>    
  </body>
</html>
