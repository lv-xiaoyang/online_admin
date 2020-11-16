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

  <caption>讲师审核展示</caption>
  <thead>
    <tr>
      <th>id</th>
      <th>讲师名称</th>
      <th>讲师毕业学校</th>
      <th>讲师资格证</th>
      <th>是否审核通过</th>
      <!-- <th>选项D内容</th> -->
      <th>操作</th>
  </tr>
  </thead>
  <tbody>
    @foreach($data as $k=>$v)
      @if($v->lereg_is==0)
        <tr lereg_id="{{$v->lereg_id}}">
          <!-- <td>1</td> -->
          <td class="lereg_id">{{$v->lereg_id}}</td>
          <td>{{$v->lereg_name}}</td>
          <td>{{$v->lereg_school}}</td>
          <td><img src="{{env('IMG_URL')}}{{$v->lereg_qual}}" width="50px" height="50px" alt=""></td>
          <td>
            @if($v->lereg_is==0)审核中 @endif
            @if($v->lereg_is==1)是 @endif
            @if($v->lereg_is==2)审核未通过 @endif
          </td>
          <td>
            <a class="btn btn-danger" href="{{url('/teacher/del/'.$v->lereg_id)}}">删除</a> |   
            <a class="btn btn-info" href="{{url('/teacher/upd/'.$v->lereg_id)}}">修改</a>  |
            <button class="btn btn-info tongguo" value="{{$v->lereg_id}}">通过审核</button> |
            <button class="btn btn-info weitong" value="{{$v->lereg_id}}">审核未通过</button>
          </td>
      </tr>
      @elseif($v->lereg_is==1)
        <tr lereg_id="{{$v->lereg_id}}">
          <!-- <td>1</td> -->
          <td class="lereg_id">{{$v->lereg_id}}</td>
          <td>{{$v->lereg_name}}</td>
          <td>{{$v->lereg_school}}</td>
          <td><img src="{{env('IMG_URL')}}{{$v->lereg_qual}}" width="50px" height="50px" alt=""></td>
          <td>
            @if($v->lereg_is==0)审核中 @endif
            @if($v->lereg_is==1)是 @endif
            @if($v->lereg_is==2)审核未通过 @endif
          </td>
          <td>
            <a class="btn btn-danger" href="{{url('/teacher/del/'.$v->lereg_id)}}">删除</a> |   
            <a class="btn btn-info" href="{{url('/teacher/upd/'.$v->lereg_id)}}">修改</a>  |
          </td>
      </tr>
      @elseif($v->lereg_is==2)
        <tr lereg_id="{{$v->lereg_id}}">
            <!-- <td>1</td> -->
            <td class="lereg_id">{{$v->lereg_id}}</td>
            <td>{{$v->lereg_name}}</td>
            <td>{{$v->lereg_school}}</td>
            <td><img src="{{env('IMG_URL')}}{{$v->lereg_qual}}" width="50px" height="50px" alt=""></td>
            <td>
              @if($v->lereg_is==0)审核中 @endif
              @if($v->lereg_is==1)是 @endif
              @if($v->lereg_is==2)审核未通过 @endif
            </td>
            <td>
              <a class="btn btn-danger" href="{{url('/teacher/del/'.$v->lereg_id)}}">删除</a> |   
              <a class="btn btn-info" href="{{url('/teacher/upd/'.$v->lereg_id)}}">修改</a>  |
            </td>
        </tr>
      @endif
        
   @endforeach
   <td>
      <td colspan="10">{{$data->appends(['lereg_name'=>$lereg_name])->links()}}</td>
   </td>
  </tbody>
</table>
<script>
  $(document).ready(function(){
      $(".tongguo").click(function(){
         var lereg_id = $(this).val();
         // alert(lereg_id)
         // return false;
         $.get("{{url('/teacher/tongguoshenhe')}}",{lereg_id:lereg_id},function(res){
             $('#success').trigger('click')
                //提示语
              $('#prompt').html('<h1>确认审核通过吗？</h1>')
                    //按钮的字
              $('#jump').text('确认')

                    //跳转
              $(document).on('click','#jump',function(){
                        //跳转地址
                location.href="/teacher/indexis";
              })
         },'json');
      })
      $(".weitong").click(function(){
        var lereg_id = $(this).val();
         
         $.get("{{url('/teacher/weitongguo')}}",{lereg_id:lereg_id},function(res){
            if(res.code==0){
              $('#success').trigger('click')
                //提示语
              $('#prompt').html('<h1>确认审核未通过吗？</h1>')
                    //按钮的字
              $('#jump').text('确认')

                    //跳转
              $(document).on('click','#jump',function(){
                        //跳转地址
                location.href="/teacher/indexis";
              })
            }else{

            }
         },'json');
      })
  })
</script>
@endsection
