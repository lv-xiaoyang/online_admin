@extends('admin.index')
@section('title','讲师修改')
@section('content')



<form method="post"  action="{{url('/teacher/update/'.$data->lereg_id)}}">
    <div>
    @csrf
    <p class="formrow"><label class="control-label" for="register_email">讲师昵称</label>
    <input type="text" name="lereg_name" id="lereg_name" value="{{$data->lereg_name}}">
   
    </div>
    <div>
    <p class="formrow"><label class="control-label" for="register_email">讲师履历</label>
    <textarea name="lereg_res" id="lereg_res" cols="50" rows="5">{{$data->lereg_res}}
    </textarea>
    </div>
    <div>
    <p class="formrow"><label class="control-label" for="register_email">学历</label>
    <select name="lereg_edu" id="lereg_edu">
        <!-- <option value="">--请选择--</option> -->
        <option value="1">博士研究生</option>
        <option value="2">硕士研究生</option>
        <option value="3">本科</option>
        <option value="4">专科</option>
        <option value="5">中专/高中</option>
    </select>
    </div>
    <div>
    <p class="formrow"><label class="control-label" for="register_email">毕业院校</label>
    <input type="text" id="lereg_school" name="lereg_school" value="{{$data->lereg_school}}">
    </div>
    <div>
    <p class="formrow"><label class="control-label" for="register_email">所学专业</label>
    <input type="text" id="lereg_magor" name="lereg_magor" value="{{$data->lereg_magor}}"></p>
    </div>
<!--    
    <div>
    <p class="formrow"><label class="control-label" for="register_email">教师资格证</label>
    <input type="file" id="lereg_qual" name="lereg_qual">
    <div class="showimg"></div>
        <input type="hidden"  id="lereg_qual" width="50" hight="50" name="img_path">
    </div>
    -->

    <div>
    <p class="formrow"><label class="control-label" for="register_email">从业时长</label>
    <select name="lereg_time" id="lereg_time">
        <!-- <option value="">--请选择--</option> -->
        <option value="1">10年以上</option>
        <option value="2">5-10年</option>
        <option value="3">2-5年</option>
        <option value="4">1-2年</option>
    </select>
    </div>
    <div class="loginbtn reg">
    <button  class="uploadbtn ub1" id="button">修改</button>
    </div>
</form>
<!-- InstanceEndEditable -->



@endsection