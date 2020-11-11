@extends('admin.index')
@section('title','节添加')
<meta name="csrf-token" content="{{ csrf_token() }}">
@section('content')
<center>
    <h2>节添加</h2>
</center>

        <div class="form-group">
            <label for="name">节名称</label>
            <input type="text" class="form-control" name="section_name" id="section_name" 
                placeholder="请输入节名称">
        </div>
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
            </select>
        </div>
        <div class="form-group">
            <input type="button" style="width:1200px;" id="button" class="btn btn-primary" value="添加节">
        </div>


@endsection
<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script>
    $(document).on('click','#button',function(){
        //获取接名称
        var section_name=$('#section_name').val();
        //获取所属课程
        var course_id=$('select[name="course_id"] option:selected').val();
        //获取所属章程
        var chapter_id=$('select[name="chapter_id"] option:selected').val();
        $.ajax({
            url:'/course/knob/add',
            type:'post',
            data:{section_name:section_name,course_id:course_id,chapter_id:chapter_id},
            success:function(res){
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
    });
    $(document).on('change','#course_id',function(){
        //获取课程id
        var course_id=$('select[name="course_id"] option:selected').val();
        $.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });
        $.ajax({
            url:'/course/knob/chapter',
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
    /**
    * 跳转
    */
    $(document).on('click','#jump',function(){
        //跳转地址
        location.href='/course/index';
    })
</script>