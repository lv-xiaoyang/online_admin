@extends('admin.index')
@section('title','课程展示')
@section('content')
<div class="product-status mg-tb-15">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <center>
                    <h2>课程展示</h2>
                
                <table  border="1px">
                    <tr>
                        <td>id</td>
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
                    <tr>
                        <td>{{$v->course_id}}</td>
                        <td>{{$v->course_name}}</td>
                        <td>{{$v->type_name}}</td>
                        <td><img src="{{env('IMG_URL')}}{{$v->course_img}}" width="80px" height="100px" alt=""></td>
                        <td>{{$v->lect_name}}</td>
                        <td>{{$v->course_desc}}</td>
                        <td>{{$v->course_status==1?'更新中':'已完结'}}</td>
                        <td>{{$v->course_view}}</td>
                        <td>{{date('Y-m-d H:i:s',$v->course_add_time)}}</td>
                        <td>删除||修改</td>
                    </tr>
                    @endforeach
                </table>
                </center>
            </div>
        </div>
    </div>
</div>

@endsection