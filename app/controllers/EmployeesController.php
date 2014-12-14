<?php

class EmployeesController extends \BaseController {
		public $active_link = [
			'title' => "Employees", 
			'emp_active' => "active", 
			'home_active' => "",
			'att_active' => "",
			'roster_active' => "",
			'reports_active' => ""];

	/**
	 * Display a listing of employees
	 *
	 * @return Response
	 */
	public function index()
	{
		$employees = Employee::paginate(5);
		return View::make('employees.index', compact('employees'))->with($this->active_link);
	}

	public function search()
	{
		$keyword = Input::get('keyword');
		$employees = Employee::where('first_name', 'LIKE', '%'.$keyword.'%')->paginate(5);
		//var_dump($employees);
		return View::make('employees.index', compact('employees'))->with($this->active_link);
	}

	/**
	 * Show the form for creating a new employee
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('employees.create')->with($this->active_link);
	}

	/**
	 * Store a newly created employee in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Employee::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Employee::create($data);

		return Redirect::route('employees.index');
	}

	/**
	 * Display the specified employee.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$employee = Employee::findOrFail($id);

		return View::make('employees.show', compact('employee'))->with($this->active_link);
	}

	/**
	 * Show the form for editing the specified employee.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$employee = Employee::find($id);

		return View::make('employees.edit', compact('employee'))->with($this->active_link);
	}

	/**
	 * Update the specified employee in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$employee = Employee::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Employee::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$employee->update($data);

		return Redirect::route('employees.index');

	}

	/**
	 * Remove the specified employee from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Employee::destroy($id);

		return Redirect::route('employees.index');
	}
}
