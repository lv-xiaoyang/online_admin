@extends('admin.index')
@section('title','讲师展示')
@section('content')

<div class="breadcome-area">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="breadcome-list single-page-breadcome">
            <div class="row">
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <div class="breadcome-heading">
                  <form role="search" class="">
                      <input type="text" placeholder="Search..." value="{{$lereg_name}}" style="height:37px" name="lereg_name"  class="form-control">
                      <a href=""><button class="btn btn-default"><i class="fa fa-search"></i></button></a>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


<table class="table table-condensed">
  <!-- <form action="">
  <input type="text" placeholder="Search..." class="form-control"> -->
      <!-- <input type="text" style="height:30px" name="lereg_name"> -->
      <!-- <input type="submit" class="btn btn-warning" value="搜索"> -->
  <!-- </form> --> 

  <caption>讲师展示</caption>
  <thead>
    <tr>
      <th>id</th>
      <th>讲师名称</th>
      <th>讲师履历</th>
      <th>讲师学历</th>
      <th>讲师毕业学校</th>
      <th>讲师专业</th>
      <th>讲师资格证</th>
      <th>讲师授课风格</th>
      <th>从业时长</th>
      <th>操作</th>
  </tr>
  </thead>
  <tbody>
  @foreach($data as $k=>$v)
    <tr>
      <!-- <td>1</td> -->
      <td>{{$v->lereg_id}}</td>
      <td>{{$v->lereg_name}}</td>
      <td>{{$v->lereg_res}}</td>
      <td>{{$v->lereg_edu}}</td>
      <td>{{$v->lereg_school}}</td>
      <td>{{$v->lereg_magor}}</td>
      <td><img src="{{env('IMG_URL')}}{{$v->lereg_qual}}" width="30px" height="30px" alt=""></td>
      <td>{{$v->lereg_style}}</td>
      <td>{{$v->lereg_time}}</td>
      <td>
      	<a class="btn btn-danger" href="{{url('/teacher/del/'.$v->lereg_id)}}">删除</a> | 	
      	<a class="btn btn-info" href="{{url('/teacher/upd/'.$v->lereg_id)}}">修改</a>
      </td>
  </tr>
   @endforeach
   <td>
      <td colspan="10">{{$data->appends(['lereg_name'=>$lereg_name])->links()}}</td>
   </td>
  </tbody>
</table>

@endsection
