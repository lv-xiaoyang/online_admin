@extends('admin.index')
@section('title','简答题添加')
@section('content')

<form class="form-horizontal" role="form">

<div class="form-group">
        <label for="firstname" class="col-sm-2 control-label">题目类型</label>
          <div class="col-sm-10">
            
                       <input type="radio" class="question_type_id" name="question_type_id" value="1" >单选题
                      <input type="radio" class="question_type_id" name="question_type_id" value="2" >多选题
                      <input type="radio" class="question_type_id" name="question_type_id" value="3" checked>简答题
        </div>
        </div>  


  <div class="form-group">
      <label for="firstname" class="col-sm-2 control-label">题目难度</label>
        <div class="col-sm-10">
          <div>
              <label>
                  <input type="radio" class="question_diff" name="question_diff" value="1" @if($data->question_diff==1)checked @endif>简单
                  <input type="radio" class="question_diff" name="question_diff" value="2" @if($data->question_diff==2)checked @endif>中等
                  <input type="radio" class="question_diff" name="question_diff" value="3" @if($data->question_diff==3)checked @endif>困难
              </label>
          </div>
        </div>
    </div>


  <div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">简答题目</label>

    
	    <div class="col-sm-10">
	      
	    	<textarea class="form-control" id="question_name"  rows="3">{{$data->question_name}}</textarea>
	  </div>
    </div>


  
  	<div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">答案</label>
	    <div class="col-sm-10">
	      
	    	<textarea class="form-control" id="cor_a"  rows="3">{{$data->cor_a}}</textarea>
	  </div>

    </div>
    <!-- <button type="submit" class="form-control " style="backgroundcolor:red">添加</button> -->
    <center><button type="button" id="button" class="btn btn-primary form-control">修改</button></center>
   <div class="col-sm-offset-2 col-sm-10">
    </div>
  </div>
</form>
<script>
  $("#button").click(function(){
    var question_name = $("#question_name").val();
        // 题干
        // alert(question_name)
        //题目类型
        var question_id = {{$data->question_id}}
        // alert(question_id)
        // return false;
        var  question_type_id = $("input[name='question_type_id']:checked").val();
        // alert(question_type_id)
        // 题目难度
        var question_diff = $("input[name='question_diff']:checked").val();
        //答案
        var cor_a = $("#cor_a").val();

        $.ajax({
          type:"post",
          url:"{{url('/question/jianupdate')}}",
          dataType:"json",
          headers:{'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')},
          data:{question_id:question_id,question_name:question_name,question_type_id:question_type_id,question_diff:question_diff,cor_a:cor_a},
          success:function(res){
            if(res.code==0){
                alert(res.msg);
                window.location.href="/question/index";
            }
            if(res.code){
              alert(res.msg)
            }
          }
        })
  })
</script>
@endsection