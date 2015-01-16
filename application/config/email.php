<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

//smtp
$config = array(
	'protocol' 			=> 'smtp',
	'smtp_host'			=> 'mail.seriousaboutpreschool.com',
	'smtp_port' 		=> 25,
	'smtp_user' 		=> 'info@seriousaboutpreschool.com',
	'smtp_pass' 		=> 'sap1234!',
	'mailtype' 			=> 'html',
	'charset' 			=> 'utf-8',
	'wordwrap' 			=> TRUE,
	'newline' 			=> '\r\n',
	'crlf' 				=> '\r\n',
	'wrapchars' 		=> 0,
	'send_multipart' 	=> FALSE
);

//sendmail
// $config = array(
// 	'protocol' 			=> 'sendmail',
// 	'smtp_host' 		=> '/usr/sbin/sendmail',
// 	'charset' 			=> 'utf-8',
// 	'mailtype' 			=> 'html',
// 	'wordwrap' 			=> TRUE,
// 	'newline' 			=> '\r\n',
// 	'crlf' 				=> '\r\n',
// 	'wrapchars' 		=> 0,
// 	'send_multipart' 	=> FALSE
// );
