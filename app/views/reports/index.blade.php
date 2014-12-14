@extends('layouts.master')

@section('content')

<div class="row">
  <div class="col-sm-12 col-lg-12">
    <div class="panel panel-default">
      <!-- Default panel contents -->
      <div class="panel-heading">
      <h4>
        <strong><i class="fa fa-files-o"></i> Reports</strong>
          <div class="btn-group" role="group" style="float:right">
            {{ HTML::linkRoute('attendances.show', 'View Attendance', null, ['class'=>"btn btn-default btn-sm active"]) }}
            {{ HTML::linkRoute('attendances.edit', 'Edit Attendance', null, ['class'=>"btn btn-default btn-sm"]) }}
            {{ HTML::linkRoute('attendances.show', 'My Attendance', null, ['class'=>"btn btn-default btn-sm"]) }}
          </div>
      </h4>
    </div>
    <div class="panel-body">
    {{ Form::open(array('action' => 'ReportsController@generate', 'method' => 'post')) }}      
      <div class="row">
          <div class="col-lg-6">
            <div class="input-group">
              <span class="input-group-addon">
                {{Form::label('Period')}}
              </span>
              {{-- Form::input('date', 'effective_date', null, ['class'=>"form-control"]) --}}
              {{ Form::select('period', ['Select Period', 'Weekly', 'Monthly'], null, ['class'=>'form-control']) }}
            </div>
            <hr/>

            <div class="input-group">
              <span class="input-group-addon">
                {{Form::label('Report')}}
              </span>
              {{-- Form::input('date', 'effective_date', null, ['class'=>"form-control"]) --}}
              {{ Form::select('report', ['Select Report Type', 'Attendance Report', 'Salary Sheet', 'Payroll Sheet'], null, ['class'=>'form-control']) }}
            </div>
            <hr/>

            <div class="input-group">
              <span class="input-group-addon">
                {{Form::label('Department')}}
              </span>
              {{ Form::select('department', ['Select Department', 'Exco', 'Accounts', 'R & D', 'HR'], null, ['class'=>'form-control']) }}
            </div>
            <hr/>

            <div class="input-group">
              <span class="input-group-addon">
                {{Form::label('Employee')}}
              </span>
              {{ Form::select('employee', $employees, null, ['class'=>'form-control']) }}
            </div>
            <hr/>

            <div class="input-group">
              <span class="input-group-addon">
                {{Form::label('from_date', 'From')}}
              </span>
              <input type="date" name="from_date" class="form-control">
            </div>
            <hr/>

            <div class="input-group">
              <span class="input-group-addon">
                {{Form::label('to_date', 'To')}}
              </span>
              <input type="date" name="to_date" class="form-control">
            </div>
            <hr/>
<!--         <div class="row">
          <div class="col-lg-12"> -->
            {{-- HTML::linkAction('AttendancesController@show', 'Go', null, ['class'=>'btn btn-default']) --}}
            {{ Form::submit('Generate', ['class'=>'btn btn-primary pull-right']) }}
<!--           </div> -->
        {{ Form::close() }}
<!--       </div> -->
    </div>
    <div class="col-lg-6">
    </div>
    </div>
    </div>	
    </div>
  </div>
</div>
@stop