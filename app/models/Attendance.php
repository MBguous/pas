<?php

class Attendance extends \Eloquent {

	protected $table = 'attendances';

	// Add your validation rules here
	public static $rules = [
		'date' => 'date',
		'day' => 'required',
		'clock_in' => 'required',
		'clock_out' => 'sometimes|required',
		//'status' => 'text',
		'employee_id' => 'integer'
	];

	// Don't forget to fill this array
	protected $fillable = ['date', 'day', 'clock_in', 'clock_out', 'status', 'employee_id'];

	public function employee(){
		return $this->belongsTo('Employee');
	}

}