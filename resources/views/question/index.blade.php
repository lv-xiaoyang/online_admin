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
    <tr>
      <td>1</td>
      <td>单选题</td>
      <td>简单</td>
      <td>一分钟等于多少秒？</td>
      <td>A</td>
      <td>60秒</td>
      <td>50秒</td>
      <td>55秒</td>
      <td>40秒</td>
      <td>
      	删除 | 	
      	修改
      </td>
  </tr>
   
  </tbody>
</table>



@endsection