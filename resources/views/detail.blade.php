@extends('template/app')
@section('judul', 'Detail Data Mahasiswa')

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
              <form method="POST" action="{{ url('data/update/'.$mhs->std_id) }}">
                @method('patch')
                @csrf
              <div class="form-group">
                <label>NIM</label>
                <input type="text" class="form-control @error('nim') is-invalid @enderror" name="nim" value="{{$mhs->std_nim}}">
                @error('nim')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group">
                <label>Nama</label>
                <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{$mhs->std_nama}}">
                @error('nama')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group">
                <label>Jurusan</label>
                <input type="text" class="form-control @error('jurusan') is-invalid @enderror" name="jurusan" value="{{$mhs->std_jurusan}}">
                @error('jurusan')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
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
              <div class="form-group">
                <a href="{{url('data')}}" class="btn btn-danger"><i class="fas fa-arrow-left"></i> Batal</a> |
                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
              </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection

@section('script')
<script type="text/javascript">
  $('#mn2').addClass('active');
  $('#{{$mhs->std_jk}}').attr('checked', 'true');
</script>
@endsection