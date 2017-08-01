<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Submit extends CI_Controller{
    
    // -------------------------------------------------------------------------
    
    public function contact_form(){
        // Set validation rules
        $this->form_validation->set_rules('name', 'Name', 'trim|required|callback_alpha_space_only');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('subject', 'Subject', 'trim|required');
        $this->form_validation->set_rules('message', 'Message', 'trim|required');
        
        // Run validation check
        if ($this->form_validation->run() == FALSE){   
            // Validation fails
            echo validation_errors();
        }else{
            // Validation succeeds
            
            // Get the form data
            $name       = $this->input->post('name', TRUE);
            $from_email = $this->input->post('email', TRUE);
            $subject    = $this->input->post('subject', TRUE);
            $message    = $this->input->post('message', TRUE);
            
            // Send mail                                             
            $this->email->from($from_email, $name);
            $this->email->to(EMAIL_ADMIN);
            $this->email->subject($subject);
            $this->email->message($message);
            if($this->email->send()){
                // Mail sent
                echo "YES";
            }else{
                // Error
                echo "NO";
            }
        }
        
        // Disable direct URL access
        //show_404();
    }
    
    // -------------------------------------------------------------------------
        
    /**
    * Custom validation function to accept alphabets and space
    * 
    * @param mixed $str
    */
    public function alpha_space_only($str){
        if (!preg_match("/^[a-zA-Z ]+$/",$str)){
            $this->form_validation->set_message('alpha_space_only', 'The %s field must contain only alphabets and space');
            return FALSE;
        }else{
            return TRUE;
        }
    }
    
    // -------------------------------------------------------------------------
}