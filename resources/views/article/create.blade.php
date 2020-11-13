@extends('admin.index')
@section('title','资讯添加')
@section('content')

<form class="form-horizontal" role="form">

<div class="form-group">
        <label for="firstname" class="col-sm-2 control-label">资讯标题</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="ati_name" name="ati_name" >
        </div>
</div>  

<div class="form-group">
        <label for="firstname" class="col-sm-2 control-label">是否热门</label>
          <div class="col-sm-10">           
            <input type="radio" class="ati_ishot" id="ati_ishot" name="ati_ishot" value="1"  checked >是
            <input type="radio" class="ati_ishot" id="ati_ishot" name="ati_ishot" value="2">否
        </div>
    </div> 

  <div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">资讯内容</label>
	    <div class="col-sm-10">
	    	<textarea class="form-control" id="ati_content"  name="ati_content" rows="3"></textarea>
	  </div>
    </div>

<div class="form-group">
        <label for="firstname" class="col-sm-2 control-label">资讯作者</label>
        <div class="col-sm-10">
                <input type="text" class="form-control" id="ati_res" name="ati_res" >
        </div>
</div>    	
    
    <center><button type="button" id="button" class="btn btn-primary form-control">添加</button></center>
   <div class="col-sm-offset-2 col-sm-10">
      
    </div>
  </div>
</form>
<script>
  $(document).ready(function(){
    $("#button").click(function(){
        var ati_name = $('#ati_name').val();
        var ati_ishot = $("input[name='ati_ishot']:checked").val();
        var ati_content = $("#ati_content").val();
        var ati_res = $("#ati_res").val();
       
         $.ajax({
          type:"post",
          url:"{{url('/article/story')}}",
          dataType:"json",
          headers:{'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')},
          data:{ati_name:ati_name,ati_ishot:ati_ishot,ati_content:ati_content,ati_res:ati_res},
          success:function(res){
           if(res.code==1){
            // alert(res.msg);
            //触发提示框
                $('#success').trigger('click')
                //提示语
                $('#prompt').html('<h1>添加失败</h1>')
               
          } 
          if(res.code==0){
            //触发提示框
                $('#success').trigger('click')
                //提示语
                $('#prompt').html('<h1>添加成功</h1>')
                //按钮的字
                $('#jump').text('去展示')

                //跳转
                $(document).on('click','#jump',function(){
                    //跳转地址
                    location.href="/article"
                })
            }
          }
        })  
    })
  })
</script>
@endsection