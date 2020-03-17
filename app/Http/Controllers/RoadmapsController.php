<?php

namespace App\Http\Controllers;

use App\Topic;
use App\Roadmap;
use App\RoadmapTopic;
use App\RoadmapEnrollment;
use App\RoadmapSection;
use App\SectionContent;

use Illuminate\Http\Request;

class RoadmapsController extends Controller
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

	/* Roadmaps */

	public function create_roadmap(Request $data) {
		$roadmap = new Roadmap;
		$roadmap->user_id = $data->user_id;
		$roadmap->cover = $data->cover;
		$roadmap->title = $data->title;
		$roadmap->description = $data->description;
		$roadmap->save();

		return response()->json([
			'success' => true,
			'roadmap' => $roadmap->toArray()
		], 200);
	}

	public function read_roadmap() {
		return response()->json([
			'success' => true,
			'roadmap' => Roadmap::find($_GET['roadmap_id'])->toArray()
		], 200);
	}

	public function update_roadmap(Request $data) {
		$roadmap = Roadmap::find($data->roadmap_id);

		if (isset($data->cover)) {
			$roadmap->cover = $data->cover;
		}

		if (isset($data->title)) {
			$roadmap->title = $data->title;
		}

		if (isset($data->description)) {
			$roadmap->description = $data->description;
		}

		$roadmap->save();

		return response()->json([
			'success' => true,
			'roadmap' => $roadmap->toArray()
		], 200);
	}

	public function delete_roadmap(Request $data) {
		$roadmap = Roadmap::find($data->roadmap_id);
		$roadmap->status = 0;
		$roadmap->save();

		return response()->json([
			'success' => true
		], 200);
	}

	/* Roadmap Sections */

	public function create_section(Request $data) {
		$section = new RoadmapSection;
		$section->roadmap_id = $data->roadmap_id;
		$section->title = $data->title;
		$section->save();

		return response()->json([
			'success' => true,
			'section' => $section->toArray()
		], 200);
	}

	public function read_section() {
		return response()->json([
			'success' => true,
			'section' => RoadmapSection::find($_GET['section_id'])->toArray()
		], 200);
	}

	public function update_section(Request $data) {
		$section = RoadmapSection::find($data->section_id);

		if (isset($data->title)) {
			$section->title = $data->title;
		}

		$section->save();

		return response()->json([
			'success' => true,
			'section' => $section->toArray()
		], 200);
	}

	public function delete_section(Request $data) {
		$section = RoadmapSection::find($data->section_id);
		$section->status = 0;
		$section->save();

		return response()->json([
			'success' => true
		], 200);
	}

	/* Roadmap Section Content */

	public function create_content(Request $data) {
		$content = new RoadmapContent;
		$content->title = $data->title;
		$content->description = $data->description;
		$content->section_id = $data->section_id;
		$content->link = $data->link;
		$content->category = $data->category;
		$content->save();

		return response()->json([
			'success' => true,
			'content' => $content->toArray()
		], 200);
	}

	public function read_content() {
		return response()->json([
			'success' => true,
			'content' => RoadmapSection::find($_GET['content_id'])->toArray()
		], 200);
	}

	public function update_content(Request $data) {
		$content = RoadmapContent::find($data->content_id);

		if (isset($data->title)) {
			$content->title = $data->title;
		}

		if (isset($data->description)) {
			$content->description = $data->description;
		}

		if (isset($data->section_id)) {
			$content->section_id = $data->section_id;
		}

		if (isset($data->link)) {
			$content->link = $data->link;
		}

		if (isset($data->clicks)) {
			$content->clicks = $data->clicks;
		}

		if (isset($data->category)) {
			$content->category = $data->category;
		}

		$content->save();

		return response()->json([
			'success' => true,
			'content' => $content->toArray()
		], 200);
	}

	public function delete_content(Request $data) {
		$content = RoadmapContent::find($data->content_id);
		$content->status = 0;
		$content->save();

		return response()->json([
			'success' => true
		], 200);
	}

	/* Roadmap Topics */

	public function create_topic(Request $data) {
		$topic = new RoadmapTopic;
		$topic->roadmap_id = $data->roadmap_id;
		$topic->topic_id = $data->topic_id;
		$topic->save();

		return response()->json([
			'success' => true,
			'topic' => $topic->toArray()
		], 200);
	}

	public function read_topic() {
		return response()->json([
			'success' => true,
			'topic' => RoadmapTopic::find($_GET['topic_id'])->toArray()
		], 200);
	}

	public function update_topic(Request $data) {
		$topic = RoadmapTopic::find($data->topic_id);

		if (isset($data->roadmap_id)) {
			$topic->roadmap_id = $data->roadmap_id;
		}

		if (isset($data->topic_id)) {
			$topic->topic_id = $data->topic_id;
		}

		$topic->save();

		return response()->json([
			'success' => true,
			'topic' => $topic->toArray()
		], 200);
	}

	public function delete_topic(Request $data) {
		$topic = RoadmapTopic::find($data->topic_id);
		$topic->status = 0;
		$topic->save();

		return response()->json([
			'success' => true
		], 200);
	}

	/* Roadmap Enrollment */

	public function create_enrollment(Request $data) {
		$enrollment = new RoadmapEnrollment;
		$enrollment->user_id = $data->user_id;
		$enrollment->roadmap_id = $data->roadmap_id;
		$enrollment->save();

		return response()->json([
			'success' => true,
			'enrollment' => $enrollment->toArray()
		], 200);
	}

	public function read_enrollment() {
		return response()->json([
			'success' => true,
			'enrollment' => RoadmapEnrollment::find($_GET['enrollment_id'])->toArray()
		], 200);
	}

	public function delete_enrollment(Request $data) {
		$enrollment = RoadmapEnrollment::find($data->enrollment_id);
		$enrollment->status = 0;
		$enrollment->save();

		return response()->json([
			'success' => true
		], 200);
	}

	/* --------------------- *\
	|  2. Get Functions       |
	\* --------------------- */

	public function get_roadmap() {
		if (isset($_GET['user_id'])) {
			return response()->json([
				'success' => true,
				'roadmap' => Roadmap::where('user_id', $_GET['user_id'])->active()->get()->toArray()
			], 200);
		} else if (isset($_GET['topic_id'])) {
			// Get roadmaps that include the topic
			$roadmap_topics = RoadmapTopic::where('topic_id', $_GET['topic_id'])->active()->get();

			// Create array
			$return_array = array();
			foreach ($roadmap_topics as $roadmap_topic) {
				$roadmap = Roadmap::find($roadmap_topic->roadmap_id);
				array_push($return_array, $roadmap->toArray());
			}

			// Return the roadmaps
			return response()->json([
				'success' => true,
				'roadmaps' => $return_array
			], 200);
		} else if (isset($_GET['category_id'])) {
			// Get topics for that category
			$topics = Topic::where('category_id', $_GET['category_id'])->active()->get();

			// Go through each topic and get the roadmap topics
			$all_roadmap_topics = array();
			$return_array = array();
			foreach ($topics as $topic) {
				$roadmap_topics = RoadmapTopic::where('topic_id', $topic->id)->get();

				foreach($roadmap_topics as $roadmap_topic) {
					$roadmap = Roadmap::find($roadmap_topic->roadmap_id);
					array_push($return_array, $roadmap->toArray());
				}
			}

			// Return the roadmaps
			return response()->json([
				'success' => true,
				'roadmaps' => $return_array
			], 200);
		} else {
			return response()->json([
				'success' => true,
				'roadmaps' => Roadmap::active()->get()->toArray()
			], 200);
		}
	}

	public function get_section() {
		if (isset($_GET['roadmap_id'])) {
			return response()->json([
				'success' => true,
				'sections' => RoadmapSection::where('roadmap_id', $_GET['roadmap_id'])->active()->get()->toArray()
			], 200);
		} else {
			return response()->json([
				'success' => true,
				'sections' => RoadmapSection::active()->get()->toArray()
			], 200);
		}
	}

	public function get_content() {
		if (isset($_GET['section_id'])) {
			return response()->json([
				'success' => true,
				'content' => RoadmapContent::where('section_id', $_GET['section_id'])->active()->get()->toArray()
			], 200);
		} else if (isset($_GET['roadmap_id'])) {
			// Get sections
			$sections = RoadmapSection::where('roadmap_id', $_GET['roadmap_id'])->active()->get();

			// Get the content for each section
			$return_array = array();
			foreach ($sections as $section) {
				$contents = RoadmapContent::where('section_id', $section->id)->active()->get();
				foreach ($contents as $content) {
					array_push($return_array, $content->toArray());
				}
			}

			// Return the content
			return response()->json([
				'success' => true,
				'contents' => $return_array
			], 200);
		} else {
			return response()->json([
				'success' => true,
				'content' => RoadmapContent::active()->get()->toArray()
			], 200);
		}
	}

	public function get_topic() {
		if (isset($_GET['category_id'])) {
			return response()->json([
				'success' => true,
				'topics' => RoadmapTopic::where('category_id', $_GET['category_id'])->active()->get()->toArray()
			], 200);
		} else {
			return response()->json([
				'success' => true,
				'topics' => RoadmapTopic::active()->get()->toArray()
			], 200);
		}
	}

	public function get_enrollment() {
		if (isset($_GET['user_id'])) {
			return response()->json([
				'success' => true,
				'enrollments' => RoadmapEnrollment::where('user_id', $_GET['user_id'])->active()->get()->toArray()
			], 200);
		} else if (isset($_GET['roadmap_id'])) {
			return response()->json([
				'success' => true,
				'enrollments' => RoadmapEnrollment::where('roadmap_id', $_GET['roadmap_id'])->active()->get()->toArray()
			], 200);
		} else {
			return response()->json([
				'success' => true,
				'enrollments' => RoadmapEnrollment::active()->get()->toArray()
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
