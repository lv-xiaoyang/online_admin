@extends('admin.index')
@section('title','题库展示')
@section('content')
  <!-- 搜索 -->
                <div class="breadcome-area">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="breadcome-list single-page-breadcome">
                                    <div class="row">
                                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                        <div class="breadcome-heading">
                                          <form role="search" class="">
                                            <input type="text" placeholder="Search..." value="{{$question_name}}" style="height:37px" name="question_name"  class="form-control">
                                              <a href="">
                                                <button class="btn btn-default">
                                                  <i class="fa fa-search"></i>
                                              </button>
                                            </a>
                                          </form>
                                        </div>
                                      </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

<table class="table table-condensed">

  <caption>题库展示</caption>
  <button type="submit"  style="float:right" class="btn btn-default"><a href="{{url('/question/huifuindex')}}">恢复已删除</a></button>  
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
      <th>关联课程</th>
      <th>关联章</th>
      <th>关联节</th>
      <th>关联课时</th>
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
      @if($v->question_type_id==1) 
        <td>@if($v->question_cor==1)A @endif @if($v->question_cor==2)B @endif @if($v->question_cor==3)C @endif @if($v->question_cor==4)D @endif</td>
      @elseif($v->question_type_id==2)
        <td>
            @if($v->question_cor==1 || $v->question_cor==2)
              A,B
            @elseif($v->question_cor==1 || $v->question_cor==3)
              A,C
            @elseif($v->question_cor==1  || $v->question_cor==4)
              A,D
            @elseif($v->question_cor==2  || $v->question_cor==3)
              B,C
            @elseif($v->question_cor==2  || $v->question_cor==4)
              B,D
            @elseif($v->question_cor==3  || $v->question_cor==4)
              C,D
            @endif
        </td>
      @elseif($v->question_type_id==3)
        <td></td>
      @endif
      <td>{{$v->cor_a}}</td>
      <td>{{$v->cor_b}}</td>
      <td>{{$v->cor_c}}</td>
      <td>{{$v->cor_d}}</td>
      <td>{{$v->course_name}}</td>
      <td>{{$v->chapter_name}}</td>
      <td>{{$v->section_name}}</td>
      <td>{{$v->class_name}}</td>
      <td><!-- <a href="{{url('/question/del/ '.$v->question_id)}}"></a> -->
        <button type="submit"  value="{{$v->question_id}}" class="btn btn-default"><a href="{{url('/question/course/'.$v->question_id)}}">关联课程</a></button>  
      	<button type="submit" class="del" value="{{$v->question_id}}" class="btn btn-default">删除</button>	
        <button type="submit" id="upd" value="{{$v->question_id}}" class="btn btn-default"><a href="{{url('/question/upd/'.$v->question_id)}}">修改</a></button>
      </td>
  </tr>

  @endforeach
   <td>
      <td colspan="10">{{$data->appends(['question_name'=>$question_name])->links()}}</td>
   </td>
  </tbody>
</table>
<script>
  $(document).ready(function(){
    $(".del").click(function(){
      var _this=$(this);
      var id = _this.val();

          $('#success').trigger('click')
                //提示语
          $('#prompt').html('<h1>确认删除吗？</h1>')
                //按钮的字
          $('#jump').text('确认')

                //跳转
          $(document).on('click','#jump',function(){
                    //跳转地址
            location.href="/question/del/"+id;
          })
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