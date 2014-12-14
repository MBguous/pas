<?php $title="Edit Employee"; ?>
@extends('layouts.master')

@section('content')
	<div class="row">
    <div class="col-sm-12 col-lg-12">
			<h4>
				<i class="fa fa-edit"></i> <strong>Edit Employee</strong>
			</h4>
			<ol class="breadcrumb">
				<li><a href="#">Employees</a></li>
				<li class="active">Edit</li>
			</ol>			
	
			{{ Form::model($employee, array('route' => array('employees.update', $employee->id), 'method' => 'put')) }}
				@include('employees.partials.form')
			{{ Form::close() }}
		</div>
	</div>
@stop