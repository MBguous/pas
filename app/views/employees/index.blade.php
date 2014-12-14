@extends('layouts.master')

@section('content')

  <div class="row">
    <div class="col-sm-12 col-lg-12">
      <h4>
        <strong><i class="fa fa-group"></i> Employee Details</strong>
      
      <span style="float: right">
        {{ Form::open(array('action' => 'EmployeesController@search')) }}
          {{ Form::text('keyword', null, array('placeholder'=>'Search by First Name', 'class' => 'form-control')) }}
          <!-- {{ Form::submit('search', array('style' => 'display:inline')) }} -->
        {{ Form::close() }}
      </span>
    </h4>
      <ol class="breadcrumb">
        <li class="active">Employee</li>
        <div style="float:right;"><a href="{{ action('EmployeesController@create') }}" class="btn btn-info btn-xs">
          <i class="fa fa-plus-square"></i> Add New Employee</a>
        </div>
      </ol>
    </div>

    <div class="col-sm-12 col-lg-12">                     
      @if ($employees->isEmpty())
        There are no employees! :( 
        <br>Hire some already!!
      @else
        <table class="table table-striped table-condensed" style="background: #efefef">
          <thead>
            <tr>
              <th>ID</a></th>
              <th>First Name</th>
              <th>Last Name</th>
              <th>Email</th>
              <th>Phone</th>
              <th>Hire Date</th>
              <th>Employment Type</th>
              <th>Marital Status</th>
              <th width="10%">Actions</th>
            </tr>
          </thead>
          <tbody>
<!--               <tr ng-repeat="employee in employees | filter:query | orderBy:sortField:reverse">
 -->
            @foreach($employees as $employee)
              <tr>
                <td>{{$employee->id}}</td>
                <td>{{$employee->first_name}}</td>
                <td>{{$employee->last_name}}</td>
                <td>{{$employee->email}}</td>
                <td>{{$employee->phone}}</td>
                <td>{{$employee->hire_date}}</td>
                <td>{{$employee->employment_type}}</td>
                <td>{{$employee->marital_status}}</td>
                <td>
                  <a href="{{ action('EmployeesController@show', $employee->id) }}" class="btn btn-primary btn-xs" title="View Employee Details">
                    <i class="fa fa-eye"></i>
                  </a>
                  <a href="{{ action('EmployeesController@edit', $employee->id) }}" class="btn btn-warning btn-xs" title="Edit Employee Details">
                    <i class="fa fa-edit"></i>
                  </a>
                  
                  <a href="#delete" class="btn btn-xs btn-danger" data-toggle="modal" data-target=".bs-example-modal-sm">
                    <i class = "fa fa-trash-o"></i>
                  </a>
                  <div class="modal fade bs-example-modal-sm" id="delete">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">
                            <span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <p>Are you sure want to delete the employee's record?</p>
                        </div>
                        <div class="modal-footer">
                          {{ Form::open(array('route' => array('employees.destroy', $employee->id), 'method' => 'DELETE')) }}
                            <button type="submit" class="btn btn-primary">Yes</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                          {{ Form::close() }}
                        </div>
                      </div>
                    </div>
                  </div>

                  <!-- {{ Form::open(array(
                    'method' => 'DELETE', 
                    'route' => array('employees.destroy', $employee->id),
                    'style' => 'display:inline'
                    )) 
                  }}
                    <button class='btn btn-xs btn-danger' type="submit" title="Delete Employee Details"><i class="fa fa-trash-o"></i></button>
                  {{ Form::close() }} -->
                  </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        {{ $employees->links() }}
      @endif
    {{--@include('delete_confirm')--}}

    </div>
  </div>
  <!-- /.row -->
   
@stop
