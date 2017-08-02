<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Submit extends CI_Controller{
    
    // -------------------------------------------------------------------------
    
    public function contact_form()
    {
        $this->form_validation->set_rules('name', 'Name', 'trim|required|callback_alpha_space_only');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('subject', 'Subject', 'trim|required');
        $this->form_validation->set_rules('message', 'Message', 'trim|required');
        
        if ($this->form_validation->run() == FALSE)
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
    * @param mixed $string
    */
    public function alpha_space_only($string)
    {
        if(!empty($string))
        {
            if (!preg_match("/^[a-zA-Z ]+$/",$string))
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