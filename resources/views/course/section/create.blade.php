@extends('admin.index')
@section('title','章程添加')
<meta name="csrf-token" content="{{ csrf_token() }}">
@section('content')
<center>
    <h2>章程添加</h2>
</center>
        <div class="form-group">
            <label for="name">章程名称</label>
            <input type="text" class="form-control" name="chapter_name" id="chapter_name" 
                placeholder="请输入章程名称">
        </div>
        <div class="form-group">
            <label for="name">所属课程</label>
            <select name="course_id" id="course_id">
                <option value="">--请选择--</option>
                @foreach($course_data as $v)
                <option value="{{$v->course_id}}">{{$v->course_name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <input type="button" style="width:1200px;" id="button" class="btn btn-primary" value="添加章程">
        </div>


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
    /**
    * 跳转
    */
    $(document).on('click','#jump',function(){
        //跳转地址
        location.href='/course/index';
    })
</script>