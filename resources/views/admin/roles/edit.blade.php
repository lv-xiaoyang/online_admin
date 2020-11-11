@extends('admin/index')
@section('title','角色编辑页面')
@section('content')
    <div class="basic-form-area mg-tb-15">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="sparkline12-list">
                        <div class="sparkline12-hd">
                            <div class="main-sparkline12-hd">
                                <h1>角色编辑页面</h1>
                            </div>
                        </div>
                        <div class="sparkline12-graph">
                            <div class="basic-login-form-ad">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="all-form-element-inner">
                                            <form action="javascript:;">
                                                @csrf
                                                <div class="form-group-inner">
                                                    <div class="row">
                                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                            <label class="login2 pull-right pull-right-pro">角色名称：</label>
                                                        </div>
                                                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                            <input type="text" id="ro_name" value="{{$info->ro_name}}" placeholder="请输入角色名称。" class="form-control" />
                                                            <span class="ro" id="span_ro_name"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group-inner">
                                                    <div class="row">
                                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                            <label class="login2 pull-right pull-right-pro">角色描述：</label>
                                                        </div>
                                                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                            <input type="text" id="ro_desc" value="{{$info->ro_desc}}" placeholder="请输入角色描述。" class="form-control" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group-inner">
                                                    <div class="login-btn-inner">
                                                        <div class="row">
                                                            <div class="col-lg-3"></div>
                                                            <div class="col-lg-9">
                                                                <div class="login-horizental cancel-wp pull-left">
                                                                    <button class="btn btn-white" type="reset">重置</button>
                                                                    <button class="btn btn-sm btn-primary login-submit-cs" id="sub" type="button">保存</button>
                                                                </div>
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
        </div>
    </div>

    <script>
        //页面加载事件
        $(function(){
            //获取csrf
            var _token=$('input[name="_token"]').val()

            //角色名称失焦事件
            $(document).on('blur','#ro_name',function(){
                //获取点击对象
                var _this=$('#ro_name')
                //获取权限名称的span标签
                var span_ro_name=$('#span_ro_name')
                //获取名称
                var ro_name=_this.val()
                //判断是否为空
                if(ro_name==''){
                    //span标签提示语
                    span_ro_name.html('<b style="color: red">× 角色名称不可为空，请填写。</b>')
                    return false
                }else{
                    //发送给后台验证唯一
                    $.ajax({
                        //提交地址
                        url:'/roles/ro_name_unique_update/'+"{{$info->ro_id}}",
                        //提交方式
                        type:'post',
                        //设置同步异步
                        async:false,
                        //传送数据
                        data:{_token:_token,ro_name:ro_name},
                        //回调函数
                        success:function(res){
                            if(res=='ok'){
                                span_ro_name.html('');
                            }else{
                                span_ro_name.html('<b style="color: red">× 此角色名称已存在，请重新填写。</b>')
                            }
                        }
                    })
                }
            })

            //提交事件
            $(document).on('click','#sub',function(){
                //调用事件
                $('#ro_name').trigger('blur');
                //获取权限名称的span标签
                var span_ro_name=$('#span_ro_name').html()
                //判断
                if(span_ro_name==''){
                    var status=true
                }else{
                    var status=false
                }
                //判断
                if(status==true){
                    //获取角色名称
                    var ro_name=$('#ro_name').val()
                    //获取权限描述
                    var ro_desc=$('#ro_desc').val()
                    //发送
                    $.ajax({
                        //提交地址
                        url:'/roles/update/'+"{{$info->ro_id}}",
                        //提交方式
                        type:'post',
                        //设置同步异步
                        async:false,
                        //发送数据
                        data:{_token:_token,ro_name:ro_name,ro_desc:ro_desc},
                        //预期返回数据类型
                        dataType:'json',
                        //回调函数
                        success:function(res){
                            //判断
                            if(res.status=='ok'){
                                //触发提示框
                                $('#success').trigger('click')
                                //提示语
                                $('#prompt').html('<h1>保存成功。</h1>')
                                //按钮的字
                                $('#jump').text('跳转到展示')
                            }else{
                                $('.ro').html('')
                                $('#span_'+res.field).html(res.msg)
                            }
                        }
                    })
                }
            })

            /**
             * 跳转
             */
            $(document).on('click','#jump',function(){
                //跳转地址
                location.href='/roles'
            })
        })
    </script>
@endsection