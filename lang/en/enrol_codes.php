<?php
$string['pluginname'] ='Enrol by codes.';
$string['pluginname_desc'] = 'This enrollment plugin allows teacher to generate code for enrollment in course. Each user will be allowed to use one code,codes once used by anyone can not be used to by other users to enrol into course.';
$string['expiredaction'] = 'Enrolment expiry action';
$string['expiredaction_help'] = 'Select action to carry out when user enrolment expires. Please note that some user data and settings are purged from course during course unenrolment.';
$string['status'] = 'Allow existing enrolments';
$string['status_desc'] = 'Enable enrollment codes enrolment method in new courses.';
$string['status_help'] = 'If enabled together with \'Allow new enrolments\' disabled, only users who enrolled previously can access the course. If disabled, this self enrolment method is effectively disabled, since all existing enrolments are suspended and new users cannot enrol.';
$string['newenrols'] = 'Allow new enrolments';
$string['newenrols_desc'] = 'Allow users to enrol into new courses using enrollment codes by default.';
$string['newenrols_help'] = 'This setting determines whether a user can enrol into this course.';
$string['defaultrole'] = 'Default role assignment';
$string['defaultrole_desc'] = 'Select role which should be assigned to users during enrolment';
$string['enrolperiod'] = 'Enrolment duration';
$string['enrolperiod_desc'] = 'Default length of time that the enrolment is valid. If set to zero, the enrolment duration will be unlimited by default.';
$string['enrolperiod_help'] = 'Length of time that the enrolment is valid, starting with the moment the user enrols themselves. If disabled, the enrolment duration will be unlimited.';
$string['expirynotifyenroller'] = 'Teacher only';
$string['expirynotifyall'] = 'Teacher and enrolled user';
$string['sendcoursewelcomemessage'] = 'Send course welcome message';
$string['sendcoursewelcomemessage_help'] = 'When a user enrols in the course, they may be sent a welcome message email. If sent from the course contact (by default the teacher), and more than one user has this role, the email is sent from the first user to be assigned the role.';
$string['sendexpirynotificationstask'] = "Enrollment codes enrolment send expiry notifications task";
$string['deleteselectedusers'] = 'Delete selected user enrolments';
$string['confirmbulkdeleteenrolment'] = 'Are you sure you want to delete these user enrolments?';
$string['unenrolusers'] = 'Unenrol users';
$string['editselectedusers'] = 'Edit selected user enrolments';
$string['canntenrol'] = 'Enrolment is disabled or inactive';
$string['password'] = 'Enrolment key';
$string['password_help'] = 'An enrolment key enables access to the course to be restricted to only those who know the key.';
$string['enrolme'] = 'Enrol me';
$string['passwordinvalid'] = 'Incorrect enrolment key, please try again';
$string['canntenrolearly'] = 'You cannot enrol yet; enrolment starts on {$a}.';
$string['canntenrollate'] = 'You cannot enrol any more, since enrolment ended on {$a}.';
$string['cohortnonmemberinfo'] = 'Only members of cohort \'{$a}\' can self-enrol.';
$string['dependency_failmessage'] = 'This enrollment plugin require openssl to generate enrollment keys.';
$string['dependency_passed'] = 'Dependency satisfied.';
$string['welcometocoursetext'] = 'Welcome to {$a->coursename}!

If you have not done so already, you should edit your profile page so that we can learn more about you:

  {$a->profileurl}';
$string['welcometocourse'] = 'Welcome to {$a}';
$string['role'] = 'Default assigned role';
$string['enrolstartdate'] = 'Start date';
$string['enrolstartdate_help'] = 'If enabled, users can enrol themselves from this date onward only.';
$string['enrolenddate'] = 'End date';
$string['enrolenddate_help'] = 'If enabled, users can enrol themselves until this date only.';
$string['customwelcomemessage'] = 'Custom welcome message';
$string['customwelcomemessage_help'] = 'A custom welcome message may be added as plain text or Moodle-auto format, including HTML tags and multi-lang tags.

The following placeholders may be included in the message:

* Course name {$a->coursename}
* Link to user\'s profile page {$a->profileurl}
* User email {$a->email}
* User fullname {$a->fullname}';
$string['enrolenddaterror'] = 'Enrolment end date cannot be earlier than start date';
$string['enrolcodes'] = 'Enrollment codes';
$string['generatenewcodes'] = 'Generate new enrollment codes';
$string['inputmaxlength'] = 'You must enter not more than three characters here';
$string['generate'] = 'Generate Codes';
$string['no_of_codes'] = 'How many enrollment keys to generate';
$string['zerocase'] = 'Invalid number';
$string['available_codes'] = 'Available codes';
