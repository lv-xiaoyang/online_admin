@extends('admin.index')
@section('title','课程分类添加')
<meta name="csrf-token" content="{{ csrf_token() }}">
@section('content')
<center>
    <h2>课程分类添加</h2>
</center>

    <div class="form-group">
        <label for="name">课程分类名称</label>
            <input type="text" class="form-control"  name="chapter_name" id="chapter_name" 
                placeholder="请输入课程分类名称">
    </div>
    <div class="form-group">
        <input type="button" style="width:1200px;" class="btn btn-primary" id="submit" value="课程分类名称">
    </div>

    
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
                    //触发提示框
                    $('#success').trigger('click')
                    //提示语
                    $('#prompt').html("<h1>"+res.msg+"</h1>")
                    // //按钮的字
                    $('#jump').text('去展示')
                }else{
                    //触发提示框
                    $('#success').trigger('click')
                    //提示语
                    $('#prompt').html("<h1>"+res.msg+"</h1>")
                }
            }
        });
    });
    /**
    * 跳转
    */
    $(document).on('click','#jump',function(){
        //跳转地址
        location.href='/course/index';
    })
</script>
