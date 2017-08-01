<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Website_controller extends CI_Controller{
    protected $_data = array();
    
    // -------------------------------------------------------------------------
    
    public function __construct(){
        parent::__construct();                                    
        
        $this->load->model('website_model');
        
        $this->_data['website']    = $this->website_model->website();
        $this->_data['socials']    = $this->website_model->social_links();
        $this->_data['navigation'] = $this->website_model->navigation();
    }    
    
    // -------------------------------------------------------------------------
    
    public function index(){
        $this->load->view('template/header', $this->_data);$this->load->view('page/index');
        $this->load->view('template/footer', $this->_data);
    }
    
    // -------------------------------------------------------------------------
    
    public function about(){
        $this->load->view('template/header', $this->_data);
        $this->load->view('page/about');
        $this->load->view('template/footer', $this->_data);
    }
    
    // -------------------------------------------------------------------------
    
    public function projects(){
        $data['projects'] = $this->website_model->projects();
        
        $this->load->view('template/header', $this->_data);
        $this->load->view('page/projects', $data);
        $this->load->view('template/footer', $this->_data);
    }
    
    // -------------------------------------------------------------------------
    
    public function contact(){
        $this->load->view('template/header', $this->_data);
        $this->load->view('page/contact');
        $this->load->view('template/footer', $this->_data);
    }
    
    // -------------------------------------------------------------------------
}