@extends('admin.index')
@section('title','资讯修改')
@section('content')

<form class="form-horizontal" role="form">

<div class="form-group">
        <label for="firstname" class="col-sm-2 control-label">资讯标题</label>
          <div class="col-sm-10" ati_id="{{$data->ati_id}}">
            <input type="text" class="form-control" id="ati_name" value="{{$data->ati_name}}" name="ati_name" >
        </div>
</div>  

<div class="form-group">
        <label for="firstname" class="col-sm-2 control-label">是否热门</label>
          <div class="col-sm-10">           
            <input type="radio" class="ati_ishot" id="ati_ishot" name="ati_ishot" value="1" @if($data->ati_ishot==1)checked @endif >是
            <input type="radio" class="ati_ishot" id="ati_ishot" name="ati_ishot" value="2" @if($data->ati_ishot==2)checked @endif>否
        </div>
    </div> 

  <div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">资讯内容</label>
	    <div class="col-sm-10">
	    	<textarea class="form-control" id="ati_content"   name="ati_content" rows="3">{{$data->ati_content}}</textarea>
	  </div>
    </div>

<div class="form-group">
        <label for="firstname" class="col-sm-2 control-label">资讯作者</label>
        <div class="col-sm-10">
                <input type="text" class="form-control" id="ati_res" value="{{$data->ati_res}}" name="ati_res" >
        </div>
</div>    	
    
    <center><button type="button" id="button" class="btn btn-primary form-control">修改</button></center>
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
        // var ati_id = $("#ati_name").parent().attr("ati_id");  
        var ati_id = {{$data->ati_id}};

        // console.log(ati_id);
        // return aew;
         $.ajax({
          type:"post",
          url:"/article/update2/"+ati_id,
          dataType:"json",
          headers:{'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')},
          data:{ati_name:ati_name,ati_ishot:ati_ishot,ati_content:ati_content,ati_res:ati_res,ati_id:ati_id},
          success:function(res){
           if(res.code==1){
            // alert(res.msg);
            //触发提示框
                $('#success').trigger('click')
                //提示语
                $('#prompt').html('<h1>修改失败</h1>')
               
          } 
          if(res.code==0){
            //触发提示框
                $('#success').trigger('click')
                //提示语
                $('#prompt').html('<h1>修改成功</h1>')
                //按钮的字
                $('#jump').text('去展示')
                
            }
          }
        })  
    })
  })
  //跳转
  $(document).on('click','#jump',function(){
                    //跳转地址
    location.href="/article"
  })
</script>
@endsection