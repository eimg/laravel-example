<?php namespace App\Models;

// --
use DB;
use Hash;

class User {

	static function insert($input) {
		$data = array(
			$input['name'],
			$input['email'],
			Hash::make($input['password'])
		);

		$result = DB::insert("INSERT INTO users (
						name, email, password
					) VALUES (?, ?, ?)", $data);

		return $result;
	}

	static function update($input) {
		if($input['password']) {
			$data = array(
				$input['name'],
				$input['email'],
				Hash::make($input['password']),
				$input['phone'],
				$input['address']
			);

			$result = DB::update("UPDATE users SET name = ?, email = ?, password = ?, phone = ?, address = ?", $data);

		} else {
			$data = array(
				$input['name'],
				$input['email'],
				$input['phone'],
				$input['address']
			);

			$result = DB::update("UPDATE users SET name = ?, email = ?, phone = ?, address = ?", $data);
		}

		return $result;
	}

	static function delete($user_id) {
		$result = DB::delete("DELETE FROM users WHERE id = ?", array($user_id));

		return $result;
	}

}
