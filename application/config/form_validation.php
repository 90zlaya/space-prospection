<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
/*
|--------------------------------------------------------------------------
| Configure global form-validation settings
|--------------------------------------------------------------------------
|                                                    
*/
$config = array(
    'contact_us' => array(
        array(
                'field' => 'name',
                'label' => 'Name',
                'rules' => array(
                    'trim',
                    'required',
                    'callback_alpha_space_only'
                )
        ),
        array(
                'field' => 'email',
                'label' => 'Email',
                'rules' => array(
                    'trim',
                    'required',
                    'valid_email'
                )
        ),
        array(
                'field' => 'subject',
                'label' => 'Subject',
                'rules' => array(
                    'trim',
                    'required'
                )
        ),
        array(
                'field' => 'message',
                'label' => 'Message',
                'rules' => array(
                    'trim',
                    'required',
                    'max_length[160]'
                ),
                'errors' => array(
                    'max_length' => 'Message length exceded. Please write shorter message.',
                )
        )
    )
);
