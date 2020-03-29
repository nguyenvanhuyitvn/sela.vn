@extends('admin.master.master')
@section('title', 'Sửa thuộc tính')

@section('css')
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet" href="{{asset('assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">
@stop

@section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h1 class="m-0 text-dark">
               @lang('lang.attribute.title')
            </h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">
                    @lang('lang.attribute.title')
                </li>
            </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div>
@stop

@section('content')
    <div class="row">
        <div class="col-md-4">
            <div class="col-md-12 col-xs-12 col-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Sửa thuộc tinh</h3>
                    </div>
                </div>
                <form id="attribute" method='post' action="{{route('admin.attribute.update')}}"> 
                @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Tên thuộc tính:</label>
                            <input type="text" name="name" class="form-control" id="name" placeholder="Tên thuộc tính">
                            @if($errors->has('name'))	
                                <div class="alert bg-danger" role="alert">
                                    <svg class="glyph stroked cancel">
                                    <use xlink:href="#stroked-cancel">
                                    </use></svg>{{$errors->first('name')}}<a href="#" class="pull-right"><span class="glyphicon glyphicon-remove"></span></a>
                                </div>
                            @endif
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>    
        </div>
        <div class="col-md-8">
         <div class="col-md-12 col-xs-12 col-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Danh sách</h3>
                    </div>
                </div>
                @if (session('thongbao'))
                <div class="alert bg-success" role="alert">
                        {!!session('thongbao')!!}
                </div>
                @endif
                <div class="vertical-menu">
                    <table id="category_table" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Tên thuộc tính</th>
                                <th>Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>ID</td>
                                <td>Màu sắc</td>
                                <td>Sửa/ Xóa</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
        </div>
    </div>

@section('script')
    <!-- DataTables -->
    <script src="{{asset('assets/plugins/datatables/jquery.dataTables.js')}}"></script>
    <script src="{{asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.js')}}"></script>
    <script>
    $(function () {
     
        $('#category_table').DataTable(
             {
                "lengthMenu": [ 5, 10, 20, 50, 100 ]
             }

        );
    });
    </script>
@stop

@endsection