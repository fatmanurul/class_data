@extends('admin.layouts.main')
@section('title')
  Halaman Dashboard
  @endsection
  @section('container')

     <!-- CSS Data Tables -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          <h1 class="h2">Daftar Artikel</h1>
    </div>
        @if(session()->has('success'))
            <div class="alert alert-success" role="alert">
              {{ session('success') }}
            </div>
        @endif
        <a href="/admin/teachers/create" class="btn btn-primary mb-3">Tambah </a>
          <table id="myTable" class="table table-stripped">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">NUPTK</th>
                <th scope="col">Nama Guru</th>
                <th scope="col">Jenis Kelamin</th>
                <th scope="col">Status</th>
                <th scope="col">Aksi</th>
              </tr>
            </thead>
          </table>
        </div>

  <!-- Java Script Data Tables -->
  <script src="https://cdn.datatables.net/v/dt/dt-1.13.6/datatables.min.js"></script>

  <script>
      $(document).ready(function () {
          let table = new DataTable('#myTable', {
            order: [[3, 'asc']],
              processing: true,
              serverSide: true,
              ajax: "{{ route('admin.teachers.index') }}",
              columns: [
                  { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},
                  { data: 'tcr_NUPTK', name: 'tcr_NUPTK' },
                  { data: 'tcr_name', name: 'tcr_name', orderable: false  },
                  { data: 'tcr_gender', name: 'tcr_gender', orderable: false  },
                  { data: 'status', name: 'status' },
                  { data: 'tcr_id', name: 'tcr_id', orderable: false, searchable: false,  render: function (data, type, row, meta) {
                    return `
                    <div class="row"> 
                        <div class="col-2">
                            <a href="/admin/teachers/${row.tcr_id}" class="badge bg-info" data-toggle="tooltip" title="View"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye" aria-hidden="true"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg></a>
                        </div>
                        <div class="col-3">
                            <a href="/admin/teachers/${row.tcr_id}/edit" class="badge bg-warning" data-toggle="tooltip" title="Edit"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit" aria-hidden="true"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg></a>
                        </div>
                        <div class="form-check form-switch col-2">
                          <div class="col-2">
                            <input onclick="location.href='/admin/teachers/${row.tcr_id}/switch'" class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheck${row.tcr_id}" ${row.tcr_status === 1 ? 'checked' : ''}>
                          <div class="col-2">  
                        </div>
                    </div>                      
                    `;    
                  }}
                ],
          });
          feather.replace(); // Memanggil replace setelah DataTables dimuat
      });
  </script>



@endsection