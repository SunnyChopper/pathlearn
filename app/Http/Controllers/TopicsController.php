<?php

namespace App\Http\Controllers;

use App\Topic;

use Illuminate\Http\Request;

class TopicsController extends Controller
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
		$topic = new Topic;
		$topic->title = $data->title;
		$topic->category_id = $data->category_id;
		$topic->instances = $data->instances;
		$topic->save();

		return response()->json([
			'success' => true,
			'topic' => $topic->toArray()
		], 200);
	}

	public function read() {
		return response()->json([
			'success' => true,
			'topic' => Topic::find($_GET['topic_id'])->toArray()
		], 200);
	}

	public function update(Request $data) {
		$topic = Topic::find($data->topic_id);

		if (isset($data->title)) {
			$topic->title = $data->title;
		}

		if (isset($data->category_id)) {
			$topic->category_id = $data->category_id;
		}

		if (isset($data->instances)) {
			$topic->instances = $data->instances;
		}

		$topic->save();

		return response()->json([
			'success' => true,
			'topic' => $topic->toArray()
		], 200);
	}

	public function delete(Request $data) {
		$topic = Topic::find($data->topic_id);
		$topic->status = 0;
		$topic->save();

		return response()->json([
			'success' => true
		], 200);
	}

	/* --------------------- *\
	|  2. Get Functions       |
	\* --------------------- */

	public function get() {
		if (isset($_GET['category_id'])) {
			return response()->json([
				'success' => true,
				'topics' => Topic::where('category_id', $_GET['category_id'])->active()->get()->toArray()
			], 200);
		} else {
			return response()->json([
				'success' => true,
				'topics' => Topic::active()->get()->toArray()
			], 200);
		}
	}

	/* --------------------- *\
	|  3. View Functions      |
	\* --------------------- */

	/* --------------------- *\
	|  4. Helper Functions    |
	\* --------------------- */

}
