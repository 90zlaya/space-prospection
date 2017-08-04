<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Submit extends CI_Controller{
    
    // -------------------------------------------------------------------------
    
    public function contact_us()
    {
        if ($this->form_validation->run('contact_us') == FALSE)
        {
            echo validation_errors();
        }
        else
        {
            $name       = $this->input->post('name', TRUE);
            $from_email = $this->input->post('email', TRUE);
            $subject    = $this->input->post('subject', TRUE);
            $message    = $this->input->post('message', TRUE);
            
            $this->email->from($from_email, $name);
            $this->email->to(EMAIL_ADMIN);
            $this->email->subject($subject);
            $this->email->message($message);
            if($this->email->send())
            {
                echo 'YES';
            }
            else
            {
                echo 'NO';
            }
        }
    }
    
    // -------------------------------------------------------------------------
        
    /**
    * Custom validation function to accept alphabets and space
    * 
    * @param String $string
    */
    public function alpha_space_only($string)
    {
        if(!empty($string))
        {
            if (!preg_match("/^[a-zA-Z ]+$/", $string))
            {
                $this->form_validation->set_message('alpha_space_only', 'The %s field must contain only alphabets and space');
                return FALSE;
            }
            else
            {
                return TRUE;
            }   
        }
    }
    
    // -------------------------------------------------------------------------
}