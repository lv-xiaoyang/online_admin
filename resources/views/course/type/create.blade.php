@extends('admin.index')
@section('title','课程分类添加')
<meta name="csrf-token" content="{{ csrf_token() }}">
@section('content')
<center>
    <h2 style="color:white;">课程分类添加</h2>
</center>

    <table>
        <tr>
            <td>课程分类名称</td>
            <td><input type="text" name="chapter_name" id=""></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="button" style="width:1200px;" class="btn btn-primary" id="submit" value="课程分类名称"></td>
        </tr>
    </table>

    
@endsection
<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script>
    $(document).on('click','#submit',function(){
        //获取课程分类名称
        var chapter_name=$('input[name="chapter_name"]').val();
        //通过ajax将信息传入控制器
        $.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });
        $.ajax({
            url:'/course/type/add',
            type:'post',
            data:{chapter_name:chapter_name},
            success:function(res){
                if(res.code==0001){
                    if(window.confirm('添加成功，是否跳转到课程添加')){
                        location.href="/course/create";
                    }
                }else{
                    alert(res.msg);
                }
            }
        });
    });
</script>
