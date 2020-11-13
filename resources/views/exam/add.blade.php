@extends('admin.index')
@section('title','考试添加页面')
@section('content')

	

<form class="form-horizontal" role="form">







   <div class="form-group">
      <label for="firstname" class="col-sm-2 control-label">题干</label>
        <div class="col-sm-10">
          <textarea class="form-control" id="exam_name" rows="3" ></textarea>
      </div>
    </div>

	<div class="form-group">
      <label for="firstname" class="col-sm-2 control-label">开始时间</label>
        <div class="col-sm-10">
          <input type="datetime-local" id="start_time"/>
      </div>
    </div>

	<div class="form-group">
      <label for="firstname" class="col-sm-2 control-label">结束时间</label>
        <div class="col-sm-10">
         <input type="datetime-local" id="end_time"/>
      </div>
    </div>

	


    </div>
    <!-- <button type="submit" class="form-control " style="backgroundcolor:red">添加</button> -->
    <center><button type="button" id="button" class="btn btn-primary form-control">添加</button></center>
   <div class="col-sm-offset-2 col-sm-10">
      
    </div>
  </div>
</form>
<script>
	$(document).ready(function(){
		$("#button").click(function(){
			var exam_name = $("#exam_name").val();
			var start_time = $("#start_time").val();
			var end_time = $("#end_time").val();
			// alert(end_time)
			// return false
			$.ajax({
				headers:{'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')},
				type:"post",
				url:"{{url('/exam/adddo')}}",
				dataType:"json",
				data:{exam_name:exam_name,start_time:start_time,end_time:end_time},
				success:function(res){
					if(res.code==0){
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
					}else{
						$('#success').trigger('click')
	               		 //提示语
			        	$('#prompt').html('<h1>'+res.msg+'</h1>')
			                //按钮的字
			          	$('#jump').text('确认')
					}
				}
			})
		})
	})
</script>
@endsection