<?php

defined('MOODLE_INTERNAL') || die();

if ($ADMIN->fulltree) {

    //--- general settings ----------

    $settings->add(new admin_setting_heading('enrol_codes_settings', '', get_string('pluginname_desc', 'enrol_codes')));


    // Note: let's reuse the ext sync constants and strings here, internally it is very similar,
    //       it describes what should happend when users are not supposed to be enerolled any more.
    $options = array(
        ENROL_EXT_REMOVED_KEEP           => get_string('extremovedkeep', 'enrol'),
        ENROL_EXT_REMOVED_SUSPENDNOROLES => get_string('extremovedsuspendnoroles', 'enrol'),
        ENROL_EXT_REMOVED_UNENROL        => get_string('extremovedunenrol', 'enrol'),
    );
    $settings->add(new admin_setting_configselect('enrol_codes/expiredaction', get_string('expiredaction', 'enrol_codes'), get_string('expiredaction_help', 'enrol_codes'), ENROL_EXT_REMOVED_KEEP, $options));

    $options = array();
    for ($i=0; $i<24; $i++) {
        $options[$i] = $i;
    }
    $settings->add(new admin_setting_configselect('enrol_codes/expirynotifyhour', get_string('expirynotifyhour', 'core_enrol'), '', 6, $options));

    //--- enrol instance defaults ----------------------------------------------------------------------------
    $settings->add(new admin_setting_heading('enrol_self_defaults',
        get_string('enrolinstancedefaults', 'admin'), get_string('enrolinstancedefaults_desc', 'admin')));

    $settings->add(new admin_setting_configcheckbox('enrol_codes/defaultenrol',
        get_string('defaultenrol', 'enrol'), get_string('defaultenrol_desc', 'enrol'), 1));

    $options = array(ENROL_INSTANCE_ENABLED  => get_string('yes'),
                     ENROL_INSTANCE_DISABLED => get_string('no'));
    $settings->add(new admin_setting_configselect('enrol_codes/status',
        get_string('status', 'enrol_codes'), get_string('status_desc', 'enrol_codes'), ENROL_INSTANCE_DISABLED, $options));

    $options = array(1  => get_string('yes'), 0 => get_string('no'));
    $settings->add(new admin_setting_configselect('enrol_codes/newenrols',
        get_string('newenrols', 'enrol_codes'), get_string('newenrols_desc', 'enrol_codes'), 1, $options));


    if (!during_initial_install()) {
        $options = get_default_enrol_roles(context_system::instance());
        $student = get_archetype_roles('student');
        $student = reset($student);
        $settings->add(new admin_setting_configselect('enrol_codes/roleid',
            get_string('defaultrole', 'enrol_codes'), get_string('defaultrole_desc', 'enrol_codes'), $student->id, $options));
    }

    $settings->add(new admin_setting_configduration('enrol_codes/enrolperiod',
        get_string('enrolperiod', 'enrol_codes'), get_string('enrolperiod_desc', 'enrol_codes'), 0));

    $options = array(0 => get_string('no'),
                     1 => get_string('expirynotifyenroller', 'enrol_codes'),
                     2 => get_string('expirynotifyall', 'enrol_codes'));
    $settings->add(new admin_setting_configselect('enrol_codes/expirynotify',
        get_string('expirynotify', 'core_enrol'), get_string('expirynotify_help', 'core_enrol'), 0, $options));

    $settings->add(new admin_setting_configduration('enrol_codes/expirythreshold',
        get_string('expirythreshold', 'core_enrol'), get_string('expirythreshold_help', 'core_enrol'), 86400, 86400));

    $settings->add(new admin_setting_configselect('enrol_codes/sendcoursewelcomemessage',
            get_string('sendcoursewelcomemessage', 'enrol_codes'),
            get_string('sendcoursewelcomemessage_help', 'enrol_codes'),
            ENROL_SEND_EMAIL_FROM_COURSE_CONTACT,
            enrol_send_welcome_email_options()));
}
