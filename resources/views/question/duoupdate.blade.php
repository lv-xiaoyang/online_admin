@extends('admin.index')
@section('title','多选题添加')
@section('content')
<form class="form-horizontal" role="form">
  <div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">题目类型</label>
      <div class="col-sm-10">
        
                   <input type="radio" class="question_type_id" name="question_type_id" value="1" >单选题
                  <input type="radio" class="question_type_id" name="question_type_id" value="2" checked>多选题
                  <input type="radio" class="question_type_id" name="question_type_id" value="3">简答题
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
      <label for="firstname" class="col-sm-2 control-label">题干</label>
        <div class="col-sm-10">
          <textarea class="form-control" id="question_name" rows="3">{{$data->question_name}}</textarea>
      </div>
    </div>



    <div class="form-group">
      <label for="firstname" class="col-sm-2 control-label">正确答案</label>
        <div class="col-sm-10">
          <div id="question_cor">
                  <input type="checkbox" id="inlineCheckbox1" name="question_cor" class="A" value="1"  > A
                  <input type="checkbox" id="inlineCheckbox1" name="question_cor" class="B" value="2"  > B
                  <input type="checkbox" id="inlineCheckbox1" name="question_cor" class="C" value="3"  > C
                  <input type="checkbox" id="inlineCheckbox1" name="question_cor" class="D" value="4"  > D
          </div>
        </div>
    </div>

    <div class="form-group">
      <label for="firstname" class="col-sm-2 control-label">选项内容</label>
        <div class="col-sm-10">
          A
          <textarea class="form-control" id="cor_a"  rows="3">{{$data->cor_a}}</textarea>
      </div>
    </div>

     <div class="form-group">
      <label for="firstname" class="col-sm-2 control-label">选项内容</label>
        <div class="col-sm-10">
          B
          <textarea class="form-control" id="cor_b" rows="3">{{$data->cor_b}}</textarea>
      </div>
    </div>

     <div class="form-group">
      <label for="firstname" class="col-sm-2 control-label">选项内容</label>
        <div class="col-sm-10">
          C
          <textarea class="form-control" id="cor_c"  rows="3">{{$data->cor_c}}</textarea>
      </div>
    </div>    

     <div class="form-group">
      <label for="firstname" class="col-sm-2 control-label">选项内容</label>
        <div class="col-sm-10">
          D
          <textarea class="form-control"  id="cor_d" rows="3">{{$data->cor_d}}</textarea>
      </div>
    </div>
    

    </div>
    <center><button type="button" id="button" class="btn btn-primary form-control">修改</button></center>
   <div class="col-sm-offset-2 col-sm-10">
      
    </div>
  </div>
</form> 
<script>
  $(document).ready(function(){
      $("#button").click(function(){
        // alert(123)
          // 题干
          var question_name = $("#question_name").val();
          var question_id = {{$data->question_id}}
          // alert(question_id)
          // return false;
          //题目类型
          var  question_type_id = $("input[name='question_type_id']:checked").val();
          // 题目难度
          var question_diff = $("input[name='question_diff']:checked").val();
          //答案
          var question_cor =[];
          $('input[name="question_cor"]:checked').each(function(){
            question_cor.push($(this).val());
          });
          //选项A内容
          var cor_a = $("#cor_a").val();
          // 选项B内容
          var cor_b = $("#cor_b").val();
          // 选项C内容
          var cor_c = $("#cor_c").val();
          // 选项D内容
          var cor_d = $("#cor_d").val();
          $.ajax({
          type:"post",
          headers:{'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')},
          url:"{{url('/question/duoupdate')}}",
          dataType:"json",
          data:{question_id:question_id,question_name:question_name,question_type_id:question_type_id,question_diff:question_diff,question_cor:question_cor,cor_a:cor_a,cor_b:cor_b,cor_c:cor_c,cor_d:cor_d},
          success:function(res){
            if(res.code==1){
              //触发提示框
                  $('#success').trigger('click')
                  //提示语
                  $('#prompt').html('<h1>修改失败</h1>')
            }
            if(res.code==0){
              //触发提示框
                  $('#success').trigger('click')
                  //提示语
                  $('#prompt').html('<h1>修改成功</h1>')
                  //按钮的字
                  $('#jump').text('去展示')

                  //跳转
                  $(document).on('click','#jump',function(){
                      //跳转地址
                      location.href="/question/index"
                  })

            }
            // alert(res)
          }
        })

      })

      //复选框默认选中
      var A = $(".A").val();
      var B = $(".B").val();
      var c = $(".C").val();
      var D = $(".D").val();
      var aa = {{$a}};
      var bb = {{$b}};
      if(A==aa || A==bb){
        $(".A").attr("checked",true)
      }
      if(B==aa || B==bb){
        $(".B").attr("checked",true)
      }
      if(C==aa || C==bb){
        $(".C").attr("checked",true)
      }
      if(D==aa || D==bb){
        $(".D").attr("checked",true)
      }
     
    
      

  })
</script>


@endsection