<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
/*
|--------------------------------------------------------------------------
| Configure email settings
|--------------------------------------------------------------------------
|
| Set your own settings to enable email communication
| in this project.
|                                                    
*/
$config['protocol']  = 'smtp';
$config['smtp_host'] = 'ssl://smtp.gmail.com'; // Change this to yours
$config['smtp_port'] = '465';
$config['smtp_user'] = 'user@gmail.com'; // Change this to yours
$config['smtp_pass'] = 'mypassword'; // Change this to yours
$config['mailtype']  = 'html';
$config['wordwrap']  = TRUE;
$config['newline']   = "\r\n"; // Always use double quotes
