<?php $title="View Employee"; ?>
@extends('layouts.master')

@section('content')
	

<!-- Page Heading -->
<div class="row">
  <div class="col-sm-12 col-lg-12">
    <h4>
      <strong>View Employee Details</strong>
    </h4>
    <ol class="breadcrumb">
      <li>
        <a href="#"><i class="fa fa-group"></i> Employee</a>
      </li>
      <li class="active">View</li>
    </ol>
  </div>
</div>
<!-- /.row -->
<div class="row">
  <div class="col-lg-12">
    <table class="table table-striped table-condensed" style="background: #efefef">
      <tr>
        <th>ID</th>
        <td>{{ $employee->id }}</td>                    
      </tr>
      <tr>
        <th>First Name</th>
        <td>{{ $employee->first_name }}</td>          
      </tr>
      <tr>
        <th>Last Name</th>
        <td>{{ $employee->last_name }}</td>
      </tr>
      <tr>
        <th>Email</th>
        <td>{{ $employee->email }}</td>
      </tr>
      <tr>
        <th>Phone</th>
        <td>{{ $employee->phone }}</td>
      </tr>
      <tr>
        <th>Address</th>
        <td>{{ $employee->address }}</td>
      </tr>
      <tr>
        <th>Hire Date</th>
        <td>{{ $employee->hire_date }}</td>
      </tr>
      <tr>
        <th>Employment Type</th>
        <td>{{ $employee->employment_type }}</td>
      </tr>
      <tr>
        <th>Marital Status</th>
        <td>{{ $employee->marital_status }}</td>
      </tr>
    </table>
  </div>
</div>
<!-- /.row -->

@stop