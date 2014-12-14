@extends('layouts.master')

@section('content')

<div class="row">
  <div class="col-sm-12 col-lg-12">
    <div class="panel panel-default">
      <!-- Default panel contents -->
      <div class="panel-heading">
      <h4>
        <strong><i class="fa fa-calendar"></i> Attendance</strong>
          <div class="btn-group" role="group" style="float:right">
            {{ HTML::linkRoute('attendances.show', 'View Attendance', null, ['class'=>"btn btn-default btn-sm active"]) }}
            {{ HTML::linkRoute('attendances.edit', 'Edit Attendance', null, ['class'=>"btn btn-default btn-sm"]) }}
            {{ HTML::linkRoute('attendances.show', 'My Attendance', null, ['class'=>"btn btn-default btn-sm"]) }}
          </div>
      </h4>
    </div>
    <div class="panel-body">
      <div class="row">
        {{ Form::open(array('action' => 'AttendancesController@show', 'method' => 'get')) }}
          <div class="col-lg-3">
            <div class="input-group">
              <span class="input-group-addon">
                {{Form::label('employee', 'View records of')}}
              </span>
              {{-- Form::input('date', 'effective_date', null, ['class'=>"form-control"]) --}}
            @if ($employee_id == NULL)
              {{ Form::select('employee', $employees, null, ['class'=>'form-control']) }}
            @else
              {{ Form::select('employee', $employees, $employee_id, ['class'=>'form-control']) }}
            @endif
            </div>
          </div>
          <div class="col-lg-3">
            <div class="input-group">
              <span class="input-group-addon">
                {{Form::label('from_date', 'From')}}
              </span>
              {{--Form::input('date', 'from_date', null, ['class'=>'form-control', 'value'=>$today])--}}
              <input type="date" name="from_date" class="form-control" value={{$from_date}}>
            </div>
          </div>
          <div class="col-lg-3">
            <div class="input-group">
              <span class="input-group-addon">
                {{Form::label('to_date', 'To')}}
              </span>
              <input type="date" name="to_date" class="form-control" value={{$to_date}}>
            </div>
          </div>
          <div class="col-lg-1">
            {{-- HTML::linkAction('AttendancesController@show', 'Go', null, ['class'=>'btn btn-default']) --}}
            {{ Form::submit('Go', ['class'=>'btn btn-primary']) }}
          </div>
        {{ Form::close() }}
      </div>
    </div>
      <!-- <ol class="breadcrumb">
        <li class="active">Attendance</li>
        <div style="float:right;"><a href="{{ action('RostersController@index') }}" class="btn btn-info btn-xs">
          <i class="fa fa-calendar-o"></i> Manage Employee Rosters</a>
        </div>
      </ol> -->
    	<table class="table table-striped table-condensed">
    		<thead>
          <th>Employee Name</th>
    			<th>Date</th>
    			<th>Day</th>
    			<th>Shift Start</th>
          <th>Clock-in</th>
          <th>Status</th>
    			<th>Shift End</th>
          <th>Clock-out</th>
          <th>Remarks</th>
    		</thead>
    		<tbody>
          @foreach ($attendances as $attendance)
            <tr>
              <td>
                {{ Employee::find($attendance->employee_id)->first_name }} {{ Employee::find($attendance->employee_id)->last_name }}
              </td>
              <td>{{ $attendance->date }}</td>
              <td>{{ $attendance->day }}</td>
              <td>{{ Employee::find($attendance->employee_id)->shift_start }}</td>
              <td>{{ $attendance->clock_in }}</td>
              <td>
                @if ($attendance->status == 'Late')
                  <span class="label label-danger">{{ $attendance->status }}</span>
                @elseif ($attendance->status == 'On Time')
                  <span class="label label-success">{{ $attendance->status }}</span>
                @else
                  {{ $attendance->status }}
                @endif
              </td>
              <td>{{ Employee::find($attendance->employee_id)->shift_end }}</td>
              <td>{{ $attendance->clock_out }}</td>
              <td>{{ $attendance->remarks }}</td>
            </tr>
          @endforeach
    		</tbody>
    	</table>
    </div>
  </div>
</div>
@stop

<!-- 	<?php $employees=Employee::all()?>-->	
 <script>
 //   		var tppasApp = angular.module('tppasApp', []);
	//    	tppasApp.controller('tppasCtrl', function ($scope){
	//      //get('{{$employees}}').success(function(data) {
	//       $scope.employees = {{$employees}};
	//     });
	//     //$scope.sortField = 'id';
	//    // $scope.reverse = true;
	//   //});
	 </script>

<!-- 	Search: <input ng-model="query" type="text"/>
    <table>
      <tr>
        <th><a href="" ng-click="sortField = 'id'; reverse=!reverse">ID</a></th>
        <th><a href="" ng-click="sortField='first_name';reverse=!reverse">First Name</a></th>
      </tr>
      <tr ng-repeat="employee in employees | filter:query | orderBy:sortField:reverse">
        <td>@{{employee.id}}</td>
        <td>@{{employee.first_name}}</td>
      </tr>
    </table> -->