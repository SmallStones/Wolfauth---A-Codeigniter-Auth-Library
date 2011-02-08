<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* @name WolfAuth
* @category Config
* @package WolfAuth
* @author Dwayne Charrington
* @copyright 2011
* @link http://ilikekillnerds.com
*/


/**
* Define the tables that WolfAuth needs for database shiz
* 
* 'users' is the user table
* 'user_meta' is the user meta table
* 'roles' is the site roles table
* 
*/
$config['tables'] = array(
    'users'     => 'users',
    'user_meta' => 'user_meta',
    'roles'     => 'roles',
);

/**
* When generating a random password this is the
* length the generated password will be.
* 
* @var mixed
*/
$config['password_length'] = 8;

/**
* How are we going to validate this user at login?
* Default criteria is username, but you can also use
* email as well.
* 
* @var mixed
*/
$config['identity_criteria'] = 'username';

/**
* The email address of the website administrator
* 
*/
$config['admin_email'] = "admin@website.com";

/**
* An array of IDs that have admin priveleges
* 
*/
$config['admin_roles'] = array(6,7);

/**
* All guest users will be assigned this ID
* 
* @var mixed
*/
$config['guest_role'] = 0;

$config['cookie_expiry'] = "60 * 60 * 24 * 7"; // One week expiry

/**
* Error settings
*/

/**
* What is placed before the error message?
* 
* @var mixed
*/
$config['error_prefix'] = "<p class='wolfauth_error'>";

/**
* What is placed after the error message (at the end)?
* 
* @var mixed
*/
$config['error_suffix'] = "</p>";

/**
* Email settings
*/

/**
* Usually this would be the admin email,
* but there are cases where you would want
* to use a designated email address to be
* sent from.
* 
* @var mixed
*/
$config['email_from_address'] = "no-reply@websiteapp.com";

/**
* When emails are sent what is the name the receiver will
* see in their inbox?
* 
* @var mixed
*/
$config['email_from_name'] = "Wolf from Websiteapp.com";

/**
* The format of this email
* 
* @var mixed
*/
$config['email_format'] = "html";

/**
* Email character set usually fine left as utf-8
* 
* @var mixed
*/
$config['email_charset'] = "utf-8";

/**
* Do you want the email contents to wrap?
* 
* @var mixed
*/
$config['email_wordwrap'] = FALSE;

/**
* In the email headers this usetagent will be displayed.
* It's best to make this the name of your site or application.
* 
* @var mixed
*/
$config['email_useragent'] = "WolfAuth";
