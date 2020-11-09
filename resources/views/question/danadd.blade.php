@extends('admin.index')
@section('title','单选题添加')
@section('content')

<form class="form-horizontal" role="form">



      <div class="form-group">
        <label for="firstname" class="col-sm-2 control-label">题目类型</label>
          <div class="col-sm-10">
            
                       <input type="radio" class="question_type_id" name="question_type_id" value="1" checked>单选题
                      <input type="radio" class="question_type_id" name="question_type_id" value="2" >多选题
                      <input type="radio" class="question_type_id" name="question_type_id" value="3">简答题
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
      <label for="firstname" class="col-sm-2 control-label">题干</label>
        <div class="col-sm-10">
          <textarea class="form-control" id="question_name" rows="3"></textarea>
      </div>
    </div>

  <!--   <div class="form-group">
      <label for="firstname" class="col-sm-2 control-label">选项个数</label>
        <div class="col-sm-10">
          <select style="width:180px;center" class="form-control">
            <option>1</option>
            <option>2</option>
            <option>3</option>
            <option>4</option>
          </select>
      </div>
    </div> -->


    <div class="form-group">
      <label for="firstname" class="col-sm-2 control-label">正确答案</label>
        <div class="col-sm-10">
          <div>
                  <label><input type="radio" class="question_cor" name="question_cor" value="1" checked>A</label>
                  <label><input type="radio" class="question_cor" name="question_cor" value="2">B</label>
                  <label><input type="radio" class="question_cor" name="question_cor" value="3">C</label>
                  <label><input type="radio" class="question_cor" name="question_cor" value="4">D</label>
          </div>
        </div>
    </div>

    <div class="form-group">
      <label for="firstname" class="col-sm-2 control-label">选项内容</label>
        <div class="col-sm-10">
          A
          <textarea class="form-control" id="cor_a"  rows="3"></textarea>
      </div>
    </div>

     <div class="form-group">
      <label for="firstname" class="col-sm-2 control-label">选项内容</label>
        <div class="col-sm-10">
          B
          <textarea class="form-control" id="cor_b" rows="3"></textarea>
      </div>
    </div>

     <div class="form-group">
      <label for="firstname" class="col-sm-2 control-label">选项内容</label>
        <div class="col-sm-10">
          C
          <textarea class="form-control" id="cor_c"  rows="3"></textarea>
      </div>
    </div>    

     <div class="form-group">
      <label for="firstname" class="col-sm-2 control-label">选项内容</label>
        <div class="col-sm-10">
          D
          <textarea class="form-control"  id="cor_d" rows="3"></textarea>
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
      // 题干
      var question_name = $("#question_name").val();
      // alert(question_name)
      //题目类型
      var  question_type_id = $("input[name='question_type_id']:checked").val();
      // alert(question_type_id)
      // 题目难度
      var question_diff = $("input[name='question_diff']:checked").val();
      //答案
      var question_cor = $("input[name='question_cor']:checked").val();
      // alert(question_cor);
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
        dataType:"json",
        url:"{{url('/question/danadddo')}}",
        headers:{'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')},
        data:{question_name:question_name,question_type_id:question_type_id,question_diff:question_diff,question_cor:question_cor,cor_a:cor_a,cor_b:cor_b,cor_c:cor_c,cor_d:cor_d},
        success:function(res){
         if(res.code==1){
            alert(res.msg);
          }
          if(res.code==0){
            alert(res.msg);
            window.location.href="/question/index";
          }
        }
      })
     
    })
  })
</script>
@endsection