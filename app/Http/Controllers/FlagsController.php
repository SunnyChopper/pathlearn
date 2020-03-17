<?php

namespace App\Http\Controllers;

use App\ContentFlag;

use Illuminate\Http\Request;

class FlagsController extends Controller
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
		$flag = new ContentFlag;
		$flag->mode = $data->mode;
		$flag->roadmap_id = $data->roadmap_id;
		$flag->content_id = $data->content_id;
		$flag->save();

		return response()->json([
			'success' => true,
			'flag' => $flag->toArray()
		], 200);
	}

	public function update(Request $data) {
		$flag = ContentFlag::find($data->flag_id);
		$flag->status = $data->status;
		$flag->save();

		return response()->json([
			'success' => true,
			'flag' => $flag->toArray()
		], 200);
	}

	public function delete(Request $data) {
		$flag = ContentFlag::find($data->flag_id);
		$flag->status = 0;
		$flag->save();

		return response()->json([
			'success' => true
		], 200);
	}

	/* --------------------- *\
	|  2. Get Functions       |
	\* --------------------- */

	public function get() {
		return response()->json([
			'success' => true,
			'flags' => ContentFlag::active()->get()->toArray()
		], 200);
	}

	/* --------------------- *\
	|  3. View Functions      |
	\* --------------------- */

	/* --------------------- *\
	|  4. Helper Functions    |
	\* --------------------- */

}
