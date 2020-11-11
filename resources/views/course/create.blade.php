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
                                    <input type="file"  name="course_img" id="course_img">
                                    <!-- <input type="hidden"> -->
                                    
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
 <script>
    // $(document).ready(function(){
	// 	$("#course_img").uploadify({
            
    //         //后台处理的页面
	// 		uploader: "/course/addimg",
	// 		swf: "/static/js/uploadify.swf",
	// 		onUploadSuccess:function(res,data,msg){
    //             // console.log(res,data,msg);
	// 			var imgPath  = data;
	// 			var imgstr = "<img src='"+imgPath+"'>";
	// 			$("input[name='course_img']").val(imgPath);
	// 		}
	// 	});
	// });


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
