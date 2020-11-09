@extends('admin.index')
@section('title','多选题添加')
@section('content')
<form class="form-horizontal" role="form">
  <div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">题目类型</label>
      <div class="col-sm-10">
        
                   <input type="radio" class="question_diff" name="question_type_id" value="1" >单选题
                  <input type="radio" class="question_diff" name="question_type_id" value="2" checked>多选题
                  <input type="radio" class="question_diff" name="question_type_id" value="3">简答题
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
          <textarea class="form-control"  rows="3"></textarea>
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
                  <input type="checkbox" id="inlineCheckbox1" value="option1"> A
                  <input type="checkbox" id="inlineCheckbox1" value="option1"> B
                  <input type="checkbox" id="inlineCheckbox1" value="option1"> C
                  <input type="checkbox" id="inlineCheckbox1" value="option1"> D
          </div>
        </div>
    </div>

    <div class="form-group">
      <label for="firstname" class="col-sm-2 control-label">选项内容</label>
        <div class="col-sm-10">
          A
          <textarea class="form-control"  rows="3"></textarea>
      </div>
    </div>

     <div class="form-group">
      <label for="firstname" class="col-sm-2 control-label">选项内容</label>
        <div class="col-sm-10">
          B
          <textarea class="form-control"  rows="3"></textarea>
      </div>
    </div>

     <div class="form-group">
      <label for="firstname" class="col-sm-2 control-label">选项内容</label>
        <div class="col-sm-10">
          C
          <textarea class="form-control"  rows="3"></textarea>
      </div>
    </div>    

     <div class="form-group">
      <label for="firstname" class="col-sm-2 control-label">选项内容</label>
        <div class="col-sm-10">
          D
          <textarea class="form-control"  rows="3"></textarea>
      </div>
    </div>
    

    </div>
    <!-- <button type="submit" class="form-control " style="backgroundcolor:red">添加</button> -->
    <center><button type="button" class="btn btn-primary form-control">添加</button></center>
   <div class="col-sm-offset-2 col-sm-10">
      
    </div>
  </div>
</form> 
@endsection