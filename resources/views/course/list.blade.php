@extends('admin.index')
@section('title','课程展示')
<meta name="csrf-token" content="{{ csrf_token() }}">
@section('content')
<div class="product-status mg-tb-15">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <center>
                    <h2>课程展示</h2>
                
                <table class="table">
                    <tr>
                        <td></td>
                        <td>课程名称</td>
                        <td>课程所属分类</td>
                        <td>课程图片</td>
                        <td>授课老师</td>
                        <td>课程简介</td>
                        <td>课程状态</td>
                        <td>课程点击量</td>
                        <td>课程添加时间</td>
                        <td>操作</td>
                    </tr>
                    @foreach($course_data as $v)
                        <tr value="{{$v->course_id}}">
                            <td><p class="course_jia">+</p>
                                <tr></tr>
                            </td>
                            <td>{{$v->course_name}}</td>
                            <td>{{$v->type_name}}</td>
                            <td><img src="{{env('IMG_URL')}}{{$v->course_img}}" width="30px" height="30px" alt=""></td>
                            <td>{{$v->lect_name}}</td>
                            <td>{{$v->course_desc}}</td>
                            <td>{{$v->course_status==1?'更新中':'已完结'}}</td>
                            <td>{{$v->course_view}}</td>
                            <td>{{date('Y-m-d H:i:s',$v->course_add_time)}}</td>
                            <td>删除||修改</td>
                        </tr>
                    @endforeach
                    <tr class="zhang">

                        </tr>
                        <tr class="jie">

                        </tr>
                        <tr class="keshi">
                        </tr>
                </table>
                </center>
            </div>
        </div>
    </div>
</div>

@endsection
<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script>
    $(document).on('click','.course_jia',function(){
        //获取课程id
        var course_id=$(this).parents('tr').attr('value');
        $.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });
        $.ajax({
            url:'/course/chapter',
            type:'post',
            data:{course_id:course_id},
            success:function(res){
                if(res.code!=0002){
                    var jj='';
                    $.each(JSON.parse(res),function(idx,obj){
                        jj +="<td value='"+obj.chapter_id+"'>"+obj.chapter_name+"</td>";  
                    })
                    $('.zhang').html(jj);
                }
            }
        });
    })
</script>