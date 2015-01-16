<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| File and Directory Modes
|--------------------------------------------------------------------------
|
| These prefs are used when checking and setting modes when working
| with the file system.  The defaults are fine on servers with proper
| security, but you may wish (or even need) to change the values in
| certain environments (Apache running a separate process for each
| user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
| always be used to set the mode correctly.
|
*/
define('FILE_READ_MODE', 0644);
define('FILE_WRITE_MODE', 0666);
define('DIR_READ_MODE', 0755);
define('DIR_WRITE_MODE', 0777);

/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/

define('FOPEN_READ',							'rb');
define('FOPEN_READ_WRITE',						'r+b');
define('FOPEN_WRITE_CREATE_DESTRUCTIVE',		'wb'); // truncates existing file data, use with care
define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE',	'w+b'); // truncates existing file data, use with care
define('FOPEN_WRITE_CREATE',					'ab');
define('FOPEN_READ_WRITE_CREATE',				'a+b');
define('FOPEN_WRITE_CREATE_STRICT',				'xb');
define('FOPEN_READ_WRITE_CREATE_STRICT',		'x+b');

/*
|--------------------------------------------------------------------------
| Database Tables
|--------------------------------------------------------------------------
|
| These are constants to specific tables
|
*/

define('TBL_ADMINS', 'sap_admins');
define('TBL_USERS', 'sap_users');
define('TBL_CENTRES', 'sap_centres');
define('TBL_STANDARD_PROGRAMS', 'sap_standard_programs');
define('TBL_ADHOC_PROGRAMS', 'sap_adhoc_programs');
define('TBL_PROGRAM_LOCATIONS', 'sap_program_locations');
define('TBL_CENTRE_LOCATIONS', 'sap_centre_locations');

/*
|--------------------------------------------------------------------------
| Path to image resources
|--------------------------------------------------------------------------
|
| These are path constants to img sources
|
*/

define('IMG_RES_PATH', 'application/public/img/main/');


/*
|--------------------------------------------------------------------------
| Other constants
|--------------------------------------------------------------------------
|
| These are constants for other redundant data
|
*/

define('WRITE_DATE', date('Y-m-d H:i:s'));

/*
|--------------------------------------------------------------------------
| App specific constants
|--------------------------------------------------------------------------
|
| These are constants for other redundant data
|
*/

define('STANDARD', 'enrichment');
define('ADHOC', 'holiday');
define('MAX_STANDARD_PROGRAM', 30);
define('MAX_ADHOC_PROGRAM', 10);
define('SUBSCRIBE_URL', 'http://seriousaboutpreschool.us8.list-manage.com/subscribe/post?u=a2fe74eed031ce476626b3744&id=6f35893ec3');

/*
|--------------------------------------------------------------------------
| Advertisement specific constants
|--------------------------------------------------------------------------
|
| These are constants for ads
|
*/

define('HOME_TOP_HEADER', 'home_top_header');
define('HOME_CONTENT_1', 'home_content_1');
define('HOME_CONTENT_2', 'home_content_2');
define('HOME_CONTENT_3', 'home_content_3');

/*
|--------------------------------------------------------------------------
| Email constants
|--------------------------------------------------------------------------
|
| These are constants for emails
|
*/

define('ADMIN_EMAIL', 'tafline.ong@nerubia.com');
define('MARKETING_EMAIL', 'tafline.ong@nerubia.com');

// define('ADMIN_EMAIL', 'admin@seriousaboutpreschool.com');
// define('MARKETING_EMAIL', 'marketing@seriousaboutpreschool.com');

define('SEND_COPY', true);
define('EMAIL_COPY', 'geraldine@wizwerx.com');

define('EMAIL_TO_NAME', 'Serious About Preschool Admin');
define('EMAIL_FROM', 'admin@seriousaboutpreschool.com');
define('EMAIL_FROM_NAME', 'Serious About Preschool');
define('EMAIL_TO', 'sap@seriousaboutpreschool.com');

define('SUBJECT_CENTRE_REGISTRATION_TO_ADMIN', 'New Centre Has Registered!');
define('SUBJECT_REQUEST_MEDIA_RATES', 'Request for Media Rates');
define('SUBJECT_CENTRE_WELCOME', 'Thank You for Registering with SeriousAboutPreschool');



/* End of file constants.php */
/* Location: ./application/config/constants.php */