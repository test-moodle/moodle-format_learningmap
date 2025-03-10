<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * TODO describe file error
 *
 * @package    format_learningmap
 * @copyright  2025 ISB Bayern
 * @author Stefan Hanauska <stefan.hanauska@csg-in.de>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

require('../../../config.php');

$courseid = required_param('courseid', PARAM_INT);

require_course_login($courseid);

$url = new moodle_url('/course/view.php', ['id' => $courseid]);
$PAGE->set_url($url);
$PAGE->set_context(context_course::instance($courseid));

$course = get_course($courseid);

$PAGE->set_heading($course->fullname);
echo $OUTPUT->header();

$format = course_get_format($COURSE);

if ($format->main_learningmap_exists()) {
    redirect($url);
} else {
    echo $OUTPUT->render_from_template('format_learningmap/error', []);
}

echo $OUTPUT->footer();
