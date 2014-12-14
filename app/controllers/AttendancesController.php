<?php

class AttendancesController extends \BaseController {

	public $active_link = [
		'title' => "Employees", 
		'emp_active' => "", 
		'home_active' => "",
		'att_active' => "active",
		'roster_active' => "",
		'reports_active' => ""];

	/**
	 * Display a listing of attendances
	 *
	 * @return Response
	 */
	public function index()
	{

		$to_date = date("Y-m-d");
		$from_date = Carbon::today()->subWeek()->format("Y-m-d");
		$employee_id = NULL;
		//dd(Carbon::now());
		//echo "<pre>";
		//$attendances = Attendance::all();
		// $attendances = Attendance::whereBetween('date', '2014-12-10', 'between', '2014-12-03');
		$attendances = DB::table('attendances')->whereBetween('date', array($from_date, $to_date))->get();
		// echo "<pre>";
		// var_dump($attendances);
		// exit;
		//Attendance->employee_id;
		$employees = Employee::get();
		$employees = array('' => 'All') + $employees->lists('full_name', 'id');
		return View::make('attendances.index', compact('attendances'), compact('employees'))
			->with($this->active_link)
			->with('to_date', $to_date)
			->with('from_date', $from_date)
			->with('employee_id', $employee_id);
	}

	/**
	 * Show the form for creating a new attendance
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('attendances.create');
	}

	/**
	 * Store a newly created attendance in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//date_default_timezone_set('Asia/Kathmandu');
		$d = date("Y-m-d");
		$t = date("H:i:s");
		$day = date("l");
		$employee_id = Auth::user()->employee_id;
		//$start_time = DB::table('rosters')->where('employee_id', $employee_id)->pluck('start_time');
		//$start_time = $roster->start_time;
		$shift_start = Employee::find($employee_id)->shift_start;
		//dd($shift_start-$t);
		// echo "<pre>";
		// echo $shift_start;
		// exit;
		if ($t > $shift_start){
			$status = 'Late';
		}
		else {
			$status = 'On Time';
		}
		//dd($status);
		$data = ['date'=>$d, 'day'=>$day, 'clock_in'=>$t, 'status'=>$status, 'employee_id'=>$employee_id];
		
		$validator = Validator::make($data, Attendance::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Attendance::create($data);

		//return Redirect::route('attendances.index');
    return Redirect::intended('home');

	}

	/**
	 * Display the specified attendance.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//dd(Input::all());
		//$attendance = Attendance::findOrFail($id);
		//dd('show');
		$employee_id = Input::get('employee');
		$from_date = Input::get('from_date');
		$to_date = Input::get('to_date');
		$attendances = DB::table('attendances')->where('employee_id', $employee_id)->whereBetween('date', array($from_date, $to_date))->get();
		$employees = Employee::get();
		$employees = array('' => 'All') + $employees->lists('full_name', 'id');
		return View::make('attendances.index', compact('attendances'), compact('employees'))
			->with($this->active_link)
			->with('to_date', $to_date)
			->with('from_date', $from_date)
			->with('employee_id', $employee_id);
	}

	// public function showMine($id)
	// {
	// 	$attendance = Attendance::findOrFail($id);

	// 	return View::make('attendances.show', compact('attendance'));
	// }

	/**
	 * Show the form for editing the specified attendance.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$attendance = Attendance::find($id);

		return View::make('attendances.edit', compact('attendance'));
	}

	/**
	 * Update the specified attendance in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */

	public function update($id)
	{
		date_default_timezone_set('Asia/Kathmandu');
		$d = date("Y-m-d");
		$t = date("H:i:s");
		$employee_id = Auth::user()->employee_id;
		$id = DB::table('attendances')->where(array('employee_id' => $employee_id, 'date' => $d))->pluck('id');
		$data = ['clock_out'=>$t];

		$attendance = Attendance::findOrFail($id);
		//dd($attendances->id);
		$validator = Validator::make($data, Attendance::$rules);

		// if ($validator->fails())
		// {
		// 	return Redirect::back()->withErrors($validator)->withInput();
		// }

		$attendance->update($data);

		return Redirect::intended('home');
	}

	/**
	 * Remove the specified attendance from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Attendance::destroy($id);

		return Redirect::route('attendances.index');
	}

}
