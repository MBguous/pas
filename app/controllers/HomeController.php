<?php

class HomeController extends BaseController {

	public function index()
	{
		date_default_timezone_set('Asia/Kathmandu');
		$d = date("Y-m-d");
		$t = date("");

		$employee_id = Auth::user()->employee_id;
		$employee = DB::table('employees')->where('id', $employee_id)->first();
		//$attendance = DB::table('attendances')->where(array('employee_id' => $employee_id, 'date' => $d))->first();
		//$attendance = Attendance::all();
		//dd($attendance);

		//$users = User::all();
		//$empid = User::find($id)->employee_id;
		$title = "Home";
		$home_active = "active"; 
		$emp_active = ""; 
		$att_active = "";
		$roster_active = "";
		$reports_active = ""; 
		return View::make('home', compact('title', 'home_active', 'emp_active', 'att_active', 'roster_active', 'reports_active','d', 't'));
	}
}
