<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Website_controller extends CI_Controller{
    protected $_data = array();
    
    /*------------------------------------------------------------------------*/
    
    public function __construct(){
        parent::__construct();
        
        $this->load->model('website_model');
        
        $this->_data['website']    = $this->website_model->website();
        $this->_data['socials']    = $this->website_model->social_links();
        $this->_data['navigation'] = $this->website_model->navigation();
    }    
    
    /*------------------------------------------------------------------------*/
    
    public function index(){
        $this->load->view('template/header', $this->_data);$this->load->view('page/index');
        $this->load->view('template/footer', $this->_data);
    }
    
    /*------------------------------------------------------------------------*/
    
    public function about(){
        $this->load->view('template/header', $this->_data);
        $this->load->view('page/about');
        $this->load->view('template/footer', $this->_data);
    }
    
    /*------------------------------------------------------------------------*/
    
    public function projects(){
        $data['projects'] = $this->website_model->projects();
        
        $this->load->view('template/header', $this->_data);
        $this->load->view('page/projects', $data);
        $this->load->view('template/footer', $this->_data);
    }
    
    /*------------------------------------------------------------------------*/
    
    public function contact(){
        $this->load->view('template/header', $this->_data);
        $this->load->view('page/contact');
        $this->load->view('template/footer', $this->_data);
    }
    
    /*------------------------------------------------------------------------*/
    public function submit(){
        // Set validation rules
        $this->form_validation->set_rules('name', 'Name', 'trim|required|xss_clean');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('subject', 'Subject', 'trim|required|xss_clean');
        $this->form_validation->set_rules('message', 'Message', 'trim|required|xss_clean');
        
        // Run validation check
        if ($this->form_validation->run() == FALSE){   
            // Validation fails
            echo validation_errors();
        }
        else{
            // Validation succeeds
            /*
            //get the form data
            $name = $this->input->post('name');
            $from_email = $this->input->post('email');
            $subject = $this->input->post('subject');
            $message = $this->input->post('message');
            
            //set to_email id to which you want to receive mails
            $to_email = 'user@gmail.com';
            
            //configure email settings
            $config['protocol'] = 'smtp';
            $config['smtp_host'] = 'ssl://smtp.gmail.com'; // change this to yours
            $config['smtp_port'] = '465';
            $config['smtp_user'] = 'user@gmail.com'; // change this to yours
            $config['smtp_pass'] = 'mypassword'; // change this to yours
            $config['mailtype'] = 'html';
            $config['charset'] = 'iso-8859-1';
            $config['wordwrap'] = TRUE;
            $config['newline'] = "\r\n"; //use double quotes
            $this->email->initialize($config);
            
            //send mail
            $this->email->from($from_email, $name);
            $this->email->to($to_email);
            $this->email->subject($subject);
            $this->email->message($message);
            if ($this->email->send())
            {
                // mail sent
                echo "YES";
            }
            else
            {
                //error
                echo "NO";
            }
            */
        }        
    }
    
    /*------------------------------------------------------------------------*/
}