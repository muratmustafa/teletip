@extends('user.layouts.master')
@section('title','Tüm Raporlarım')
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
      </div>
    </div>

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
            @if ($message = Session::get('success'))
              <div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  {{ $message }}
              </div>
            @endif
            @if ($errors->any())
              <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                There were some problems:<br>
                <ul>
                  @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                  @endforeach
                </ul>
              </div>
            @endif
            <div class="card card-primary card-outline">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fas fa-download"></i>
                  Tüm Raporlarım
                </h3>
              </div>
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th style="width: 5%">#</th>
                      <th style="width: 35%">Dosya Açıklaması</th>
                      <th style="width: 25%">Yüklenme Tarihi</th>
                      <th style="width: 15%" class="text-right">Dosya</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($files as $file)
                      <tr>
                        <td>#</td>
                        <td>{{ $file->name }}</td>
                        <td>{{ $file->created_at }}</td>
                        <td class="text-right">
                          <a href="{{ url('/uploads/'.$file->file_name) }}" class="btn btn-info" title="İndir" data-toggle="tooltip"><span class="fas fa-download"></span></a>
                        </td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
              <div class="card-footer clearfix">
                <ul class="pagination pagination-sm m-0 float-right">
                  {{ $files->links() }}
                </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12">
            <div class="card card-primary">
              <div class="card-header">
                <h4 class="card-title">
                  Yeni Bir Dosya Yükleyin
                </h4>
              </div>
              <div class="card-body">
                <form action="{{ route('user.upload.post',Auth::guard('user')->user()->id) }}" method="post" enctype="multipart/form-data">
                  @csrf
                  <div class="form-group">
                    <label for="inputName">Dosya Açıklaması</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="inputName" name="name" placeholder="Bir açıklama girin">
                  </div>
                  <div class="form-group">
                    <label for="inputFile">Dosya</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <label class="custom-file-label" id="fileName" for="inputFile">Bir dosya seçin</label>
                        <input type="file" class="custom-file-input @error('file') is-invalid @enderror" name="file" id="inputFile" aria-describedby="fileHelp">
                      </div>
                    </div>
                    <small id="fileHelp" class="form-text text-muted">Lütfen geçerli bir belge yükleyin (doc, docx, pdf). Belgenin boyutu 5MB'den fazla olmamalıdır.</small>
                  </div>
                  <button type="submit" class="btn btn-primary">Yükle</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection

@section('end')
<script src="{{asset('/')}}plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<script type="text/javascript">
  $(document).ready(function () {
    bsCustomFileInput.init();
  });
</script>
@endsection
