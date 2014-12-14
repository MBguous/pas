<?php

class ReportsController extends BaseController {

		public $active_link = [
		'title' => "Reports", 
		'emp_active' => "", 
		'home_active' => "",
		'att_active' => "",
		'roster_active' => "",
		'reports_active' => "active"];

	public function index(){
		$employees = Employee::get();
		$employees = array('' => 'All') + $employees->lists('full_name', 'id');
		return View::make('reports/index', compact('employees'))->with($this->active_link);
	}

	public function generate(){
		$period = Input::get('period');
		$report = Input::get('report');
		$department = Input::get('department');
		$employee_id = Input::get('employee');
		$from_date = Input::get('from_date');
		$to_date = Input::get('to_date');
		$employee_name = NULL;

		// Weekly Attendance Report
		if ($period == 1 and $report == 1) {
			$to_date = date("Y-m-d");
			$from_date = Carbon::today()->subWeek()->format("Y-m-d");
			$attendances = DB::table('attendances')->whereBetween('date', array($from_date, $to_date))->get();
			if ($employee_id > 0) {
				$attendances = DB::table('attendances')->where('employee_id', $employee_id)->whereBetween('date', array($from_date, $to_date))->get();
				$employee = Employee::find($employee_id);
				$employee_name = $employee->first_name. ' '.$employee->last_name;
			}

			$pdf = App::make('dompdf');
			$pdf->loadView('reports.attendance', compact('attendances', 'employee_name', 'from_date', 'to_date', 'period'))
				->setOrientation('landscape');
			return $pdf->stream();
		}

		// Monthly Attendance Report
		elseif ($period == 2 and $report == 1) {
			$to_date = date("Y-m-d");
			$from_date = Carbon::today()->subMonth()->format("Y-m-d");
			$attendances = DB::table('attendances')->whereBetween('date', array($from_date, $to_date))->get();
			if ($employee_id > 0) {
				$attendances = DB::table('attendances')->where('employee_id', $employee_id)->whereBetween('date', array($from_date, $to_date))->get();
				$employee = Employee::find($employee_id);
				$employee_name = $employee->first_name. ' '.$employee->last_name;
			}

			$pdf = App::make('dompdf');
			$pdf->loadView('reports.attendance', compact('attendances', 'employee_name', 'from_date', 'to_date', 'period'))
				->setOrientation('landscape');
			return $pdf->stream();
		}

	}
}
	// public function test(){
	// require_once(base_path()."/vendor/dompdf/dompdf/dompdf_config.inc.php");
	// 	define("DOMPDF_ENABLE_AUTOLOAD", false);
	// 	require_once base_path() . "/vendor/dompdf/dompdf/dompdf_config.inc.php";
	// 	$pdf = PDF::loadHTML('<h1>Test</h1>');
	// 	return $pdf->stream();
	// }

	// public function weeklyAttendanceReport(){
	// 	//dd('Weekly Attendance Report');
	// 	$to_date = date("Y-m-d");
	// 	$from_date = Carbon::today()->subWeek()->format("Y-m-d");
		// $attendances = DB::table('attendances')->whereBetween('date', array($from_date, $to_date))->get();
//dd('meh');
		// return View::make('attendances.index', compact('attendances'), compact('employees'))
		// 	->with($this->active_link)
		// 	->with('to_date', $to_date)
		// 	->with('from_date', $from_date);
			//->with('employee_id', $employee_id);
		
		// define("DOMPDF_ENABLE_AUTOLOAD", false);
		// require_once base_path() . "/vendor/dompdf/dompdf/dompdf_config.inc.php";
		// $pdf = PDF::loadView('reports.attendance', compact('attendances'));
		// return $pdf->stream();
	// }

	// public function monthlyAttendanceReport(){
	// 	dd('Monthly Attendance Report');
	// }