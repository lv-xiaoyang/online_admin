@extends('admin.index')
@section('title','章程添加')
@section('content')
<center>
    <h2 style="color:white;">章程添加</h2>
</center>

    <table>
        <tr>
            <td>章程名称</td>
            <td><input type="text" name="chapter_name" id=""></td>
        </tr>
        <tr>
            <td>所属课程</td>
            <td><select name="course_id" id="">
                <option value="">--请选择--</option>
                <option value=""></option>
            </select></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="button" style="width:1200px;" class="btn btn-primary" value="添加章程"></td>
        </tr>
    </table>


@endsection