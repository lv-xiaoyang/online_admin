@extends('admin.index')
@section('title','讲师修改')
@section('content')

<form method="post" class="form-horizontal" role="form"   enctype="multipart/form-data">
   @csrf  

   <div class="form-group">
        <label for="firstname" class="col-sm-2 control-label">讲师昵称</label>
          <div class="col-sm-10" lereg_id="{{$data->lereg_id}}">
            <input type="text" class="form-control" id="lereg_name" name="lereg_name"  value="{{$data->lereg_name}}">
        </div>
    </div>  

    <div class="form-group">
      <label for="firstname" class="col-sm-2 control-label">讲师简历</label>
        <div class="col-sm-10">
          <textarea class="form-control" id="lereg_res" rows="3" >{{$data->lereg_res}}</textarea>
      </div>
    </div>

    <div class="form-group">
        <label for="firstname" class="col-sm-2 control-label">学历</label>
        <div class="col-sm-10">
        <select  class="col-sm-8" name="lereg_edu" id="lereg_edu">
            <option value="">--请选择--</option>
            <option value="1" @if($data->lereg_edu==1) selected @endif>博士研究生</option>
            <option value="2" @if($data->lereg_edu==2)selected @endif >硕士研究生</option>
            <option value="3" @if($data->lereg_edu==3)selected @endif>本科</option>
            <option value="4" @if($data->lereg_edu==4)selected @endif>专科</option>
            <option value="5" @if($data->lereg_edu==5)selected @endif>中专/高中</option>
        </select>
        </div>
    </div>


    <div class="form-group">
        <label for="firstname" class="col-sm-2 control-label">毕业院校</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="lereg_school" name="lereg_school"  value="{{$data->lereg_school}}">
        </div>
    </div>  

    <div class="form-group">
      <label for="firstname" class="col-sm-2 control-label">讲师授课风格</label>
        <div class="col-sm-10">
          <textarea class="form-control" id="lereg_style" rows="3" >{{$data->lereg_style}}</textarea>
      </div>
    </div>
    <div class="form-group">
      <label for="firstname" class="col-sm-2 control-label">所学专业</label>
        <div class="col-sm-10">
          <input class="form-control" id="lereg_magor" rows="3" value="{{$data->lereg_magor}}">
      </div>
    </div>
    <div class="form-group">
      <label for="firstname" class="col-sm-2 control-label">教师资格证</label>
        <div class="col-sm-10">
        <input type="file"  id="lereg_qual"  width="50" value="{{$data->lereg_qual}}" hight="50" name="lereg_qual">
        <img src="{{env('IMG_URL')}}{{$data->lereg_qual}}" width="120" hight="50" alt="">
      </div>
    </div>

    <div class="form-group">
        <label for="firstname" class="col-sm-2 control-label">从业时长</label>
        <div class="col-sm-10">
        <select  class="col-sm-8" name="lereg_time" id="lereg_time">
            <option value="">--请选择--</option>
            <option value="1" @if($data->lereg_time==1) selected @endif>10年以上</option>
            <option value="2" @if($data->lereg_time==2) selected @endif>5-10年</option>
            <option value="3" @if($data->lereg_time==3) selected @endif>2-5年</option>
            <option value="4" @if($data->lereg_time==4) selected @endif>1-2年</option>
        </select>
        </div>
    </div>
   
    <center><button type="button" id="button" class="btn btn-primary form-control">修改</button></center>
    <!-- <div class="col-sm-offset-2 col-sm-10"> -->
    <!-- <div class="form-group"> -->
        <!-- <button class="btn btn-info" id="button">修改</button> -->
    <!-- </div> -->
</form>
<!-- InestanceEndEditable -->
<script>
  $(document).ready(function(){
    //   alert(2345);
    $("#button").click(function(){
        var lereg_name = $('#lereg_name').val();
        var lereg_res = $("#lereg_res").val();
        var lereg_edu = $("#lereg_edu").val();
        var lereg_school = $("#lereg_school").val();
        var lereg_style = $("#lereg_style").val();
        var lereg_magor = $("#lereg_magor").val();
        var lereg_qual =$("#lereg_qual").val();
        var lereg_time = $("#lereg_time").val();
        var lereg_id = {{$data->lereg_id}};

        // console.log(lereg_id);
        // return false;
         $.ajax({
          type:"post",
          url:"/teacher/update/"+lereg_id,
          dataType:"json",
          headers:{'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')},
          data:{lereg_name:lereg_name,lereg_res:lereg_res,lereg_edu:lereg_edu,lereg_school:lereg_school,lereg_style:lereg_style,lereg_magor:lereg_magor,lereg_qual:lereg_qual,lereg_time:lereg_time,lereg_id:lereg_id},
          success:function(res){
           if(res.code==0002){
            // alert(res.msg);
            //触发提示框
                $('#success').trigger('click')
                //提示语
                $('#prompt').html('<h1>修改失败</h1>')
               
          } 
          if(res.code==0001){
            //触发提示框
                $('#success').trigger('click')
                //提示语
                $('#prompt').html('<h1>修改成功</h1>')
                //按钮的字
                $('#jump').text('去展示')
                
            }
          }
        })  
    })
  })
  //跳转
  $(document).on('click','#jump',function(){
                    //跳转地址
    location.href="/teacher"
  });
</script>

@endsection