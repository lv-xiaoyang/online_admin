@extends('admin.index')
@section('title','课程添加')
<meta name="csrf-token" content="{{ csrf_token() }}">
@section('content')
<div class="product-status mg-tb-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <form class="form-horizontal" action="/course/add" method="POST" enctype="multipart/form-data" id="banner-upload" class="banner-upload">
                                <table style="bgcolor:white;">
                                @csrf
                                    <tr>
                                        <td>课程名称</td>
                                        <td><input type="text" name="course_name" id=""></td>
                                    </tr>
                                    <tr>
                                        <td>所属课程类型</td>
                                        <td><select name="course_type" id="">
                                            <option value="">--请选择--</option>
                                            @foreach($type_data as $v)
                                            <option value="{{$v->type_id}}">{{$v->type_name}}</option>
                                            @endforeach
                                        </select></td>
                                    </tr>
                                    <tr>
                                        <td>课程图片</td>
                                        <td>
                                            <!-- <input type="text" placeholder="" class="form-control col-md-6" aria-describedby="helpBlock" name="img" hidden> -->
                                            <input type="file" name="course_img" id="course_img">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>讲师</td>
                                        <td><select name="lect_id" id="">
                                            <option value="">--请选择--</option>
                                            <option value="1">吕静涛</option>
                                            <option value="2">贺宇豪</option>
                                            <option value="3">荣晓霞</option>
                                            <option value="4">李晓阳</option>
                                        </select></td>
                                    </tr>
                                    <tr>
                                        <td>课程简介</td>
                                        <td><textarea name="course_desc" id="" cols="30" rows="10"></textarea></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td><button type="button" style="width:1200px;height:50px;" class="btn btn-primary" id="submit" value="">添加课程</button></td>
                                    </tr>
                                </table>
                            </form>                      
                        </div>
                    </div>
                </div>
            </div>
        </div>



@endsection
<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script>
    $(document).on('click','#submit',function(a){
        a.preventDefault();
        var formData = new FormData(document.getElementById('banner-upload'));
        $.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });
        $.ajax({
            url:'/course/add',
            type:'post',
            data:formData,
            contentType: false,
            processData: false,
            success:function(res){
                if(res.code==0001){
                    if(window.confirm('添加成功，是否跳转到课程展示')){
                        location.href="/course/index";
                    }
                }else{
                    alert(res.msg);
                }
            }
        });
    });
</script>