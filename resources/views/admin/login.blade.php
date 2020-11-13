<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>在线教育-后台管理系统</title>
    <link rel="stylesheet" type="text/css" href="https://demo.mycodes.net/denglu/xingkong_login/css/normalize.css" />
    <link rel="stylesheet" type="text/css" href="https://demo.mycodes.net/denglu/xingkong_login/css/demo.css" />
    <!--必要样式-->
    <link rel="stylesheet" type="text/css" href="https://demo.mycodes.net/denglu/xingkong_login/css/component.css" />
    <!--[if IE]>
    <script src="js/html5.js"></script>
    <[endif]-->
    <link rel="stylesheet" href="http://v.bootstrapmb.com/2020/8/4ewxg8644/font/iconfont.css">
    <script src="http://v.bootstrapmb.com/2020/8/4ewxg8644/message.js"></script>
</head>
<body>
<div class="container demo-1">
    <div class="content">
        <div id="large-header" class="large-header">
            <canvas id="demo-canvas"></canvas>
            <div class="logo_box">
                <h3>在线教育-后台管理系统&nbsp;欢迎你</h3>
                <form action="javascript:;" name="f">
                    @csrf
                    <div class="input_outer">
                        <span class="u_user"></span>
                        <input name="logname" id="name" class="text" style="color: #FFFFFF !important" type="text" autocomplete="off" placeholder="请输入用户名（管理员名称）">
                    </div>
                    <div class="input_outer">
                        <span class="us_uer"></span>
                        <input name="logpass" id="pwd" class="text" style="color: #FFFFFF !important; position:absolute; z-index:100;"value="" type="password" placeholder="请输入密码">
                    </div>
                    <div class="mb2"><a class="act-but submit" id="loginDo" style="color: #FFFFFF">登录</a></div>
                </form>
            </div>
        </div>
    </div>
</div><!-- /container -->

<button id="toast1" style="display: none"></button>

<script src="https://demo.mycodes.net/denglu/xingkong_login/js/TweenLite.min.js"></script>
<script src="https://demo.mycodes.net/denglu/xingkong_login/js/EasePack.min.js"></script>
<script src="https://demo.mycodes.net/denglu/xingkong_login/js/rAF.js"></script>
<script src="https://demo.mycodes.net/denglu/xingkong_login/js/demo-1.js"></script>
</body>
</html>

<script src="/static/js/jquery.min.js"></script>
<script>
    $(function(){
        document.getElementById('toast1').onclick = function () {
            toast({time: 3000})
        }

        //登录点击事件
        $(document).on('click','#loginDo',function(){
            //获取csrf
            var _token=$('input[name="_token"]').val()
            //获取用户名
            var name=$('#name').val()
            //获取密码
            var pwd=$('#pwd').val()
            //判断
            if(name==''){
                $('#toast1').trigger('click')
                $('#toastId').css('top','60%')
                $('.toast_text').text('用户名不可为空，请填写。')
                return false
            }
            if(pwd==''){
                $('#toast1').trigger('click')
                $('#toastId').css('top','60%')
                $('.toast_text').text('密码不可为空，请填写。')
                return false
            }
            //ajax发送数据
            $.ajax({
                //提交地址
                url:'/loginDo',
                //提交方式
                type:'post',
                //传输数据
                data:{_token:_token,admin_name:name,admin_pwd:pwd},
                //预期返回数据类型
                dataType:'json',
                //回调函数
                success:function(res){
                    if(res.status=='no'){
                        $('#toast1').trigger('click')
                        $('#toastId').css('top','60%')
                        $('.toast_text').text(res.msg)
                    }else{
                        $('#toast1').trigger('click')
                        $('#toastId').css('top','60%')
                        $('.toast_text').text(res.msg)
                        var jump=setInterval(function(){
                            if($('#toastId').length==0){
                                clearInterval(jump)
                                location.href='/'
                            }
                        },'3000')
                    }
                }
            })
        })
    })
</script>