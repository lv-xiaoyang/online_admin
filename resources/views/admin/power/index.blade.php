@extends('admin.index')
@section('title','权限展示页面')
@section('content')
        <!-- Static Table Start -->
<div class="data-table-area mg-tb-15">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="sparkline13-list">
                    <div class="sparkline13-hd">
                        <div class="main-sparkline13-hd">
                            <h1><span class="table-project-n">权限展示页面</span></h1>
                        </div>
                    </div>
                    <div class="sparkline13-graph">
                        <div class="datatable-dashv1-list custom-datatable-overright">
                            <div id="toolbar">
                                <select class="form-control">
                                    <option value="">Export Basic</option>
                                    <option value="all">Export All</option>
                                    <option value="selected">Export Selected</option>
                                </select>
                            </div>
                            <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true"
                                   data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
                                <thead>
                                <tr>
                                    <th data-field="state" data-checkbox="true"></th>
                                    <th data-field="id">ID</th>
                                    <th data-field="name" data-editable="true">权限名称</th>
                                    <th data-field="company" data-editable="true">权限</th>
                                    <th data-field="price" data-editable="true">权限描述</th>
                                    <th data-field="date" data-editable="true">添加时间</th>
                                    <th data-field="action">操作</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($data as $k=>$v)
                                <tr>
                                    <td></td>
                                    <td>{{$v->pow_id}}</td>
                                    <td>{{$v->pow_name}}</td>
                                    <td>{{$v->pow_url}}</td>
                                    <td>{{$v->pow_desc}}</td>
                                    <td>{{date('Y-m-d H:i:s',$v->pow_time)}}</td>
                                    <td>
                                        <a href="/power/edit/{{$v->pow_id}}">
                                            <span class="glyphicon glyphicon-pencil" id="update"></span>
                                        </a>
                                        <a href="/power/destroy/{{$v->pow_id}}">
                                            <span class="glyphicon glyphicon-remove" id="destroy"></span>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Static Table End -->
@endsection