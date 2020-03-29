@extends('admin.master.master')
@section('title', 'Sản phẩm')

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
               @lang('lang.product.title')
            </h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">
                    @lang('lang.product.title')
                </li>
            </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12 col-xs-12 col-12">
            <div class="card card-primary ">
                <nav class="navbar bg-primary">
                    <span class="navbar-brand mb-0 h1">Danh sách sản phẩm</span>
                    <a href="{{ route('admin.product.create') }}" class="btn btn-success my-2 my-sm-0"><i class="fas fa-plus-circle mr-1"></i> Thêm mới</a>
                </nav>
            </div>
            @if (session('thongbao'))
            <div class="alert bg-success" role="alert">
                    {!!session('thongbao')!!}
            </div>
            @endif
            <div class="vertical-menu">
                <table id="product_table" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tên sản phẩm</th>
                            <th>Mã sản phẩm</th>
                            <th>Tình trạng</th>
                            <th>Danh mục</th>
                            <th style='width:17%'>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $stt = 1; @endphp
                        @foreach ($products as $product )
                            <tr>
                                <td>{{ $stt }}</td>
                                <td>{{$product->name}}</td>
                                <td>{{$product->product_code}}</td>
                                <td>{{ $product->state !== null ? "Còn hàng" : "Hết hàng" }}</td>
                                <td>{{ $product->category->name }}</td>
                                <td style="width: 17%">
                                    <a class="btn btn-category btn-primary" href="{{ route('admin.product.edit', ['id' => $product->id]) }}"><i class="fa fa-edit"></i></a>
                                    <a onclick="return confirm(\' Bạn có muốn xóa sản phẩm:  '.$product->name.' \')" class="btn btn-category btn-danger" href="{{ route('admin.product.delete', ['id' => $product->id]) }}"><i class="fas fa-times"></i></i></a>
                                </td>
                            </tr>
                            @php $stt++; @endphp
                        @endforeach
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
     
        $('#product_table').DataTable(
             {
                    responsive: true
             }

        );
    });
    </script>
@stop

@endsection