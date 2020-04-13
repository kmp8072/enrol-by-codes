<?php 

defined('MOODLE_INTERNAL') || die();
require_once("$CFG->libdir/formslib.php");

class enrol_codes_codes_form extends moodleform {

    public function definition() {
        global $USER, $OUTPUT, $CFG;
        $mform = $this->_form;
        // $mform->addElement('header', 'generatecode',get_string('generatenewcodes', 'enrol_codes'));

        $no_of_codes_attribs = array('size' => '3');
        $mform->addElement('text', 'no_of_codes', get_string('no_of_codes', 'enrol_codes'), $no_of_codes_attribs);
        $mform->setType('no_of_codes', PARAM_INT);
        $mform->addRule('no_of_codes', get_string('inputmaxlength', 'enrol_codes'), 'maxlength', 3, 'server', false, false);
            
        $this->add_action_buttons(false, get_string('generate', 'enrol_codes'));
    }

    public function validation($data, $files) {
        global $DB, $CFG;
          $errors=array();
          if (core_text::strlen($data['no_of_codes']) > 3) {
            $errors['no_of_codes'] = get_string('inputmaxlength', 'enrol_codes');
          }
          if ($data['no_of_codes']===0) {
            $errors['no_of_codes'] = get_string('zerocase', 'enrol_codes');  
          }
        
        return $errors;
    }

}
