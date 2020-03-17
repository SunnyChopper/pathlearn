<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('categories')->group(function() {
	Route::post('create', 'CategoriesController@create');
	Route::get('read', 'CategoriesController@read');
	Route::post('update', 'CategoriesController@update');
	Route::post('delete', 'CategoriesController@delete');
	Route::get('get', 'CategoriesController@get');
});

Route::prefix('flags')->group(function() {
	Route::post('create', 'FlagsController@create');
	Route::post('update', 'FlagsController@update');
	Route::post('delete', 'FlagsController@delete');
	Route::get('get', 'FlagsController@get');
});

Route::prefix('roadmaps')->group(function() {
	// Roadmaps
	Route::post('create', 'RoadmapsController@create_roadmap');
	Route::get('read', 'RoadmapsController@read_roadmap');
	Route::post('update', 'RoadmapsController@update_roadmap');
	Route::post('delete', 'RoadmapsController@delete_roadmap');
	Route::get('get', 'RoadmapsController@get_roadmap');

	// Roadmap Sections
	Route::post('sections/create', 'RoadmapsController@create_section');
	Route::get('sections/read', 'RoadmapsController@read_section');
	Route::post('sections/update', 'RoadmapsController@update_section');
	Route::post('sections/delete', 'RoadmapsController@delete_section');
	Route::get('sections/get', 'RoadmapsController@get_section');

	// Roadmap Section Content
	Route::post('sections/content/create', 'RoadmapsController@create_content');
	Route::get('sections/content/read', 'RoadmapsController@read_content');
	Route::post('sections/content/update', 'RoadmapsController@update_content');
	Route::post('sections/content/delete', 'RoadmapsController@delete_content');
	Route::get('sections/content/get', 'RoadmapsController@get_content');

	// Roadmap Topics
	Route::post('topics/create', 'RoadmapsController@create_topic');
	Route::get('topics/read', 'RoadmapsController@read_topic');
	Route::post('topics/update', 'RoadmapsController@update_topic');
	Route::post('topics/delete', 'RoadmapsController@delete_topic');
	Route::get('topics/get', 'RoadmapsController@get_topic');

	// Roadmap Enrollment
	Route::post('enrollments/create', 'RoadmapsController@create_enrollment');
	Route::get('enrollments/read', 'RoadmapsController@read_enrollment');
	Route::post('enrollments/update', 'RoadmapsController@update_enrollment');
	Route::post('enrollments/delete', 'RoadmapsController@delete_enrollment');
	Route::get('enrollments/get', 'RoadmapsController@get_enrollment');
});

Route::prefix('topics')->group(function() {
	Route::post('create', 'TopicsController@create');
	Route::get('read', 'TopicsController@read');
	Route::post('update', 'TopicsController@update');
	Route::post('delete', 'TopicsController@delete');
	Route::get('get', 'TopicsController@get');
});

Route::prefix('users')->group(function() {
	Route::post('create', 'UsersController@create');
	Route::get('read', 'UsersController@read');
	Route::post('update', 'UsersController@update');
	Route::post('delete', 'UsersController@delete');
	Route::get('get', 'UsersController@get');
});