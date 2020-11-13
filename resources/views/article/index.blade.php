@extends('admin.index')
@section('title','资讯展示')
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
                      <input type="text" placeholder="Search..." value="{{$ati_name}}" style="height:37px" name="ati_name"  class="form-control">
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

  <caption>数据展示</caption>
  <thead>
    <tr>
      <th>资讯ID</th>
      <th>资讯标题</th>
      <th>资讯内容</th>
      <th>资讯作者</th>
      <th>是否热门</th>
      <th>发布时间</th>
      <th>操作</th>
  </tr>
  </thead>
  <tbody>
    @foreach($data as $k=>$v)
    <tr>
      <td>{{$v->ati_id}}</td>
      <td>{{$v->ati_name}}</td>
      <td>{{$v->ati_content}}</td>
      <td>{{$v->ati_res}}</td>
      <td>@if($v->ati_ishot==1)热门资讯 @elseif($v->ati_ishot==2)普通资讯@endif</td>
      <td>{{date('Y-m-d H:i:s',$v->ati_addtime)}}</td>
      <td>
      	<button class="btn btn-danger delas"  value="{{$v->ati_id}}">删除</button> | 	
        <!-- <button class="delssss">111</button> -->
      	<a class="btn btn-info" href="{{url('/article/update/'.$v->ati_id)}}">修改</a>
      </td>
  </tr>

  @endforeach
   <td>
   </td>
  </tbody>
    <td>
      <td colspan="10">{{$data->appends(['ati_name'=>$ati_name])->links()}}</td>
    </td>
</table>




<script>
    // $(document).ready(function(){
        $(document).on('click','.delas',function(){
          // alert(111);
          // return ;
          var _this=$(this);
          var id = _this.val();
              // console.log(id);
              // return false;
          $('#success').trigger('click')
                      //提示语
              $('#prompt').html('<h1>确认删除吗？</h1>')
                      //按钮的字
              $('#jump').text('确认')

                      //跳转
              $(document).on('click','#jump',function(){
                          //跳转地址
                  location.href="/article/del/"+id;
              })
        })

    // })


</script>



@endsection