@extends('admin/index')
@section('title','角色权限编辑页面')
@section('content')
    <div class="basic-form-area mg-tb-15">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="sparkline12-list">
                        <div class="sparkline12-hd">
                            <div class="main-sparkline12-hd">
                                <h1>角色权限编辑页面</h1>
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
                                                            <label class="login2 pull-right pull-right-pro">角色：</label>
                                                        </div>
                                                        <div class="col-lg-2 col-md-9 col-sm-9 col-xs-12">
                                                            <div class="form-select-list">
                                                                <select class="form-control custom-select-value" id="roles" name="account">
                                                                    <option value="">请选择角色...</option>
                                                                    @if(!empty($roles_data))
                                                                        @foreach($roles_data as $k=>$v)
                                                                            <option value="{{$v->ro_id}}" @if($info->ro_id==$v['ro_id']) selected @endif>{{$v->ro_name}}</option>
                                                                        @endforeach
                                                                    @endif
                                                                </select>
                                                                <span id="span_roles"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group-inner">
                                                    <div class="row">
                                                        <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                                                            <label class="login2 pull-right pull-right-pro">权限：</label>
                                                        </div>
                                                        <div class="col-lg-9 col-md-6 col-sm-6 col-xs-12">
                                                            <div class="bt-df-checkbox pull-left">
                                                                <div class="row">
                                                                    <div class="col-lg-6 col-md-10 col-sm-10 col-xs-10">
                                                                        <div class="i-checks pull-left">
                                                                        @if(!empty($power_data))
                                                                            @foreach($power_data as $k=>$v)
                                                                                    <label>
                                                                                        <input type="checkbox" class="power" value="{{$v->pow_id}}" @if(in_array($v->pow_id,$info->pow_id)) checked @endif> <i></i>{{$v->pow_name}}</label>
                                                                            @endforeach
                                                                        @endif
                                                                        </div>
                                                                    </div>
                                                                    &nbsp;&nbsp;&nbsp;&nbsp;<span id="span_power"></span>
                                                                </div>
                                                            </div>
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
        $(function(){
            //获取csrf
            var _token=$('input[name="_token"]').val()

            //角色改变事件
            $(document).on('change','#roles',function(){
                //获取本对象
                var _this=$(this)
                //获取span标签
                var span_roles=$('#span_roles')
                //获取数据
                var ro_id=_this.val()
                //判断
                if(ro_id==''){
                    span_roles.html('<b style="color: red">× 请选择角色。</b>')
                    return false
                }else{
                    //发送验证唯一
                    $.ajax({
                        //提交地址
                        url:'/role_power/unique_update/'+"{{$info->rp_id}}",
                        //提交方式
                        type:'post',
                        //设置同步异步
                        async:false,
                        //传输数据
                        data:{_token:_token,ro_id:ro_id},
                        //预期返回数据类型
                        dataType:'json',
                        //回调函数
                        success:function(res){
                            //判断
                            if(res.status=='ok'){
                                span_roles.html('')
                            }else{
                                span_roles.html('<b style="color: red">× 该角色已存在，请重新选择</b>')
                            }
                        }
                    })
                }
            })

            //提交点击事件
            $(document).on('click','#sub',function(){
                //调用事件
                $('#roles').trigger('change')
                //定义权限id 空字符串
                var pow_id=''
                //获取已选中权限
                var power=$('.power:checked')
                //获取span标签
                var span_power=$('#span_power')
                //循环获取id
                power.each(function(){
                    pow_id+=$(this).val()+','
                })
                //判断
                if(pow_id==''){
                    span_power.html('<b style="color: red">× 请选择权限</b>')
                    return false
                }else{
                    span_power.html('')
                }
                //获取提示语
                var span_roles=$('#span_roles')
                //判断
                if(span_roles.text()=='' && span_power.text()==''){
                    //获取角色id
                    var ro_id=$('#roles').val()
                    //去除多余字符
                    pow_id=pow_id.substr(0,pow_id.length-1)
                    //ajax发送请求
                    $.ajax({
                        //提交地址
                        url:'/role_power/update/'+"{{$info->rp_id}}",
                        //提交方式
                        type:'post',
                        //设置同步异步
                        async:false,
                        //传输数据
                        data:{_token:_token,ro_id:ro_id,pow_id:pow_id},
                        //预期返回数据类型
                        dataType:'json',
                        //回调函数
                        success:function(res){
                            //判断返回结果
                            if(res.status=='fail'){
                                $('#span_'+res.field).html(res.msg)
                            }else if(res.status=='ok'){
                                //触发提示框
                                $('#success').trigger('click')
                                //提示语
                                $('#prompt').html('<h1>保存成功。</h1>')
                                //按钮的字
                                $('#jump').text('跳转到展示')
                            }else{
                                //触发提示框
                                $('#success').trigger('click')
                                //提示语
                                $('#prompt').html('<h1>保存失败。</h1>')
                                //按钮的字
                                $('#jump').text('跳转到展示')
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
                location.href='/role_power'
            })
        })
    </script>
@endsection