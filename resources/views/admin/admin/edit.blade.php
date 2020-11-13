@extends('admin/index')
@section('title','管理员编辑页面')
@section('content')
    <div class="basic-form-area mg-tb-15">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="sparkline12-list">
                        <div class="sparkline12-hd">
                            <div class="main-sparkline12-hd">
                                <h1>管理员编辑页面</h1>
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
                                                            <label class="login2 pull-right pull-right-pro">管理员名称：</label>
                                                        </div>
                                                        <div class="col-lg-3 col-md-9 col-sm-9 col-xs-12">
                                                            <input type="text" id="admin_name" value="{{$info->admin_name}}" placeholder="请输入管理员名称。" class="form-control" />
                                                            <span class="admin" id="span_admin_name"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group-inner">
                                                    <div class="row">
                                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                            <label class="login2 pull-right pull-right-pro">管理员密码：</label>
                                                        </div>
                                                        <div class="col-lg-3 col-md-9 col-sm-9 col-xs-12">
                                                            <input type="password" id="admin_pwd" value="" placeholder="请输入管理员密码。" class="form-control" />
                                                            <span class="admin" id="span_admin_pwd"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group-inner">
                                                    <div class="row">
                                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                            <label class="login2 pull-right pull-right-pro">确认密码：</label>
                                                        </div>
                                                        <div class="col-lg-3 col-md-9 col-sm-9 col-xs-12">
                                                            <input type="password" id="admin_pwds" value="" placeholder="请输入确认密码，两次密码保持一次。" class="form-control" />
                                                            <span class="admin" id="span_admin_pwds"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group-inner">
                                                    <div class="row">
                                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                            <label class="login2 pull-right pull-right-pro">管理员电话：</label>
                                                        </div>
                                                        <div class="col-lg-3 col-md-9 col-sm-9 col-xs-12">
                                                            <input type="tel" id="admin_tel" value="{{$info->admin_desc}}" placeholder="请输入管理员电话。" class="form-control" />
                                                            <span class="admin" id="span_admin_tel"></span>
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

            //管理员名称失焦事件
            $(document).on('blur','#admin_name',function(){
                //获取点击对象
                var _this=$('#admin_name')
                //获取权限名称的span标签
                var span_admin_name=$('#span_admin_name')
                //获取名称
                var admin_name=_this.val()
                //判断是否为空
                if(admin_name==''){
                    //span标签提示语
                    span_admin_name.html('<b style="color: red">× 管理员名称不可为空，请填写。</b>')
                    return false
                }else{
                    //发送给后台验证唯一
                    $.ajax({
                        //提交地址
                        url:'/admin/admin_name_unique_update/'+"{{$info->admin_id}}",
                        //提交方式
                        type:'post',
                        //设置同步异步
                        async:false,
                        //传送数据
                        data:{_token:_token,admin_name:admin_name},
                        //回调函数
                        success:function(res){
                            if(res=='ok'){
                                span_admin_name.html('');
                            }else{
                                span_admin_name.html('<b style="color: red">× 此管理员名称已存在，请重新填写。</b>')
                            }
                        }
                    })
                }
            })

            //密码失焦事件
            $(document).on('blur','#admin_pwd',function(){
                //获取点击对象
                var _this=$('#admin_pwd')
                //获取权限的span标签
                var span_admin_pwd=$('#span_admin_pwd')
                //获取密码
                var admin_pwd=_this.val()
                //判断是否为空
                if(admin_pwd==''){
                    //span标签提示语
                    span_admin_pwd.html('<b style="color: red">× 密码不可为空，请填写。</b>')
                    return false
                }
                //正则
                var pwd_reg=/^\w{6,}$/
                //判断
                if(!pwd_reg.test(admin_pwd)){
                    //span标签提示语
                    span_admin_pwd.html('<b style="color: red">× 密码最低6位，请重新填写。</b>')
                    return false
                }else{
                    span_admin_pwd.html('')
                }
            })

            //确认密码失焦事件
            $(document).on('blur','#admin_pwds',function(){
                //获取点击对象
                var _this=$('#admin_pwds')
                //获取权限的span标签
                var span_admin_pwds=$('#span_admin_pwds')
                //获取确认密码
                var admin_pwds=_this.val()
                //判断是否为空
                if(admin_pwds==''){
                    //span标签提示语
                    span_admin_pwds.html('<b style="color: red">× 确认密码不可为空，请填写。</b>')
                    return false
                }
                //正则
                var pwd_reg=/^\w{6,}$/
                //判断
                if(!pwd_reg.test(admin_pwds)){
                    //span标签提示语
                    span_admin_pwds.html('<b style="color: red">× 确认密码最低6位，请重新填写。</b>')
                    return false
                }
                //获取密码
                var admin_pwd=$('#admin_pwd').val()
                //判断
                if(admin_pwds!=admin_pwd){
                    //span标签提示语
                    span_admin_pwds.html('<b style="color: red">× 两次密码不一致，请重新填写。</b>')
                    return false
                }else{
                    //span标签提示语
                    span_admin_pwds.html('')
                }
            })

            //提交事件
            $(document).on('click','#sub',function(){
                //调用事件
                $('#admin_name').trigger('blur');
                $('#admin_pwd').trigger('blur');
                $('#admin_pwds').trigger('blur');
                //获取管理员名称的span标签
                var span_admin_name=$('#span_admin_name').html()
                //获取密码的span标签
                var span_admin_pwd=$('#span_admin_pwd').html()
                //获取确认密码的span标签
                var span_admin_pwds=$('#span_admin_pwds').html()
                //判断
                if(span_admin_name=='' && span_admin_pwd=='' && span_admin_pwds==''){
                    var status=true
                }else{
                    var status=false
                }
                //判断
                if(status==true){
                    //获取管理员名称
                    var admin_name=$('#admin_name').val()
                    //获取密码
                    var admin_pwd=$('#admin_pwd').val()
                    //获取确认密码
                    var admin_pwds=$('#admin_pwds').val()
                    //获取管理员电话
                    var admin_desc=$('#admin_desc').val()
                    //发送
                    $.ajax({
                        //提交地址
                        url:'/admin/update/'+"{{$info->admin_id}}",
                        //提交方式
                        type:'post',
                        //设置同步异步
                        async:false,
                        //发送数据
                        data:{_token:_token,admin_name:admin_name,admin_pwd:admin_pwd,admin_pwds:admin_pwds,admin_desc:admin_desc},
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
                                $('.pow').html('')
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
                location.href='/admin'
            })
        })
    </script>
@endsection