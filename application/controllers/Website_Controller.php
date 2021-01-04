<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Website_Controller extends CI_Controller {
    
    /**
     * Data passed to view
     * 
     * @var Array
     */
    protected $data = array();
    
    /**
     * Class constructor
     */
    public function __construct()
    {
        parent::__construct();                                    
        
        $this->data['socials']    = $this->Website_Model->social_links();
        $this->data['navigation'] = $this->Website_Model->navigation();
    }
    
    /**
     * Index page
     */
    public function index()
    {
        $this->load->view('templates/header_view', $this->data);
        $this->load->view('pages/index_view');
        $this->load->view('templates/footer_view', $this->data);
    }
    
    /**
     * About page
     */
    public function about()
    {
        $this->load->view('templates/header_view', $this->data);
        $this->load->view('pages/about_view');
        $this->load->view('templates/footer_view', $this->data);
    }
    
    /**
     * Projects page
     */
    public function projects()
    {
        $data['projects'] = $this->Website_Model->projects();
        
        $this->load->view('templates/header_view', $this->data);
        $this->load->view('pages/projects_view', $data);
        $this->load->view('templates/footer_view', $this->data);
    }
    
    /**
     * Contact page
     */
    public function contact()
    {        
        $this->load->view('templates/header_view', $this->data);
        $this->load->view('pages/contact_view');
        $this->load->view('templates/footer_view', $this->data);
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
