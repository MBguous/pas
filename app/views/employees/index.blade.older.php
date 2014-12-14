@extends('layouts.master')


@section('content')

  <div class="row">
    <div class="col-sm-12 col-lg-12">
      <h4>
        <strong><i class="fa fa-group"></i> Employee Details</strong>
      </h4>
      <ol class="breadcrumb">
        <li class="active">Employee</li>
        <div style="float:right;"><a href="{{ action('EmployeesController@create') }}" class="btn btn-info btn-xs">
          <i class="fa fa-plus-square"></i> Add New Employee</a>
        </div>
      </ol>
    </div>

    <script>
      var tppasApp = angular.module('tppasApp', []);
      tppasApp.controller('tppasCtrl', function ($scope){
        $scope.employees = {{$employees}};
      });
      //$scope.sortField = 'id';
      // $scope.reverse = true;
      //});
    </script>
<!--   Search: <input ng-model="query" type="text"/>
 -->
    <div class="col-sm-12 col-lg-12">                     
      @if ($employees->isEmpty())
        There are no employees! :( 
        <br>Hire some already!!
      @else
        <table class="table table-striped table-condensed" style="background: #efefef">
          <thead>
            <tr>
              <th>ID</th>
              <th>First Name</th>
              <th>Last Name</th>
              <th>Email</th>
              <th>Phone</th>
              <th width="20%">Address</th>
              <th>Hire Date</th>
              <th>Employment Type</th>
              <th>Marital Status</th>
              <th width="10%">Actions</th>
            </tr>
          </thead>
          <tbody>
            @foreach($employees as $employee)              
              <tr>
                <td>{{$employee->id}}</td>
                <td>{{$employee->first_name}}</td>
                <td>{{$employee->last_name}}</td>
                <td>{{$employee->email}}</td>
                <td>{{$employee->phone}}</td>
                <td>{{$employee->address}}</td>
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
                  {{ Form::open(array(
                    'method' => 'DELETE', 
                    'route' => array('employees.destroy', $employee->id),
                    'style' => 'display:inline'
                    )) 
                  }}
                  {{-- Form::submit('Delete', array('class' => 'btn btn-danger btn-xs')) --}}
                    <button class='btn btn-xs btn-danger' type="submit" title="Delete Employee Details"><i class="fa fa-trash-o"></i></button>
                    {{--<button class='btn btn-xs btn-danger' type='submit' data-toggle="modal" data-target="#confirmDelete" data-title="Delete User" data-message='Are you sure you want to delete this user ?'>
                    <i class='glyphicon glyphicon-trash'></i> Delete
                    </button>--}}
                  {{ Form::close() }}
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
      @endif
    {{--@include('delete_confirm')--}}

    </div>
  </div>
  <!-- /.row -->
    
@stop
