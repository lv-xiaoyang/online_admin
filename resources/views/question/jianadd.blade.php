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
                  <input type="radio" class="question_diff" name="question_diff" value="1" checked>简单
                  <input type="radio" class="question_diff" name="question_diff" value="2">中等
                  <input type="radio" class="question_diff" name="question_diff" value="3">困难
              </label>
          </div>
        </div>
    </div>


  <div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">简答题目</label>

    
	    <div class="col-sm-10">
	      
	    	<textarea class="form-control" id="question_name"  rows="3"></textarea>
	  </div>
    </div>


  
  	<div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">答案</label>
	    <div class="col-sm-10">
	      
	    	<textarea class="form-control" id="cor_a"  rows="3"></textarea>
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

    $("#question_name").blur(function(){
      var question_name=$("#question_name").val();
      $.get("{{url('/question/dancount')}}",{question_name:question_name},function(res){
        if(res==1){
                 //触发提示框
                $('#success').trigger('click')
                //提示语
                $('#prompt').html('<h1>该名称已存在</h1>')
                //按钮的字
                $('#jump').text('确定')
        }else{
          
        }

      })
    })

    $("#button").click(function(){
        var question_name = $("#question_name").val();
        // 题干
        // alert(question_name)
        //题目类型
        var  question_type_id = $("input[name='question_type_id']:checked").val();
        // alert(question_type_id)
        // 题目难度
        var question_diff = $("input[name='question_diff']:checked").val();
        //答案

   
        var cor_a = $("#cor_a").val();
         $.ajax({
          type:"post",
          url:"{{url('/question/jianaddo')}}",
          dataType:"json",
          headers:{'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')},
          data:{question_name:question_name,question_type_id:question_type_id,question_diff:question_diff,cor_a:cor_a},
          success:function(res){
           if(res.code==1){
            // alert(res.msg);
            //触发提示框
                $('#success').trigger('click')
                //提示语
                $('#prompt').html('<h1>添加失败</h1>')
               
          }
          if(res.code==0){
            //触发提示框
                $('#success').trigger('click')
                //提示语
                $('#prompt').html('<h1>添加成功</h1>')
                //按钮的字
                $('#jump').text('去展示')

                //跳转
                $(document).on('click','#jump',function(){
                    //跳转地址
                    location.href="/question/index"
                })

            }
          }
        })
    })
  })
</script>
@endsection