<?php

class Employee extends \Eloquent {

	protected $table = 'employees';
	
	// Add your validation rules here
	public static $rules = [
		'first_name' => 'required',
		'last_name' => 'required',
		'email' => 'required|email',
		'phone' => 'required',
		'address' => 'required',
		'hire_date' => 'required',
		'employment_type' => 'required',
		'marital_status' => 'required',
		'shift_start' => 'required',
		'shift_end' => 'required'
	];

	// Don't forget to fill this array
	protected $fillable = ['first_name', 'last_name', 'email', 'phone', 'address', 'hire_date', 'employment_type', 
		'marital_status', 'shift_start', 'shift_end'];

	public function user(){
		return $this->hasOne('User');
	}

	public function attendances(){
		return $this->hasMany('Attendance');
	}

	public function rosters(){
		return $this->hasMany('Roster');
	}

	public function getFullNameAttribute(){
		return $this->attributes['first_name'].' '.$this->attributes['last_name'];
	}
}