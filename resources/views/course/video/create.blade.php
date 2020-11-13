@extends('admin.index')
@section('title','节添加')
<meta name="csrf-token" content="{{ csrf_token() }}">
@section('content')
<center>
    <h2>视频添加</h2>
</center>
    <div class="form-group">
        <label for="name">所属课程</label>
        <select name="course_id" id="course_id">
            <option value="">--请选择--</option>
            @foreach($courese_data as $v)
            <option value="{{$v->course_id}}">{{$v->course_name}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="name">所属章程</label>
        <select name="chapter_id" id="chapter_id">
            <option value="">--请选择--</option>
            <option value=""></option>
        </select>
    </div>
    <div class="form-group">
        <label for="name">所属节</label>
        <select name="section_id" id="section_id">
            <option value="">--请选择--</option>
            <option value=""></option>
        </select>
    </div>
    <div class="form-group">
        <label for="name">所属课时</label>
        <select name="class_id" id="class_id">
            <option value="">--请选择--</option>
            <option value=""></option>
        </select>
    </div>
    <div class="form-group">
        <label for="name">视频</label>
        <input type="file" name="video" id="video">
        <div id="per_box" style="width: 350px; height: 15px; background-color: #cccccc">
            <div id="per" style="width: 0%; height: 100%; background-color: #007CD5"></div>
            <span id="per_num"></span>
            <input type="hidden" name="video_url" id="video_url">
            <input type="hidden" name="video_type" id="video_type">
        </div>
    </div>
    <div class="form-group">
        <label for="name">视频时长</label>
            <input type="text" class="form-control"  name="video_time" id="video_time" 
            placeholder="单位是小时，如：2:19:59 就是2小时19分钟59秒 ">
            
    </div>
    <div class="form-group">
        <input type="button" style="width:1200px;" id="button" class="btn btn-primary" value="添加视频">
    </div>


    <script>
    $(document).on('click','#button',function(){
        //获取课程id
        var course_id=$('select[name="course_id"] option:selected').val();
        //获取章程id
        var chapter_id=$('select[name="chapter_id"] option:selected').val();
        //获取节id
        var section_id=$('select[name="section_id"] option:selected').val();
        //获取课时id
        var class_id=$('select[name="class_id"] option:selected').val();
        //视频保存路径
        var video_url=$('#video_url').val();
        //获取视频时长
        var video_time=$('#video_time').val();
        //获取视频类型
        var video_type=$('#video_type').val();
        if(course_id==''){
            //触发提示框
            $('#success').trigger('click')
            //提示语
            $('#prompt').html("<h1>请先选择课程</h1>")
            return ;
        }
        if(chapter_id==''){
            //触发提示框
            $('#success').trigger('click')
            //提示语
            $('#prompt').html("<h1>请先选择章程</h1>")
            return ;
        }
        if(section_id==''){
            //触发提示框
            $('#success').trigger('click')
            //提示语
            $('#prompt').html("<h1>请先选择节</h1>")
            return ;
        }
        if(class_id==''){
            //触发提示框
            $('#success').trigger('click')
            //提示语
            $('#prompt').html("<h1>请先选择课时</h1>")
            return ;
        }
        if(video_url==''){
            //触发提示框
            $('#success').trigger('click')
            //提示语
            $('#prompt').html("<h1>请先上传视频</h1>")
            return ;
        }
        if(video_type==''){
            //触发提示框
            $('#success').trigger('click')
            //提示语
            $('#prompt').html("<h1>请正确填写视频时长</h1>")
            return ;
        }
        $.ajax({
            url:'/course/video/add',
            type:'post',
            data:{course_id:course_id,chapter_id:chapter_id,section_id:section_id,class_id:class_id,video_url:video_url,video_time:video_time},
            success:function(res){
                // console.log(res);
                if(res.code==0001){
                    //触发提示框
                    $('#success').trigger('click')
                    //提示语
                    $('#prompt').html("<h1>"+res.msg+"</h1>")
                    //按钮的字
                    $('#jump').text('去展示')
                }else{
                    //触发提示框
                    $('#success').trigger('click')
                    //提示语
                    $('#prompt').html("<h1>"+res.msg+"</h1>")
                }
            }
        })
    })
    $(document).on('change','#course_id',function(){
        //获取课程id
        var course_id=$('select[name="course_id"] option:selected').val();
        if(course_id==null){
            //触发提示框
            $('#success').trigger('click')
            //提示语
            $('#prompt').html("<h1>请先选择课程</h1>")
        }
        $.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });
        $.ajax({
            url:'/course/hour/chapter',
            type:'post',
            data:{course_id:course_id},
            success:function(res){
                if(res.code!=0002){
                    // console.log(res);return ;
                    var jj='<option value="">--请选择--</option>';
                    $.each(JSON.parse(res),function(idx,obj){
                        jj +="<option value='"+obj.chapter_id+"'>"+obj.chapter_name+"</option>";  
                    })
                    $('select[name="chapter_id"]').html(jj);
                }else{
                    //触发提示框
                    $('#success').trigger('click')
                    //提示语
                    $('#prompt').html("<h1>"+res.msg+"</h1>")
                }
            }
        })
    });
    $(document).on('change','#chapter_id',function(){
        //获取章程id
        var chapter_id=$('select[name="chapter_id"] option:selected').val();
        $.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });
        $.ajax({
            url:'/course/hour/section',
            type:'post',
            data:{chapter_id:chapter_id},
            success:function(res){
                if(res.code!=0002){
                    // console.log(res);return ;
                    var jj='<option value="">--请选择--</option>';
                    $.each(JSON.parse(res),function(idx,obj){
                        jj +="<option value='"+obj.section_id+"'>"+obj.section_name+"</option>";  
                    })
                    $('select[name="section_id"]').html(jj);
                }else{
                    //触发提示框
                    $('#success').trigger('click')
                    //提示语
                    $('#prompt').html("<h1>"+res.msg+"</h1>")
                }
            }
        })
    });
    $(document).on('change','#section_id',function(){
        //获取章程id
        var section_id=$('select[name="section_id"] option:selected').val();
        $.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });
        $.ajax({
            url:'/course/courseclass',
            type:'post',
            data:{section_id:section_id},
            success:function(res){
                if(res.code!=0002){
                    // console.log(res);return ;
                    var jj='<option value="">--请选择--</option>';
                    $.each(JSON.parse(res),function(idx,obj){
                        jj +="<option value='"+obj.class_id+"'>"+obj.class_name+"</option>";  
                    })
                    $('select[name="class_id"]').html(jj);
                }else{
                    //触发提示框
                    $('#success').trigger('click')
                    //提示语
                    $('#prompt').html("<h1>"+res.msg+"</h1>")
                }
            }
        })
    });
    $(document).on('change','#video',function(){
        var files= $('#video')[0].files[0];//获取视频对象
        if(!files){
            $("#file_tag").trigger("click");
        }
        var chunk;//当前已经有多少页
        upload(files);
    });
    function upload(file){
      var tmpName = file.size+"_chunk";
      var every_size=1024*20;//10kb
      chunk = window.localStorage.getItem(tmpName) || 1;//当前页
      chunk = parseInt(chunk);
      var chunks = Math.ceil(file.size/every_size);//总共有多少页
      var offset = (chunk-1) * every_size;//开始切割的位置
      var limit  = chunk * every_size > file.size ? file.size : chunk * every_size;//切割的结束位置
      var per= (limit/file.size* 100).toFixed(1); 
      var page = file.slice(offset,limit);//每页的数据

      var form = new FormData();//这是一个表单的对象
      form.append("page",page);
      form.append("filename",file.name);
      form.append("filesize",file.size);
      $.ajax({
         type : "post",
         url : '/course/upload',
         data : form,
         processData : false,
         contentType : false,
         cache : false,
         dataType : 'json',
         success:function(res){
            if(res.error==0){
               if(chunk >= chunks){
                  $("#per").css({width:"100%"});
                  $("#per_num").text("100%");
                  $('#video_url').val(res.path);
                  $('#video_type').val(res.type);
               }else{
                  chunk++;
                  window.localStorage.setItem(tmpName,chunk);
                  $("#per").css({width:per+"%"});
                  $("#per_num").text(per+"%");
                  upload(file);
               }
            }
         }
      });
   }

    /**
    * 跳转
    */
    $(document).on('click','#jump',function(){
        //跳转地址
        location.href='/course/index';
    })
</script>
@endsection
