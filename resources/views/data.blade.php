@extends('template/app')
@section('judul', 'Data Mahasiswa')

@section('konten')
<div class="content">
    <div class="page-inner">
      <div class="page-header">
        <h4 class="page-title">Data Mahasiswa</h4>
        <ul class="breadcrumbs">
          <li class="nav-home">
            <a href="#">
              <i class="flaticon-home"></i>
            </a>
          </li>
          <li class="separator">
            <i class="flaticon-right-arrow"></i>
          </li>
          <li class="nav-item">
            <a href="#">Data Mahasiswa</a>
          </li> 
        </ul>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h4 class="card-title"><i class="fas fa-address-book"></i> Data Mahasiswa</h4>
            </div>
            <div class="card-body">
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
               <i class="fas fa-plus"></i> Tambah Data
              </button>
              @if (session('notif'))
                  <div class="alert alert-success mt-2">
                      {{ session('notif') }}
                  </div>
              @endif
              @if ($errors->any())
                  <div class="alert alert-danger mt-2">
                      <ul>
                          @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                          @endforeach
                      </ul>
                  </div>
              @endif
              <hr>
              <div class="table-responsive" style="overflow: auto;">
                <table id="basic-datatables" class="display table table-striped table-hover" >
                  <thead class="bg-info text-white">
                    <tr>
                      <th>#</th>
                      <th>NIM</th>
                      <th>Nama</th>
                      <th>Jurusan</th>
                      <th>JK</th>
                      <th width="120" class="text-center">Menu</th>
                    </tr>
                  </thead>
                 
                  <tbody>
                    @foreach($mhs as $data)
                    <tr>
                      <td>{{ $loop->iteration }}</td>
                      <td>{{ $data->std_nim }}</td>
                      <td>{{ $data->std_nama }}</td>
                      <td>{{ $data->std_jurusan }}</td>
                      <td><span class="badge badge-warning">{{$data->std_jk}}</span></td>
                      <td  class="text-center">
                        <form action="{{url('data/hapus/'.$data->std_id)}}" method="post">
                          @method('delete')
                          @csrf()
                        <a href="{{ url('data/'.$data->std_id) }}" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a> 
                        <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                        </form>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog  modal-md" role="document">
    <div class="modal-content bg-dark">
      <form method="POST" action="{{ url('data') }}">
      @csrf
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Tambah Data</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div class="form-group">
            <label>NIM</label>
            <input type="text" class="form-control" name="nim" value="{{ old('nim') }}">
          </div>
          <div class="form-group">
            <label>Nama</label>
            <input type="text" class="form-control" name="nama" value="{{ old('nama') }}">
          </div>
          <div class="form-group">
            <label>Jurusan</label>
            <input type="text" class="form-control" name="jurusan" value="{{ old('jurusan') }}">
          </div>
          <div class="form-check">
            <label>Gender</label><br/>
            <label class="form-radio-label">
              <input class="form-radio-input" type="radio" name="jk" id="L" value="L">
              <span class="form-radio-sign">Laki-laki</span>
            </label>
            <label class="form-radio-label ml-3">
              <input class="form-radio-input" type="radio" name="jk" id="P" value="P">
              <span class="form-radio-sign">Perempuan</span>
            </label>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
      </div>
      </form>
    </div>
  </div>
</div>

@endsection

@section('script')
<script type="text/javascript">
  $('#mn2').addClass('active');
  $('#basic-datatables').DataTable({});
</script>
@endsection