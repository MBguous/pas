<?php


class AuthController extends \BaseController
{

  public function getLogin(){
    return View::make('login')->with([
      'title'           => "Login",
      'emp_active'      => "",
      'home_active'     => "",
      'att_active'      => "",
      'roster_active'   => "",
      'reports_active'  => "",
      'login_page'      => "active",
      'password_error'  => NULL]);
  }

  public function postLogin(){
    $data = Input::all();
    //dd($data['username']);

    $validator = Validator::make($data, User::$auth_rules);
    if ($validator->fails())
    {
      return Redirect::back()->withErrors($validator)->withInput();
    }

    if (Auth::attempt(array('username' => $data['username'], 'password' => $data['password']))){
      return Redirect::intended('home');
    }
    
    else {
      $password_error = !NULL;
      return Redirect::route('login')->with('password_error', $password_error);
    }
  }

  public function getLogout(){
    Auth::logout();
    return Redirect::route('login');
}
} 