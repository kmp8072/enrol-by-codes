<?php
require_once('../../config.php');

$courseid = required_param('courseid', PARAM_INT);
$page = optional_param('page', 0, PARAM_INT);
$perpage = optional_param('perpage', 30, PARAM_INT);

$course = $DB->get_record('course', array('id' => $courseid), '*', MUST_EXIST);
$context = context_course::instance($course->id);
//get instance details
$conditions=array('courseid'=>$courseid,'enrol'=>'codes');
$instance=$DB->get_record('enrol', $conditions, $fields='id,status');
require_login($course);
require_capability('enrol/codes:config', $context);
$PAGE->set_context($context);
$PAGE->set_url('/enrol/codes/codes.php');
$PAGE->set_heading(get_string('enrolcodes','enrol_codes'));
$PAGE->set_pagelayout('admin');
$PAGE->set_title(get_string('pluginname', 'enrol_codes'));
echo $OUTPUT->header();
$mform = new enrol_codes_codes_form(new moodle_url('/enrol/codes/codes.php', array('courseid' => $courseid, 'perpage' => $perpage)));
if ($fromform = $mform->get_data()) {
	$no_of_codes=$fromform->no_of_codes;
	$codesarr=array();
	//generate codes here then redirect
	for ($i=0; $i < $no_of_codes ; $i++) { 
		$code=bin2hex(openssl_random_pseudo_bytes(20));
		$enrolcodes_obj=new stdClass();
		$enrolcodes_obj->enrol_code=$code;
		$enrolcodes_obj->enrolid=$instance->id;
		$enrolcodes_obj->generatorid=$USER->id;
		$codesarr[]=$enrolcodes_obj;
	}
	//put them in table
	$DB->insert_records('enrol_codes', $codesarr);
}

 
 if ($instance->status==ENROL_INSTANCE_ENABLED) {
 	$mform->display();
 	$params=array('enrolid'=>$instance->id);

$count = $DB->count_records_select('enrol_codes',"userid IS NULL AND enrolid= :enrolid", $params);
$start = $page * $perpage;
if ($start > $count) {
    $page = 0;
    $start = 0;
}
$results=$DB->get_records_select('enrol_codes', "userid IS NULL AND enrolid= :enrolid", $params, $sort='', 'enrol_code', $start, $perpage);
$baseurl= new moodle_url('/enrol/codes/codes.php', array('courseid' => $courseid, 'perpage' => $perpage));
$table = new html_table();
$table_headers[] = get_string('available_codes','enrol_codes');
$table->head =$table_headers;
$table->data=$results;
    echo html_writer::start_tag('div', array('class'=>'no-overflow'));
 	echo html_writer::table($table);
 	echo html_writer::end_tag('div');
    echo $OUTPUT->paging_bar($count, $page, $perpage, $baseurl);
 }else{
	echo get_string('canntenrol','enrol_codes');
}
 
 
 echo $OUTPUT->footer();