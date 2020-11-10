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
    <!-- <button type="submit" class="form-control " style="backgroundcolor:red">添加</button> -->
    <center><button type="button" id="button" class="btn btn-primary form-control">修改</button></center>
   <div class="col-sm-offset-2 col-sm-10">
      
    </div>
  </div>
</form> 
<script>
  $(document).ready(function(){
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