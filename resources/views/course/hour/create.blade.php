@extends('admin.index')
@section('title','节添加')
<meta name="csrf-token" content="{{ csrf_token() }}">
@section('content')
<center>
    <h2>课时添加</h2>
</center>

    <table>
        <tr>
            <td>课时名称</td>
            <td><input type="text" name="class_name" id="class_name"></td>
        </tr>
        <tr>
            <td>所属课程</td>
            <td><select name="course_id" id="course_id">
                <option value="">--请选择--</option>
                @foreach($courese_data as $v)
                <option value="{{$v->course_id}}">{{$v->course_name}}</option>
                @endforeach
            </select></td>
        </tr>
        <tr>
            <td>所属章程</td>
            <td><select name="chapter_id" id="chapter_id">
                <option value="">--请选择--</option>
                <option value=""></option>
            </select></td>
        </tr>
        <tr>
            <td>所属节</td>
            <td><select name="section_id" id="section_id">
                <option value="">--请选择--</option>
                <option value=""></option>
            </select></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="button" style="width:1200px;" id="button" class="btn btn-primary" value="添加节"></td>
        </tr>
    </table>


@endsection
<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script>
    $(document).on('click','#button',function(){
        //获取课程id
        var course_id=$('select[name="course_id"] option:selected').val();
        //获取章程id
        var chapter_id=$('select[name="chapter_id"] option:selected').val();
        //获取节id
        var section_id=$('select[name="section_id"] option:selected').val();
        //获取课时名称
        var class_name=$('#class_name').val();
        $.ajax({
            url:'/course/hour/add',
            type:'post',
            data:{course_id:course_id,chapter_id:chapter_id,section_id:section_id,class_name:class_name},
            success:function(res){
                if(res.code==0001){
                    if(window.confirm('添加成功，是否跳转到列表页')){
                        location.href='/course/index';
                    }
                }else{
                    alert(res.msg);
                }
            }
        })
    })
    $(document).on('change','#course_id',function(){
        //获取课程id
        var course_id=$('select[name="course_id"] option:selected').val();
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
                    alert(res.msg);
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
                    alert(res.msg);
                }
            }
        })
    })
</script>