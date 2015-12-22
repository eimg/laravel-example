<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

// use Illuminate\Http\Request;
use Request;
use Validator;
use Auth;

// --
use App\Models\User;

class UserController extends Controller {

	function index() {
		if(Auth::check())
			return redirect("user/profile");

		return view("user/login");
	}

	function login() {
		$input = Request::all();

		if(Auth::attempt([
			'email' => $input['email'], 
			'password' => $input['password']
			])
		) {
			return redirect('user/profile');
		} else {
			return redirect('user/login')->withErrors(array('Login failed! Try again.'));
		}
	}

	function register() {
		if(Auth::check())
			return redirect("user/profile");

		return view("user/register");
	}

	function create() {
		$input = Request::all();

		$validator = Validator::make($input, array(
			"name" => "required",
			"email" => "required|email|unique:users",
			"password" => "required|min:6",
			"password_again" => "same:password"
		));

		if($validator->passes()) {
			User::insert($input);
			return redirect('user/login')->with('info', 'Register success!');
		} else {
			return redirect('user/register')->withErrors($validator);
		}
	}

	function profile() {
		if(!Auth::check())
			return redirect("user/login");

		$user = Auth::user();
		return view('user/profile', array(
			'id' => $user->id,
			'name' => $user->name,
			'email' => $user->email,
			'address' => $user->address,
			'phone' => $user->phone
		));
	}

	function update() {
		$input = Request::all();
		User::update($input);

		return redirect("user/profile")->with("info", "Profile Updated!");
	}

	function logout() {
		Auth::logout();
		return redirect('user/login');
	}

	function delete($user_id) {
		Auth::logout();
		User::delete($user_id);

		return redirect('user/register');
	}

}
