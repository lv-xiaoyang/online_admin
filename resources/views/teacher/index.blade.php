@extends('admin.index')
@section('title','讲师展示')
@section('content')


<table class="table table-condensed">
  <form action="">
      <input type="text" name="lereg_name">
      <input type="submit" value="昵称搜索">
  </form>

  <caption>讲师展示</caption>
  <thead>
    <tr>
      <th>id</th>
      <th>讲师名称</th>
      <th>讲师履历</th>
      <th>讲师学历</th>
      <th>讲师毕业学校</th>
      <th>讲师专业</th>
      <th>从业时长</th>
      <th>是否审核通过</th>
      <!-- <th>选项D内容</th> -->
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
      <td>{{$v->lereg_time}}</td>
      <td>
        
        @if($v->lereg_is==0)审核中 @endif
        @if($v->lereg_id==1)是 @endif
        @if($v->lereg_id==2)审核未通过 @endif
      </td>
      <td>
      	<a href="{{url('/teacher/del/'.$v->lereg_id)}}">删除</a> | 	
      	<a href="{{url('/teacher/upd/'.$v->lereg_id)}}">修改</a>
      </td>
  </tr>
   @endforeach
   <td>
      <td colspan="10">{{$data->links()}}</td>
   </td>
  </tbody>
</table>

@endsection
