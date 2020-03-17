<?php

namespace App\Http\Controllers;

use App\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    
	/* ---------------------------- *\
	|  Feature Controller            |
	|--------------------------------|
	|  1. CRUD Functions             |
	|  2. Get Functions              |
	|  3. View Functions             |
	|  4. Helper Functions           |
	\* ---------------------------- */

	/* --------------------- *\
	|  1. CRUD Functions      |
	\* --------------------- */

	public function create(Request $data) {
		if (User::where('username', $data->username)->active()->count() == 0) {
			$user = new User;
			$user->first_name = $data->first_name;
			$user->last_name = $data->last_name;
			$user->username = $data->username;
			$user->password = Hash::make($data->password);
			$user->mode = $data->mode;
			$user->save();

			return response()->json([
				'success' => true,
				'user' => $user->toArray()
			], 200);
		} else {
			return response()->json([
				'success' => false,
				'error' => 'Username is already taken.'
			], 200);
		}
	}

	public function read() {
		return response()->json([
			'success' => true,
			'user' => User::find($_GET['user_id'])->toArray()
		], 200);
	}

	public function update(Request $data) {
		$user = User::find($data->user_id);

		if (isset($data->first_name)) {
			$user->first_name = $data->first_name;
		}

		if (isset($data->last_name)) {
			$user->last_name = $data->last_name;
		}

		if (isset($data->username)) {
			if (User::where('username', $data->username)->active()->count() == 0) {
				$user->username = $data->username;
			}
		}

		if (isset($data->password)) {
			$user->password = Hash::make($data->password);
		}

		$user->save();

		return response()->json([
			'success' => true,
			'user' => $user->toArray()
		], 200);
	}

	public function delete(Request $data) {
		$user = User::find($data->user_id);
		$user->status = 0;
		$user->save();

		return response()->json([
			'success' => true
		], 200);
	}

	/* --------------------- *\
	|  2. Get Functions       |
	\* --------------------- */

	public function get() {}

	/* --------------------- *\
	|  3. View Functions      |
	\* --------------------- */

	/* --------------------- *\
	|  4. Helper Functions    |
	\* --------------------- */

	public function is_username_available() {
		if (User::where('username', $_GET['username'])->active()->count() == 0) {
			return response()->json([
				'success' => true
			], 200);
		} else {
			return response()->json([
				'success' => false
			], 200);
		}
	}

	public function login(Request $data) {
		if (User::where('username', $data->username)->active()->count() > 0) {
			$user = User::where('username', $data->username)->active()->first();

			if (Hash::check($data->password, $user->password)) {
				return response()->json([
					'success' => true,
					'user' => $user->toArray()
				], 200);
			} else {
				return response()->json([
					'success' => false,
					'error' => 'Password is incorrect.'
				], 200);
			}
		} else {
			return response()->json([
				'success' => false,
				'error' => 'User not found.'
			], 200);
		}
	}

}
