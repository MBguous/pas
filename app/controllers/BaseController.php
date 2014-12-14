<?php

class BaseController extends Controller {

	protected $logged_user;
	public function __construct(){
		if(Auth::check()){
			$this->logged_user = Auth::user()->employee;
		}
		View::share('logged_user', $this->logged_user);
	}
	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
	}

}
