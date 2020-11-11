@extends('admin.index')
@section('title','课程添加')
@section('content')
<link rel="stylesheet" href="/static/css/uploadify.css">
<script src="/static/js/jquery.uploadify.js"></script>
<div class="product-status mg-tb-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <form class="form-horizontal" action="/course/add"  role="form" method="POST" enctype="multipart/form-data" id="banner-upload" class="banner-upload">
                                @csrf
                                <div class="form-group">
                                    <label for="name">课程名称：</label>
                                    <input type="text" class="form-control" name="course_name" id="course_name" 
                                        placeholder="请输入课程名称">
                                </div>
                                <div class="form-group">
                                    <label for="name">所属课程类型：</label>
                                    <select name="course_type" id="" style="width:200px;">
                                        <option value="">--请选择--</option>
                                        @foreach($type_data as $v)
                                        <option value="{{$v->type_id}}">{{$v->type_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="inputfile">课程图片：</label>
                                    <input type="file"  id="course_img">
                                    <input type="hidden" name="course_img">
                                    
                                </div>
                                <div class="form-group">
                                    <label for="name">讲师：</label>
                                    <select name="lect_id" id="">
                                        <option value="">--请选择--</option>
                                        @foreach($lect_data as $v)
                                        <option value="{{$v->lect_id}}">{{$v->lect_name}}</option>
                                        @endforeach
                                    </select></td>
                                </div>
                                <div class="form-group">
                                    <label for="name">课程简介：</label>
                                    <textarea name="course_desc" id="" cols="30" rows="10"></textarea>
                                </div>
                                <div class="form-group">
                                    <button type="button" style="width:1200px;height:50px;" class="btn btn-primary" id="submit" value="">添加课程</button>  
                                </div>
                            </form>                      
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal-bootstrap modal-login-form" style="display: none">
            <a id="success" class="zoomInDown mg-t" href="#" data-toggle="modal" data-target="#zoomInDown1">Modal Login Form</a>
        </div>

        <div id="zoomInDown1" class="modal modal-adminpro-general modal-zoomInDown fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-close-area modal-close-df">
                    <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                </div>
                <div class="modal-body">
                    <div class="modal-login-form-inner">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="basic-login-inner modal-basic-inner">
                                    <h3>在线教育-后台系统提示语：</h3>
                                    <p>Online Education-Background System Prompt:</p>
                                    <form action="javascript:;">
                                        <div class="login-btn-inner">
                                            <div class="row">
                                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12"></div>
                                                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                                    <label id="prompt"></label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12"></div>
                                                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                                    <div class="login-horizental">
                                                        <button class="btn btn-sm btn-primary login-submit-cs" type="submit" id="jump">跳转到展示<button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- <script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script> -->


 <script>
    $(document).ready(function(){
		$("#course_img").uploadify({
            
            //后台处理的页面
			uploader: "/course/addimg",
			swf: "/static/js/uploadify.swf",
			onUploadSuccess:function(res,data,msg){
                // console.log(res,data,msg);
				var imgPath  = data;
				var imgstr = "<img src='"+imgPath+"'>";
				$("input[name='course_img']").val(imgPath);
			}
		});
	});


    $(document).on('click','#submit',function(a){
        $(function () { $("[data-toggle='popover']").popover(); });
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


@endsection
