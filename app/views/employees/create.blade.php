<?php $title="Add Employee"; ?>
@extends('layouts.master')

@section('content')
  <div class="row">
    <div class="col-sm-12 col-lg-12">
      <h4>
        <strong><i class="fa fa-group"></i> Add Employee</strong>
      </h4>
      <ol class="breadcrumb">
        <li>{{ HTML::linkRoute('employees.index', 'Employees') }}</li>
        <li class="active">Add Employee</li>
      </ol>
    </div>
  </div>
  <!-- /.row -->
    <h4>
      <i class="fa fa-plus-square"></i> <strong>Add New Employee</strong>
    </h4>
    
    @if ( $errors->count() > 0 )
      <div class="alert alert-danger">
        <ul>
          @foreach( $errors->all() as $message )</p>
              <li>{{ $message }}</li>
          @endforeach
        </ul>
      </div>
    @endif
    
    {{ Form::open(array('route' => 'employees.store')) }}
      @include('employees.partials.form')
    {{ Form::close() }}
@stop