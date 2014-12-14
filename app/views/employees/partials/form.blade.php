
		<div class="form-group">
			{{ Form::label('first_name', 'First Name')}}
			{{ Form::text('first_name', null, ['class' => 'form-control']) }}
			{{ $errors->first('first_name', '<p class="error">:message</p>') }}
		</div>

		<div class="form-group">
			{{ Form::label('last_name', 'Last Name')}}
			{{ Form::text('last_name', null, ['class' => 'form-control']) }}
			{{ $errors->first('last_name', '<p class="error">:message</p>') }}
			</div>

		<div class="form-group">
			{{ Form::label('email', 'Email')}}
			{{ Form::text('email', null, ['class' => 'form-control']) }}
			{{ $errors->first('email', '<p class="error">:message</p>') }}
		</div>

		<div class="form-group">
			{{ Form::label('phone', 'Phone')}}
			{{ Form::text('phone', null, ['class' => 'form-control']) }}
			{{ $errors->first('phone', '<p class="error">:message</p>') }}
		</div>

		<div class="form-group">
			{{ Form::label('address', 'Address')}}
			{{ Form::text('address', null, ['class' => 'form-control']) }}
			{{ $errors->first('address', '<p class="error">:message</p>') }}
		</div>

		<div class="form-group">
			{{ Form::label('hire_date', 'Hire Date')}}
			{{ Form::text('hire_date', null, ['class' => 'form-control']) }}
			{{ $errors->first('hire_date', '<p class="error">:message</p>') }}
		</div>

		<div class="form-group">
			{{ Form::label('employment_type', 'Employment Type')}}
			{{ Form::text('employment_type', null, ['class' => 'form-control']) }}
			{{ $errors->first('employment_type', '<p class="error">:message</p>') }}
		</div>

		<div class="form-group">
			{{ Form::label('marital_status', 'Marital Status')}}
			{{ Form::text('marital_status', null, ['class' => 'form-control']) }}
			{{ $errors->first('marital_status', '<p class="error">:message</p>') }}
		</div>

		<div class="form-group">
			{{-- Form::submit('Save', ['class' => 'btn btn-primary']) --}}
			<button class="btn btn-primary" type="submit"><i class="fa fa-save"></i> &nbsp;&nbsp; Save</button>
			<a href="{{ action('EmployeesController@index') }}" class="btn btn-danger"><i class="fa fa-remove"></i> &nbsp;&nbsp; Cancel</a>
		</div>

