@extends('layouts.master')

@section('content')

<div class="row">
  <div class="col-sm-12 col-lg-12">
  	<div class="panel panel-default">
		  <!-- Default panel contents -->
		  <div class="panel-heading">
		  	<h4>
			  	<strong><i class="fa fa-calendar-o"></i> Employee Roster</strong>
			  	<div class="btn-group" role="group" style="float:right">
			    	{{ HTML::linkRoute('rosters.create', 'Create Roster', null, ['class'=>"btn btn-default btn-sm active"]) }}
			    	{{ HTML::linkRoute('rosters.show', 'View Roster', null, ['class'=>"btn btn-default btn-sm"]) }}
			    	{{ HTML::linkRoute('rosters.edit', 'Edit Roster', null, ['class'=>"btn btn-default btn-sm"]) }}
					</div>
				</h4>
		  </div>
		  <div class="panel-body">
		  	{{ Form::open(array('route' => 'rosters.store')) }}
		  	<div class="input-group">
  				<span class="input-group-addon">{{Form::label('effective_date', 'Effective Date')}}</span>
  				{{ Form::input('date', 'effective_date', null, ['class'=>"form-control", 'style'=>"width:25%"]) }}
   				<!-- <input type="date" name="effective_date" class="form-control" style="width:25%"> -->
	  		</div>
		  </div>
	  	<table class="table table-striped table-condensed">
	  		<thead>
	  			<th>Employee</th>
	  			<th>Sunday</th>
	  			<th>Monday</th>
	  			<th>Tuesday</th>
	  			<th>Wednesday</th>
	  			<th>Thursday</th>
	  			<th>Friday</th>
	  		</thead>
				<tbody>
					@foreach($employees as $employee)

					<tr>
						<td>
<!-- 							{{ Form::select('employee', $employees, null, ['class' => 'form-control']) }}
 -->					{{ $employee->first_name }} {{ $employee->last_name }}
						</td>
						<td>
							<input type="text" name="start_time[{{$employee->id}}][sunday]" class="form-control" value="MAHESH1"/>
							<input type="text" name="end_time[{{$employee->id}}][sunday]" class="form-control" value="MAHESH12"/>
							{{-- Form::text('start_time[]', null, ['class' => 'form-control', 'placeholder' => '08:00:00']) --}}
							{{-- Form::text('end_time', null, ['class' => 'form-control', 'placeholder' => '16:00:00']) --}}
						</td>
						<td>
							<input type="text" name="start_time[{{$employee->id}}][monday]" class="form-control" value="MAHESH11"/>
							<input type="text" name="end_time[{{$employee->id}}][monday]" class="form-control" value="MAHESH14"/>							
							{{-- Form::text('start_time', null, ['class' => 'form-control', 'placeholder' => '08:00:00']) --}}
							{{-- Form::text('end_time', null, ['class' => 'form-control', 'placeholder' => '16:00:00']) --}}
						</td>
						<!-- <td>
							<input type="text" name="start_time[][tuesday]" class="form-control" value="MAHESH1w"/>
							<input type="text" name="end_time[][tuesday]" class="form-control" value="MAHESH1ds"/>
							{{-- Form::text('start_time', null, ['class' => 'form-control', 'placeholder' => '08:00:00']) --}}
							{{-- Form::text('end_time', null, ['class' => 'form-control', 'placeholder' => '16:00:00']) --}}
						</td>
						<td>
							<input type="text" name="start_time[][wednesday]" class="form-control" value="MAHESH1dd"/>
							<input type="text" name="end_time[][wednesday]" class="form-control" value="MAHESH198"/>
							{{-- Form::text('start_time', null, ['class' => 'form-control', 'placeholder' => '08:00:00']) --}}
							{{-- Form::text('end_time', null, ['class' => 'form-control', 'placeholder' => '16:00:00']) --}}
						</td>
						<td>
							<input type="text" name="start_time[][thursday]" class="form-control" value="MAHESH132"/>
							<input type="text" name="end_time[][thursday]" class="form-control" value="MAHESH187"/>
							{{-- Form::text('start_time', null, ['class' => 'form-control', 'placeholder' => '08:00:00']) --}}
							{{-- Form::text('end_time', null, ['class' => 'form-control', 'placeholder' => '16:00:00']) --}}
						</td>
						<td>
							<input type="text" name="start_time[][friday]" class="form-control" value="MAHESH1df"/>
							<input type="text" name="end_time[][friday]" class="form-control" value="MAHESH1"df/>
							{{-- Form::text('start_time', null, ['class' => 'form-control', 'placeholder' => '08:00:00']) --}}
							{{-- Form::text('end_time', null, ['class' => 'form-control', 'placeholder' => '16:00:00']) --}}
						</td>
											</tr> -->

					@endforeach
					
				</tbody>
				{{ Form::submit('Save') }}
					{{ Form::close() }}
	  	</table>
	  	
	  </div>
  </div>
</div>

@stop