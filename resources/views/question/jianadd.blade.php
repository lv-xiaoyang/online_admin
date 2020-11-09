@extends('admin.index')
@section('title','简答题添加')
@section('content')

<form class="form-horizontal" role="form">
  <div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">简答题目</label>

    
	    <div class="col-sm-10">
	      
	    	<textarea class="form-control"  rows="3"></textarea>
	  </div>
    </div>


  
  	<div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">答案</label>
	    <div class="col-sm-10">
	      
	    	<textarea class="form-control"  rows="3"></textarea>
	  </div>

    </div>
    <!-- <button type="submit" class="form-control " style="backgroundcolor:red">添加</button> -->
    <center><button type="button" class="btn btn-primary form-control">添加</button></center>
   <div class="col-sm-offset-2 col-sm-10">
      
    </div>
  </div>
</form>
@endsection