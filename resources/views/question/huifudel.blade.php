@extends('admin.index')
@section('title','题库展示')
@section('content')


<table class="table table-condensed">

  <caption>已删除数据展示</caption>
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
      	<button type="submit" value="{{$v->question_id}}"  class="huifu" class="btn  btn-default">恢复</button>	
      </td>
  </tr>

  @endforeach
   <td>
   </td>
  </tbody>
</table>
<script>
  $(document).ready(function(){
    $(".huifu").click(function(){
        var id = $(this).val();
        // alert(id);
         //提示语
          $('#success').trigger('click')
                //提示语
          
          $('#prompt').html('<h1>确认恢复这条数据吗？</h1>')
                //按钮的字
          $('#jump').text('确认')

                //跳转
          $(document).on('click','#jump',function(){
                    //跳转地址
            location.href="/question/huifudel/"+id;
          })
    })
  })
</script>

@endsection