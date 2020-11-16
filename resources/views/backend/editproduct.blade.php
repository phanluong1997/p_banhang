@extends('backend.master')
@section('title','Them San Pham')
@section('main')

	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Sản phẩm</h1>
			</div>
		</div><!--/.row-->

		<div class="row">
			<div class="col-xs-12 col-md-12 col-lg-12">

				<div class="panel panel-primary">
					<div class="panel-heading">Sửa sản phẩm</div>
					<div class="panel-body">
                    @include('errors.note')
						<form method="post" enctype="multipart/form-data">
							<div class="row" style="margin-bottom:40px">
								<div class="col-xs-8">
									<div class="form-group" >
										<label>Tên sản phẩm</label>
										<input  type="text" name="name" class="form-control" value =" {{$product->name}}">
									</div>
									<div class="form-group" >
										<label>Ảnh sản phẩm</label>
										<input type="file"  name="image" id="image"  require value = ""/><br/>
					                    <img src="{{ asset('upload/product/thumb/'.$product->thumb) }}" width="400" height="240">
									</div>
									<div class="form-group" >
										<label>Danh mục</label>
										<select name="cate" class="form-control">
                                            @foreach($data as $value)
                                                <option value="{{$value->id}}">{{$value->name}}</option>
                                            @endforeach
					                    </select>
									</div>
									<input type="submit" name="submit" value="Lưu" class="btn btn-primary">
									<input type="reset" name="submit" value="Hủy" class="btn btn-danger">
								</div>
							</div>
                            {{csrf_field()}}
						</form>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
		</div><!--/.row-->
	</div>	<!--/.main-->
@endsection
