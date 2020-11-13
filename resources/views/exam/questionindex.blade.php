@extends('admin.index')
@section('title','考试添加页面')
@section('content')


<table class="table table-condensed">

  <caption>题库展示</caption>
  <button type="submit"  style="float:right" class="btn btn-default"><a href="{{url('/question/huifuindex')}}">恢复已删除</a></button>  
  <thead>
    <tr>
      <th>id</th>
      <th>考试题目</th>
      <th>题型</th>
      <th>小题题目</th>
      <th>添加时间</th>
      <th>正确答案</th>
      <th>操作</th>
  </tr>
  </thead>
  <tbody>
	@foreach($data as $k=>$v)
    <tr>
      <td>{{$v->eq_id}}</td>
      <td>{{$v->exam_name}}</td>
      <td>@if($v->question_type_id==1)单选题 @elseif($v->question_type_id)多选题 @elseif($v->question_type_id==3)简答题 @endif</td>
      <td>{{$v->question_name}}</td>
      <td>{{date('Y-m-d H:i:s',$v->eq_time)}}</td>
      <td>{{$v->question_cor}}</td>
      <td>
      	<button class="btn btn-info" value="{{$v->exam_id}}"><a href="{{url('/exam/delete/'.$v->eq_id)}}">删除</a></button>
      </td>
  </tr>
	@endforeach
	
  </tbody>
</table>




@endsection