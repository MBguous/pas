@extends('layouts.master')

@section('content')
 
@include('rosters.partials.nav')

	<div class="row">
		<div class="col-sm-12 col-lg-12">
			<table>
				<thead>					
					<th>Employee ID</th>
					<th>Employee</th>
					<th>Start Time</th>
					<th>End Time</th>
					<th>Effective Date</th>
				</thead>
				<tbody>
					@foreach ($rosters as $roster)
						<tr>
							<td>{{ $roster->employee_id }}</td>
							<td>{{ $roster->employee->first_name }} {{ $roster->employee->last_name }}</td>
							<td>{{ $roster->start_time }}</td>
							<td>{{ $roster->end_time }}</td>
							<td>{{ $roster->effective_date }}</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>

@stop