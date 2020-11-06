@extends('admin.index')
@section('title','课程添加')
@section('content')
<form action="">
    <table style="bgcolor:white;">
        <tr>
            <td>课程名称</td>
            <td><input type="text" name="course_name" id=""></td>
        </tr>
        <tr>
            <td>所属课程类型</td>
            <td><select name="course_type" id="">
                <option value="">--请选择--</option>
                <option value=""></option>
            </select></td>
        </tr>
        <tr>
            <td>课程图片</td>
            <td><input type="file" name="course_img" id=""></td>
        </tr>
        <tr>
            <td>讲师</td>
            <td><select name="lect_id" id="">
                <option value="">--请选择--</option>
                <option value=""></option>
            </select></td>
        </tr>
        <tr>
            <td>课程简介</td>
            <td><textarea name="course_desc" id="" cols="30" rows="10"></textarea></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" style="width:1200px;" class="btn btn-primary" value="添加课程"></td>
        </tr>
    </table>
</form>



@endsection