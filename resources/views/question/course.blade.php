@extends('admin.index')
@section('title','关联课程')
@section('content')
<form role="form">
  <div class="form-group">
    <label for="name">关联课程</label>
    <select class="form-control">
      <option>1</option>
      <option>2</option>
      <option>3</option>
      <option>4</option>
      <option>5</option>
    </select>
  </div>

  <div class="form-group">
    <label for="name">关联课程章</label>
    <select class="form-control">
      <option>1</option>
      <option>2</option>
      <option>3</option>
      <option>4</option>
      <option>5</option>
    </select>
  </div>


  <div class="form-group">
    <label for="name">关联课程节</label>
    <select class="form-control">
      <option>1</option>
      <option>2</option>
      <option>3</option>
      <option>4</option>
      <option>5</option>
    </select>
  </div>


  <div class="form-group">
    <label for="name">关联课时</label>
    <select class="form-control">
      <option>1</option>
      <option>2</option>
      <option>3</option>
      <option>4</option>
      <option>5</option>
    </select>
  </div>
  <center>
  	<button type="button" id="button" class="btn btn-primary form-control">添加</button>
  </center>
</form>
@endsection