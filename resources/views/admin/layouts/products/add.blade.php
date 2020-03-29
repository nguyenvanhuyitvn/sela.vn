@extends('admin.master.master')
@section('title', 'Sản phẩm')

@section('css')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">
    <link rel="stylesheet" href="{{asset('assets/dist/css/style.css')}}">
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
                <span class="navbar-brand mb-0 h1">Thêm sản phẩm mới</span>
                <a href="{{ route('admin.product.list') }}" class="btn btn-success my-2 my-sm-0"><i class="fas fa-plus-circle mr-1"></i> Quay lại</a>
            </nav>
        </div>
        @if (session('thongbao'))
        <div class="alert bg-success" role="alert">
                {!!session('thongbao')!!}
        </div>
        @endif
        <div class="vertical-menu">
            <div class="row">
                <div class="col-xs-12 col-md-12 col-lg-12">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                            <label>Danh mục</label>
                                            <select name="category" class="form-control">
                                                    {{GetCategory($category,0,'','')}}
                                            </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Mã sản phẩm</label>
                                        @if($errors->has('product_code'))
                                        <div class="alert alert-danger" role="alert">
                                            <strong>{{$errors->first('product_code')}}</strong>
                                        </div>
                                        @endif
                                        <input type="text" name="product_code" class="form-control" value="{{old('product_code')}}">
                                    </div>
                                    <div class="form-group">
                                        <label>Tên sản phẩm</label>
                                    <input type="text" name="product_name" class="form-control" value="{{old('product_name')}}">
                                        @if($errors->has('product_name'))
                                        <div class="alert alert-danger" role="alert">
                                            <strong>{{$errors->first('product_name')}}</strong>
                                        </div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label>Giá sản phẩm (Giá chung)</label>
                                        <input type="number" name="product_price" class="form-control" value="{{old('product_price')}}">
                                        @if($errors->has('product_price'))
                                        <div class="alert alert-danger" role="alert">
                                            <strong>{{$errors->first('product_price')}}</strong>
                                        </div>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <label>Trạng thái</label>
                                        <select name="product_state" class="form-control">
                                            <option value="1">Còn hàng</option>
                                            <option value="0">Hết hàng</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Ảnh sản phẩm</label>
                                        @if($errors->has('product_img'))
                                        <div class="alert alert-danger" role="alert">
                                            <strong>{{$errors->first('product_img')}}</strong>
                                        </div>
                                        @endif
                                        <input id="img" type="file" name="product_img" class="form-control hidden"
                                            onchange="changeImg(this)" >
                                        <img id="avatar" class="thumbnail" width="100%" height="350px" src="{{asset('assets/images/import-img.png')}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 col-12">
                                     <div class="form-group">
                                        <label>Thông tin</label>
                                        @if($errors->has('info'))
                                        <div class="alert alert-danger" role="alert">
                                            <strong>{{$errors->first('info')}}</strong>
                                        </div>
                                        @endif
                                        <textarea id="editor" name="info" style="width: 100%;height: 100px;">{{old('info')}}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="panel panel-default">
                                <div class="panel-body tabs">
                                    <label>Các thuộc Tính </label>
                                        <ul id="tabs" class="nav nav-tabs">
                                            @php
                                                $i=1;   
                                            @endphp
                                            @foreach ($pro as $row)
                                                <li class="nav-item"><a href="#tab{{$row->id}}" data-target="#tab{{$row->id}}" data-toggle="tab" class="nav-link small text-uppercase  @if($i==1) active  @endif">{{$row->name}}</a></li>
                                                @php
                                                    $i=2;
                                                @endphp
                                            @endforeach   
                                        </ul>
                                        <br>
                                        <div id="tabsContent" class="tab-content">
                                            @foreach ($pro as $row)
                                                <div class="tab-pane fade @if($i==2) active show  @endif  in" id="tab{{$row->id}}">
                                                    <table class="table">
                                                        <thead>
                                                            <tr>
                                                                {{-- quan hệ 1-n properties sang values $row->values --}}
                                                                @foreach ($row->values as $item) 
                                                                    <th class="text-center">{{$item->value}}</th>
                                                                @endforeach
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                @foreach ($row->values as $item)
                                                                    <td class="text-center"> 
                                                                        <input class="form-check-input" type="checkbox" name="attr[{{$row->name}}][]" value="{{$item->id}}">
                                                                    </td> 
                                                                @endforeach
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    </div>
                                                    @php
                                                        $i=3;
                                                    @endphp
                                            @endforeach
                                        </div>
                                {{--  ./Test  --}}
                                </div>
                            </div>
                        </div>
                    </div>
                    {{--  Description  --}}
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Miêu tả</label>
                                @if($errors->has('description'))
                                <div class="alert alert-danger" role="alert">
                                    <strong>{{$errors->first('description')}}</strong>
                                </div>
                                @endif
                                <textarea id="editor" name="description" style="width: 100%;height: 100px;">{{old('description')}}</textarea>
                            </div>
                            <button class="btn btn-success" name="add-product" type="submit">Thêm sản phẩm</button>
                            <button class="btn btn-danger" type="reset">Huỷ bỏ</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

 
 @section('script')
     <script>
		function changeImg(input){
		    //Nếu như tồn thuộc tính file, đồng nghĩa người dùng đã chọn file mới
		    if(input.files && input.files[0]){
		        var reader = new FileReader();
		        //Sự kiện file đã được load vào website
		        reader.onload = function(e){
		            //Thay đổi đường dẫn ảnh
		            $('#avatar').attr('src',e.target.result);
		        }
		        reader.readAsDataURL(input.files[0]);
		    }
		}
		$(document).ready(function() {
		    $('#avatar').click(function(){
		        $('#img').click();
		    });
		});

	</script>
 @stop
 
@endsection
