<?php

class RostersController extends \BaseController {

	public $active_link = [
		'title' => "Attendance", 
		'emp_active' => "", 
		'home_active' => "",
		'att_active' => "",
		'roster_active' => "active",
		'reports_active' => ""];
	
	/**
	 * Display a listing of rosters
	 *
	 * @return Response
	 */
	public function index()
	{
		$rosters = Roster::all();
		
		return View::make('rosters.index', compact('rosters'))->with($this->active_link);
	}

	/**
	 * Show the form for creating a new roster
	 *
	 * @return Response
	 */
	public function create()
	{
		$employees = Employee::all();
		// $array1 = [];
		// foreach($employees as $employee){
		// 	$array1 = array_add($array1, $employee->id, $employee->first_name $employee->last_name);
		// } 
		//$employees = Employee::lists('first_name', 'id');
		// $employees = Employee::get();
		// $employees = $employees->lists('full_name', 'id');
		return View::make('rosters.create', compact('employees'))->with($this->active_link);
	}

	/**
	 * Store a newly created roster in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//dd(strtotime(Input::get('start_time')));
		echo "<pre>";
		//print_r($_POST);
		//print_r($_POST);

		$start_time = $_POST['start_time'];
		$end_time = $_POST['end_time'];

		$transaction = 'start transaction';


		$employees = array('1', '2', '3');
		$days = array('Sunday', 'Monday', 'Tuesday');
		foreach ($employees as $emp_id) {
			foreach ($days as $day) {
				$model = new Roster;
				$model->emp_id = $emp_id;
				$model->day = $day;
				$model->start_time = $start_time[$emp_id][$model->day];
				$model->end_time = $end_time[$emp_id][$model->day];
				if(!$model->save()){
					$transaction->rollback();
					//Redirect to error page;
				}
			}
		}

		$transaction->commit();

		echo $_POST['start_time'][1]['sunday'], "<br>";
		echo $_POST['end_time'][2]['sunday'];
		exit;

		$validator = Validator::make($data = Input::all(), Roster::$rules);

		// if ($validator->fails())
		// {
		// 	return Redirect::back()->withErrors($validator)->withInput();
		// }

		//$data = $data->with()
		dd($data);
		Roster::create($data);

		return Redirect::route('rosters.index');
	}

	/**
	 * Display the specified roster.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$roster = Roster::findOrFail($id);

		return View::make('rosters.show', compact('roster'));
	}

	/**
	 * Show the form for editing the specified roster.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$roster = Roster::find($id);

		return View::make('rosters.edit', compact('roster'));
	}

	/**
	 * Update the specified roster in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$roster = Roster::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Roster::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$roster->update($data);

		return Redirect::route('rosters.index');
	}

	/**
	 * Remove the specified roster from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Roster::destroy($id);

		return Redirect::route('rosters.index');
	}

}
