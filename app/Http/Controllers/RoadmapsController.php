<?php

namespace App\Http\Controllers;

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

	public function create_roadmap(Request $data) {}

	public function read_roadmap() {}

	public function update_roadmap(Request $data) {}

	public function delete_roadmap(Request $data) {}

	/* Roadmap Sections */

	public function create_section(Request $data) {}

	public function read_section() {}

	public function update_section(Request $data) {}

	public function delete_section(Request $data) {}

	/* Roadmap Section Content */

	public function create_content(Request $data) {}

	public function read_content() {}

	public function update_content(Request $data) {}

	public function delete_content(Request $data) {}

	/* Roadmap Topics */

	public function create_topic(Request $data) {}

	public function read_topic() {}

	public function update_topic(Request $data) {}

	public function delete_topic(Request $data) {}

	/* Roadmap Enrollment */

	public function create_enrollment(Request $data) {}

	public function read_enrollment() {}

	public function update_enrollment(Request $data) {}

	public function delete_enrollment(Request $data) {}

	/* --------------------- *\
	|  2. Get Functions       |
	\* --------------------- */

	public function get_roadmap() {}

	public function get_section() {}

	public function get_content() {}

	public function get_topic() {}

	public function get_enrollment() {}

	/* --------------------- *\
	|  3. View Functions      |
	\* --------------------- */

	/* --------------------- *\
	|  4. Helper Functions    |
	\* --------------------- */

}
