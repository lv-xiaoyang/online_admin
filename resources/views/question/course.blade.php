@extends('admin.index')
@section('title','关联课程')
@section('content')
<form role="form">
  <div class="form-group">
    <label for="name">关联课程</label>
    <select name="course_id" id="course_id" class="form-control">
      <option>请选择</option>
      @foreach($course as $k=>$v)
      <option value="{{$v->course_id}}">{{$v->course_name}}</option>
      @endforeach
    </select>
  </div>

  <div class="form-group">
    <label for="name">关联课程章</label>
    <select name="chapter_name"  id="chapter_id" class="form-control">
      <option value=''>请选择</option>
      
    </select>
  </div>


  <div class="form-group">
    <label for="name">关联课程节</label>
    <select name="section_name" id="section_id" class="form-control">
      <option value=''>请选择</option>
      <input type="hidden" id="question_id" value="{{$question_id}}"> 
    </select>
  </div>


  <div class="form-group">
    <label for="name">关联课时</label>
    <select name="class_name" id="class_id" class="form-control">
      <option value=''>请选择</option>
      
    </select>
  </div>
  <center>
  	<button type="button" id="button" class="btn btn-primary form-control">添加</button>
  </center>
</form>
<script>
    $(function(){
        $("select[name='course_id']").change(function(){
            //获取当前课程id
            var course_id=$(this).val();

            $.ajax({
              headers:{'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')},
              url:"{{url('/question/courses')}}",
              type:"get",
              dateType:"json",
              data:{course_id:course_id},
              success:function(res){
                var str = "<option value=''>请选择</option>";
                $.each(res,function(index,el){
                  // console.log(el)
                  str += "<option value='"+el.chapter_id+"'>"+el.chapter_name+"</option>";
                })

                // str + "";

                // 清除追加
                $("select[name='chapter_name']").find("option").remove();
                $("select[name='section_name']").find("option").remove();
                $("select[name='class_name']").find("option").remove();

                $("select[name='section_name']").append("<option value=''>请选择</option>");
                $("select[name='class_name']").append("<option value=''>请选择</option>");
                $("select[name='chapter_name']").append(str);
              }
            })

        });

        $("select[name='chapter_name']").change(function(){
          var chapter_id=$(this).val();
          $.ajax({
              headers:{'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')},
              url:"{{url('/question/sectionn')}}",
              type:"get",
              dateType:"json",
              data:{chapter_id:chapter_id},
              success:function(res){
                var str = "<option value=''>请选择</option>";
                $.each(res,function(index,el){
                  // console.log(el)
                  str += "<option value='"+el.section_id+"'>"+el.section_name+"</option>";
                })
                // 清除追加
                $("select[name='section_name']").find("option").remove();
                $("select[name='class_name']").find("option").remove();

                $("select[name='class_name']").append("<option value=''>请选择</option>");
                $("select[name='section_name']").append(str);
              }
            })
        })



        $("select[name='section_name']").change(function(){
          var section_id=$(this).val();
          $.ajax({
              headers:{'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')},
              url:"{{url('/question/coursec')}}",
              type:"get",
              dataType:"json",
              data:{section_id:section_id},
              success:function(res){
                var str = "";
                $.each(res,function(index,el){
                  // console.log(el)
                  str += "<option value='"+el.class_id+"'>"+el.class_name+"</option>";
                })
                // 清除追加
                // $("select[name='class_name']").find("option").remove();

                $("select[name='class_name']").append(str);
              }
            })
        })

        $("#button").click(function(){
          var course_id = $("#course_id").find("option:selected").val();
          var chapter_id = $("#chapter_id").find("option:selected").val();
          var section_id = $("#section_id").find("option:selected").val();
          var class_id = $("#class_id").find("option:selected").val();
          var question_id = $("#question_id").val();
          // alert(question_id)
          $.ajax({
            type:"get",
            url:"{{url('/question/coursecreate')}}",
            dataType:"json",
            data:{question_id:question_id,course_id:course_id,chapter_id:chapter_id,section_id:section_id,class_id:class_id},
            success:function(res){
              if(res.code==0){
                alert(res.msg)
                window.location.href="/question/index";
              }
              if(res.code==1){
                alert(res.msg)
              }
            }
          })
        })

    })
</script>
@endsection