@extends('admin.index')
@section('title','章程添加')
<meta name="csrf-token" content="{{ csrf_token() }}">
@section('content')
<center>
    <h2>章程添加</h2>
</center>

    <table>
        <tr>
            <td>章程名称</td>
            <td><input type="text" name="chapter_name" id="chapter_name"></td>
        </tr>
        <tr>
            <td>所属课程</td>
            <td><select name="course_id" id="course_id">
                <option value="">--请选择--</option>
                @foreach($course_data as $v)
                <option value="{{$v->course_id}}">{{$v->course_name}}</option>
                @endforeach
            </select></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="button" style="width:1200px;" id="button" class="btn btn-primary" value="添加章程"></td>
        </tr>
    </table>


@endsection
<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script>
    $(document).on('click','#button',function(){
        //获取章程名称
        var chapter_name=$('#chapter_name').val();
        //获取所属课程
        var course_id=$('select[name="course_id"] option:selected').val();
        //通过ajax传到控制器
        $.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });
        $.ajax({
            url:'/course/section/add',
            type:'post',
            data:{chapter_name:chapter_name,course_id:course_id},
            success:function(res){
                if(res.code==0001){
                    if(window.confirm('添加成功，您要跳转到章程展示页面吗？')){
                        location.href='/course/index';
                    }else{
                        alert(res.msg);
                    }
                }
            }
        })
    })
</script>