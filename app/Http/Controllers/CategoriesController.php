<?php

namespace App\Http\Controllers;

use App\Category;

use Illuminate\Http\Request;

class CategoriesController extends Controller
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
		$category = new Category;
		$category->title = $data->title;
		$category->description = $data->description;
		$category->save();

		return response()->json([
			'success' => true,
			'category' => $category->toArray()
		], 200);
	}

	public function read() {
		return response()->json([
			'success' => true,
			'category' => Category::find($_GET['category_id'])->toArray()
		], 200);
	}

	public function update(Request $data) {
		$category = Category::find($data->category_id);

		if (isset($data->title)) {
			$category->title = $data->title;
		}

		if (isset($data->description)) {
			$category->description = $data->description;
		}

		return response()->json([
			'success' => true,
			'category' => $category->toArray()
		], 200);
	}

	public function delete(Request $data) {
		$category = Category::find($data->category_id);
		$category->status = 0;
		$category->save();

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
			'categories' => Category::active()->get()->toArray()
		], 200);
	}

	/* --------------------- *\
	|  3. View Functions      |
	\* --------------------- */

	/* --------------------- *\
	|  4. Helper Functions    |
	\* --------------------- */

}
