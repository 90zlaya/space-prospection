<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact_Submit extends CI_Controller {

    /**
     * Load entire language into variable
     *
     * @var Array
     */
    protected $language = array();

    /**
     * Class constructor
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Accepting parameters from contact_us form inside contact_view page
     */
    public function contact_us()
    {
        $this->form_validation->set_rules(
            'name',
            'Name',
            'trim|required|callback_alpha_space_only'
        );
        $this->form_validation->set_rules(
            'email',
            'E-mail Address',
            'trim|required|valid_email'
        );
        $this->form_validation->set_rules(
            'subject',
            'Subject',
            'trim|required'
        );
        $this->form_validation->set_rules(
            'message',
            'Message',
            'trim|required|max_length[160]'
        );

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

            echo $this->email->send() ? 'YES' : 'NO';
        }
    }

    /**
     * Custom validation function to accept alphabets and space
     *
     * @param String $inputValue
     *
     * @return Bool
     */
    public function alpha_space_only($inputValue)
    {
        if ( ! empty($inputValue))
        {
            if (preg_match("/^[a-zA-Z ]+$/", $inputValue))
            {
                return TRUE;
            }
            else
            {
                $this->form_validation->set_message(
                    'alpha_space_only',
                    'The %s field must contain only alphabets and space.'
                );
            }
        }
    }
    
}
