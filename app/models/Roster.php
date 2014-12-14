<?php

class Roster extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		 'start_time' => 'sometimes|required',
		 'end_time' => 'sometimes|required',
		 'effective_date' => 'date',
		 'employee_id' => 'integer'
	];

	// Don't forget to fill this array
	protected $fillable = ['start_time', 'end_time', 'effective_date', 'employee_id'];

	public function employee(){
		return $this->belongsTo('Employee');
	}
}