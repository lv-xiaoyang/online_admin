@extends('admin/index')
@section('title','权限编辑页面')
@section('content')
    <div class="basic-form-area mg-tb-15">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="sparkline12-list">
                        <div class="sparkline12-hd">
                            <div class="main-sparkline12-hd">
                                <h1>权限编辑页面</h1>
                            </div>
                        </div>
                        <div class="sparkline12-graph">
                            <div class="basic-login-form-ad">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="all-form-element-inner">
                                            <form action="#">
                                                @csrf
                                                <div class="form-group-inner">
                                                    <div class="row">
                                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                            <label class="login2 pull-right pull-right-pro">权限名称：</label>
                                                        </div>
                                                        <div class="col-lg-3 col-md-9 col-sm-9 col-xs-12">
                                                            <input type="text" id="pow_name" value="{{$info->pow_name}}" placeholder="请输入权限名称。" class="form-control" />
                                                            <span class="pow" id="span_pow_name">{{$errors->first('pow_name')}}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group-inner">
                                                    <div class="row">
                                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                            <label class="login2 pull-right pull-right-pro">权限：</label>
                                                        </div>
                                                        <div class="col-lg-3 col-md-9 col-sm-9 col-xs-12">
                                                            <input type="text" id="pow_url" value="{{$info->pow_url}}" placeholder="请输入权限。" class="form-control" />
                                                            <span class="pow" id="span_pow_url"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group-inner">
                                                    <div class="row">
                                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                            <label class="login2 pull-right pull-right-pro">权限描述：</label>
                                                        </div>
                                                        <div class="col-lg-3 col-md-9 col-sm-9 col-xs-12">
                                                            <input type="text" id="pow_desc" value="{{$info->pow_desc}}" placeholder="请输入权限描述。" class="form-control" />
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

            //权限名称失焦事件
            $(document).on('blur','#pow_name',function(){
                //获取点击对象
                var _this=$('#pow_name')
                //获取权限名称的span标签
                var span_pow_name=$('#span_pow_name')
                //获取名称
                var pow_name=_this.val()
                //判断是否为空
                if(pow_name==''){
                    //span标签提示语
                    span_pow_name.html('<b style="color: red">× 权限名称不可为空，请填写。</b>')
                    return false
                }else{
                    //发送给后台验证唯一
                    $.ajax({
                        //提交地址
                        url:'/power/pow_name_unique_update/'+"{{$info->pow_id}}",
                        //提交方式
                        type:'post',
                        //设置同步异步
                        async:false,
                        //传送数据
                        data:{_token:_token,pow_name:pow_name},
                        //回调函数
                        success:function(res){
                            if(res=='ok'){
                                span_pow_name.html('');
                            }else{
                                span_pow_name.html('<b style="color: red">× 此权限名称已存在，请重新填写。</b>')
                            }
                        }
                    })
                }
            })

            //权限失焦事件
            $(document).on('blur','#pow_url',function(){
                //获取点击对象
                var _this=$('#pow_url')
                //获取权限的span标签
                var span_pow_url=$('#span_pow_url')
                //获取权限
                var pow_url=_this.val()
                //判断是否为空
                if(pow_url==''){
                    //span标签提示语
                    span_pow_url.html('<b style="color: red">× 权限不可为空，请填写。</b>')
                    return false
                }else{
                    //发送给后台验证唯一
                    $.ajax({
                        //提交地址
                        url:'/power/pow_url_unique_update/'+"{{$info->pow_id}}",
                        //提交方式
                        type:'post',
                        //设置同步异步
                        async:false,
                        //传送数据
                        data:{_token:_token,pow_url:pow_url},
                        //回调函数
                        success:function(res){
                            if(res=='ok'){
                                span_pow_url.html('');
                            }else{
                                span_pow_url.html('<b style="color: red">× 此权限已存在，请重新填写。</b>')
                            }
                        }
                    })
                }
            })

            //提交事件
            $(document).on('click','#sub',function(){
                //调用事件
                $('#pow_name').trigger('blur');
                $('#pow_url').trigger('blur');
                //获取权限名称的span标签
                var span_pow_name=$('#span_pow_name').html()
                //获取权限的span标签
                var span_pow_url=$('#span_pow_url').html()
                //判断
                if(span_pow_name=='' && span_pow_url==''){
                    var status=true
                }else{
                    var status=false
                }
                //判断
                if(true){
                    //获取权限名称
                    var pow_name=$('#pow_name').val()
                    //获取权限
                    var pow_url=$('#pow_url').val()
                    //获取权限描述
                    var pow_desc=$('#pow_desc').val()
                    //发送
                    $.ajax({
                        //提交地址
                        url:'/power/update/'+"{{$info->pow_id}}",
                        //提交方式
                        type:'post',
                        //设置同步异步
                        async:false,
                        //发送数据
                        data:{_token:_token,pow_name:pow_name,pow_url:pow_url,pow_desc:pow_desc},
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

            //跳转
            $(document).on('click','#jump',function(){
                //跳转地址
                location.href='/power'
            })
        })
    </script>
@endsection