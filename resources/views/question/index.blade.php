@extends('admin.index')
@section('title','题库展示')
@section('content')


<table class="table table-condensed">
  <caption>题库展示</caption>
  <thead>
    <tr>
      <th>id</th>
      <th>题目类型</th>
      <th>题目难度</th>
      <th>题干</th>
      <th>正确答案</th>
      <th>选项A内容</th>
      <th>选项B内容</th>
      <th>选项C内容</th>
      <th>选项D内容</th>
      <th>操作</th>
  </tr>
  </thead>
  <tbody>
    @foreach($data as $k=>$v)
    <tr>
      <td>{{$v->question_id}}</td>
      <td>@if($v->question_type_id==1)单选题  @elseif($v->question_type_id==2)多选题  @elseif($v->question_type_id==3)简答题 @endif</td>
      <td>@if($v->question_diff==1)简单  @elseif($v->question_diff==2)中等  @elseif($v->question_diff==3)困难 @endif</td>
      <td>{{$v->question_name}}</td>
      <td>@if($v->question_cor==1)A @endif @if($v->question_cor==2)B @endif @if($v->question_cor==3)C @endif @if($v->question_cor==4)D @endif</td>
      <td>{{$v->cor_a}}</td>
      <td>{{$v->cor_b}}</td>
      <td>{{$v->cor_c}}</td>
      <td>{{$v->cor_d}}</td>
      <td><!-- <a href="{{url('/question/del/'.$v->question_id)}}"></a> -->
      	<button type="submit" id="del" value="{{$v->question_id}}" class="btn btn-default">删除</button>	
        <button type="submit" id="upd" value="{{$v->question_id}}" class="btn btn-default"><a href="{{url('/question/upd/'.$v->question_id)}}">修改</a></button>
      </td>
  </tr>

  @endforeach
   <td>
      <td colspan="10">{{$data->links()}}</td>
   </td>
  </tbody>
</table>
<script>
  $(document).ready(function(){
    $("#del").click(function(){
      var _this=$(this);
      var id = _this.val();



       bootbox.confirm("确认删除", function () {
          window.location.href="/question/del/"+id;
      })
      // if(window.confirm("您确定删除吗？")){
      //   window.location.href="/question/del/"+id;
      // }
    })
    // $("#upd").click(function(){
    //   var _this=$(this);
    //   var id = _this.val();
    //   $.ajax({
    //     headers:{'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')},
    //     type:"get",
    //     url:"/question/upd/"+id,
    //     success:function(res){
    //       alert(res)
    //     }
    //   })
    // })
});
</script>


@endsection