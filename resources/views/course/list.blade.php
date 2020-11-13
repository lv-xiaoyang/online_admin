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
                            <td>
                                <p class="course_jia">+</p>                       
                            </td>
                            <td class="ll">
                                {{$v->course_name}}
                                <div class="zhang"></div>
                            </td>
                            <td>{{$v->type_name}}</td>
                            <td><img src="{{env('IMG_URL')}}{{$v->course_img}}" width="30px" height="30px" alt=""></td>
                            <td>{{$v->lect_name}}</td>
                            <td>{{$v->course_desc}}</td>
                            <td>{{$v->course_status==1?'更新中':'已完结'}}</td>
                            <td>{{$v->course_view}}</td>
                            <td>{{date('Y-m-d H:i:s',$v->course_add_time)}}</td>
                            <td>
                                <button class="btn btn-danger del" course_id="{{$v->course_id}}">删除</button>
                                <!-- <button class="btn btn-primary upd" course_id="{{$v->course_id}}">修改</button> -->
                            </td>
                        </tr>
                    @endforeach
                    
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
    //获取章程数据
    $(document).on('click','.course_jia',function(){
        //获取课程id
        var _this = $(this);
        var course_id=$(this).parents('tr').attr('value');
        $.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });
        $(this).prop('class','course_jian');
        $(this).html('—');
        $.ajax({
            url:'/course/chapter',
            type:'post',
            data:{course_id:course_id},
            success:function(res){
                if(res.code!=0002){
                    var jj='';
                    $.each(JSON.parse(res),function(idx,obj){
                        jj +="<div class='chapter_jia' value='"+obj.chapter_id+"'>+"+obj.chapter_name+"<div class='jie'></div></div>";  
                    });
                    _this.parent().next().find('div').html(jj);
                }
            }
        });
    });
    //获取节数据
    $(document).on('click','.chapter_jia',function(){
        //获取章程id
        var _this = $(this);
        var chapter_id=$(this).attr('value');
        var _html=$(this).html();
        _html=_html.replace('+','—',_html);
        $.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });
        $(this).prop('class','chapter_jian');
        $(this).html(_html);
        $.ajax({
            url:'/course/section',
            type:'post',
            data:{chapter_id:chapter_id},
            success:function(res){
                if(res.code!=0002){
                    var jj='';
                    $.each(JSON.parse(res),function(idx,obj){
                        jj +="<div class='section_jia' value='"+obj.section_id+"'>&nbsp;&nbsp;&nbsp;&nbsp;+"+obj.section_name+"<div class='keshi'></div></div>";  
                    });
                    _this.find('div').html(jj);
                }
            }
        });
    });
    //获取课时数据
    $(document).on('click','.section_jia',function(){
        //获取章程id
        var _this = $(this);
        var section_id=$(this).attr('value');
        var _html=$(this).html();
        _html=_html.replace('+','—',_html);
        $.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });
        $(this).prop('class','section_jian');
        $(this).html(_html);
        $.ajax({
            url:'/course/courseclass',
            type:'post',
            data:{section_id:section_id},
            success:function(res){
                if(res.code!=0002){
                    var jj='';
                    $.each(JSON.parse(res),function(idx,obj){
                        jj +="<div class='class_jia' value='"+obj.class_id+"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"+obj.class_name+"</div>";  
                    });
                    _this.find('div').html(jj);
                }
            }
        });
    });
    //收起来
    $(document).on('click','.course_jian',function(){
        $('.zhang').hide();
        $(this).prop('class','course_jia');
        $(this).html('+');
    });
    // $(document).on('click','.chapter_jian',function(){
    //     $(this).find('div').find('div').hide();
    //     var _html=$(this).html();
    //     _html=_html.replace('—','+',_html);
    //     $(this).prop('class','chapter_jia');
    //     $(this).html(_html);
    // });
    // $(document).on('click','.section_jian',function(){
    //     $('.keshi').hide();
    //     var _html=$(this).html();
    //     _html=_html.replace('—','+',_html);
    //     $(this).prop('class','section_jia');
    //     $(this).html(_html);
    // });

    //删除
    $(document).on('click','.del',function(){
        //获取courseid
        var course_id=$(this).attr('course_id');
        var _this=$(this);
        $.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });
        $.ajax({
            url:'/course/del',
            type:'get',
            data:{course_id:course_id},
            success:function(res){
                //触发提示框
                $('#success').trigger('click')
                //提示语
                $('#prompt').html("<h1>"+res.msg+"</h1>")
                // //按钮的字
                if(res.code==0001){
                    _this.parents('tr').hide();
                }
                
            }
        })
        
    })

    //修改
    $(document).on('click','.upd',function(){
        alert(222);
    })



</script>
