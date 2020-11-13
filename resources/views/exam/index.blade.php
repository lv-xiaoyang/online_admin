@extends('admin.index')
@section('title','考试添加页面')
@section('content')


<table class="table table-condensed">

  <caption>题库展示</caption>
  <button type="submit"  style="float:right" class="btn btn-default"><a href="{{url('/question/huifuindex')}}">恢复已删除</a></button>  
  <thead>
    <tr>
      <th>id</th>
      <th>题干</th>
      <th>及格分数</th>
      <th>开始时间</th>
      <th>结束时间</th>
      <th>状态</th>
      <th>操作</th>
  </tr>
  </thead>
  <tbody>
	@foreach($data as $k=>$v)
    <tr>
      <td>{{$v->exam_id}}</td>
      <td>{{$v->exam_name}}</td>
      <td>60/100</td>
      <td>{{$v->start_time}}</td>
      <td>{{$v->end_time}}</td>
      <td>
      	@if($v->is_del==0)
      		已启用
      	@elseif($v->is_del==1)
      		已停用
      	@endif
      </td>
      <td>
      	
      	<button class="btn btn-info" value="{{$v->exam_id}}"><a href="{{url('/exam/danadd/'.$v->exam_id)}}">添加单选题</a></button>
      	<button class="btn btn-info" value="{{$v->exam_id}}"><a href="{{url('/exam/duoadd/'.$v->exam_id)}}">添加多选题</a></button>
      	<button class="btn btn-info" value="{{$v->exam_id}}"><a href="{{url('/exam/jianadd/'.$v->exam_id)}}">添加简答题</a></button>
      	<button class="btn btn-info" value="{{$v->exam_id}}"><a href="{{url('/exam/looks/'.$v->exam_id)}}">查看考题</a></button>
      	@if($v->is_del==0)
			<button class="btn btn-info" value="{{$v->exam_id}}"><a href="{{url('/exam/examdel/'.$v->exam_id)}}">停用</a></button>
      	@elseif($v->is_del==1)
			<button class="btn btn-info" value="{{$v->exam_id}}"><a href="{{url('/exam/examdel2/'.$v->exam_id)}}">启用</a></button>
      	@endif
      	
      </td>
  </tr>
	@endforeach
	<td>
      <td colspan="10">{{$data->links()}}</td>
   </td>
  </tbody>
</table>
<script>
	$(document).ready(function(){
		$(".dan").click(function(){
			var exam_id = $(this).val();
			$.get("{{url('')}}",{exam_id:exam_id},function(){
				alert(res)
			})
		})
		$(".duo").click(function(){
			var exam_id = $(this).val();
			$.get("{{url('/exam/duoadd')}}",{exam_id:exam_id},function(){
				alert(res)
			})
		})
		$(".jian").click(function(){
			var exam_id = $(this).val();
			$.get("{{url('/exam/jianadd')}}",{exam_id:exam_id},function(){
				alert(res)
			})
		})
	})
</script>

@endsection