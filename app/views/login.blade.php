@extends('layouts.master')

@section('content')

  <div class="row text-center ">
    <div class="col-md-12">
      <br />
      <h1> <strong>Login</strong></h1>  
      <br />
    </div>
  </div>

  <div class="row ">
         
    <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">

      <div class="panel panel-default">
        <div class="panel-heading">
          <strong>Enter Details To Login</strong>  
        </div>
        <div class="panel-body">
          <br>
          {{ Form::open(array('route' => 'login')) }}
            
            <div>{{ $errors->first('username', '<p class="error">:message</p>') }}</div>
            <div class="form-group input-group">
              <span class="input-group-addon"><i class="fa fa-user"  ></i></span>
              {{ Form::text('username', null, ['class'=>"form-control", 'placeholder'=>"Username"]) }}
            </div>
              
            {{ $errors->first('password', '<p class="error">:message</p>') }}
            <div class="form-group input-group">
              @if (Session::get('password_error') == NULL)
                <span class="input-group-addon"><i class="fa fa-key"  ></i></span>  
                {{ Form::password('password', ['class'=>"form-control", 'placeholder'=>"Password"]) }}
              @else
                <span class="input-group-addon"><i class="fa fa-key"  ></i></span>  
                {{ Form::password('password', ['class'=>"form-control", 'placeholder'=>"Enter the correct password"]) }}
              @endif
            </div>

            <!-- <div class="form-group">
              <label class="checkbox-inline">
                {{ Form::checkbox('checkbox') }} Remember me
              </label>
              <span class="pull-right">
                {{ HTML::link('#', 'Forget password?') }}
              </span>
            </div> -->
            <br>
            <hr />   
            <span class="pull-right"><button type="submit" class="btn btn-primary ">Log in</button></span>
            <!-- <hr />
            Not registered? {{ HTML::link('#', 'click here') }} --> 

          {{ Form::close() }}
        </div>
      </div>
    </div>       
  </div>

@stop