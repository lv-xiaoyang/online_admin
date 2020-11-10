@extends('admin/index')
@section('title','管理员角色编辑页面')
@section('content')
    <div class="basic-form-area mg-tb-15">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="sparkline12-list">
                        <div class="sparkline12-hd">
                            <div class="main-sparkline12-hd">
                                <h1>管理员角色编辑页面</h1>
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
                                                            <label class="login2 pull-right pull-right-pro">管理员：</label>
                                                        </div>
                                                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                            <div class="form-select-list">
                                                                <select class="form-control custom-select-value" id="admin" name="admin_id">
                                                                    <option value="">请选择管理员...</option>
                                                                    @if(!empty($admin_data))
                                                                        @foreach($admin_data as $k=>$v)
                                                                            <option value="{{$v->admin_id}}" @if($info->admin_id==$v->admin_id) selected @endif>{{$v->admin_name}}</option>
                                                                        @endforeach
                                                                    @endif
                                                                </select>
                                                                <span class="ar" id="span_admin"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group-inner">
                                                    <div class="row">
                                                        <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                                                            <label class="login2 pull-right pull-right-pro">角色：</label>
                                                        </div>
                                                        <div class="col-lg-9 col-md-6 col-sm-6 col-xs-12">
                                                            <div class="bt-df-checkbox pull-left">
                                                                <div class="row">
                                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                        <div class="i-checks pull-left">
                                                                            @if(!empty($roles_data))
                                                                                @foreach($roles_data as $k=>$v)
                                                                                    <label>
                                                                                        <input type="checkbox" name="ro_id" value="{{$v->ro_id}}" @if(in_array($v->ro_id,$info->ro_id)) checked @endif> <i></i>{{$v->ro_name}}
                                                                                    </label>
                                                                                @endforeach
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                    &nbsp;&nbsp;&nbsp;&nbsp;<span class="ar" id="span_ro"></span>
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
            //获取 csrf
            var _token=$("input[name='_token']").val()
            //管理员内容改变事件
            $(document).on('change','#admin',function(){
                //获取本对象
                var _this=$(this)
                //获取数据
                var admin_id=_this.val()
                //判断
                if(admin_id==''){
                    _this.next().html('<b style="color: red">× 请选择管理员。</b>')
                    return false
                }else{
                    $.ajax({
                        //提交地址
                        url:'/admin_role/admin_unique_update/'+"{{$info->ar_id}}",
                        //提交方式
                        type:'post',
                        //设置同步异步
                        async:false,
                        //传输数据
                        data:{_token:_token,admin_id:admin_id},
                        //预期返回数据类型
                        dataType:'json',
                        //回调函数
                        success:function(res){
                            if(res.status=='ok'){
                                _this.next().html('')
                            }else{
                                _this.next().html('<b style="color: red">× 该管理员已存在，请重新选择。</b>')
                            }
                        }
                    })
                }
            })

            //表单提交
            $(document).on('click','#sub',function(){
                //调用事件
                $('#admin').trigger('change')
                //定义空字符串 用于拼接角色id
                var ro_id=''
                //获取角色的id
                var ro=$('input[name="ro_id"]:checked')
                //循环获取
                ro.each(function(){
                    ro_id+=$(this).val()+','
                })
                //判断
                if(ro_id==''){
                    $('#span_ro').html('<b style="color: red">× 请选择角色。</b>')
                    return false
                }else{
                    $('#span_ro').html('')
                }
                //获取提示语
                var span_admin=$('#span_admin').html()
                var span_ro=$('#span_ro').html()
                if(span_admin=='' && span_ro==''){
                    //获取管理员id
                    var admin_id=$('#admin').val()
                    //处理角色id
                    ro_id=ro_id.substr(0,ro_id.length-1)
                    //发送请求
                    $.ajax({
                        //提交地址
                        url:'/admin_role/update/'+"{{$info->ar_id}}",
                        //提交方式
                        type:'post',
                        //设置同步异步
                        async:false,
                        //传输数据
                        data:{_token:_token,admin_id:admin_id,ro_id:ro_id},
                        //预期返回数据类型
                        dataType:'json',
                        //回调函数
                        success:function(res){
                            //判断
                            if(res.status=='fail'){
                                $('#span_'+res.field).html(res.msg)
                            }else if(res.status=='ok'){
                                //添加成功
                                alert('保存成功')
                                location.href='/admin_role'
                            }else{
                                //添加失败
                                alert('保存失败')
                            }
                        }
                    })
                }
            })
        })
    </script>
@endsection