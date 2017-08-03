<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Website_controller extends CI_Controller{
    protected $_data = array();
    
    // -------------------------------------------------------------------------
    
    public function __construct()
    {
        parent::__construct();                                    
        
        $this->_data['website']    = $this->website_model->website();
        $this->_data['socials']    = $this->website_model->social_links();
        $this->_data['navigation'] = $this->website_model->navigation();
    }    
    
    // -------------------------------------------------------------------------
    
    public function index()
    {
        $this->load->view('templates/header', $this->_data);
        $this->load->view('pages/index');
        $this->load->view('templates/footer', $this->_data);
    }
    
    // -------------------------------------------------------------------------
    
    public function about()
    {
        $this->load->view('templates/header', $this->_data);
        $this->load->view('pages/about');
        $this->load->view('templates/footer', $this->_data);
    }
    
    // -------------------------------------------------------------------------
    
    public function projects()
    {
        $data['projects'] = $this->website_model->projects();
        
        $this->load->view('templates/header', $this->_data);
        $this->load->view('pages/projects', $data);
        $this->load->view('templates/footer', $this->_data);
    }
    
    // -------------------------------------------------------------------------
    
    public function contact()
    {
        $this->load->view('templates/header', $this->_data);
        $this->load->view('pages/contact');
        $this->load->view('templates/footer', $this->_data);
    }
    
    // -------------------------------------------------------------------------
}