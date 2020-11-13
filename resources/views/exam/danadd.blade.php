@extends('admin.index')
@section('title','考试添加页面')
@section('content')

	
<div class="form-group">
	<input type="hidden" id="exam_id" value="{{$exam_id}}">
      <label for="firstname" class="col-sm-2 control-label">添加单选题</label>
        <div class="col-sm-10">
          <select style="width:180px;center" id="question_id" class="form-control">

            <option value="">请选择</option>
            @foreach($dan as $k=>$v)
            <option value="{{$v->question_id}}">{{$v->question_name}}</option>
            @endforeach
            
		   </select>
      </div>
      <center><button type="button" id="button" class="btn btn-primary form-control">添加</button></center>
<script>
	$(document).ready(function(){
		$("#button").click(function(){
			var question_id = $("#question_id").val();
			var exam_id = $("#exam_id").val();
			$.get("{{url('/exam/danadddo')}}",{question_id:question_id,exam_id:exam_id},function(res){
				$('#success').trigger('click')
	               		 //提示语
			        	$('#prompt').html('<h1>添加成功</h1>')
			                //按钮的字
			          	$('#jump').text('确认')

			                //跳转
			         	$(document).on('click','#jump',function(){
			                    //跳转地址
			            	location.href="/exam/index";
			          })
			},'json')
		})
	})
</script>
@endsection