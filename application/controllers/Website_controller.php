<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Website_controller extends CI_Controller{
    protected $data = array();
    
    /*------------------------------------------------------------------------*/
    
    public function __construct(){
        parent::__construct();
        
        $this->load->model('website_model');
        
        $this->data['website']    = $this->website_model->website();
        $this->data['socials']    = $this->website_model->social_links();
        $this->data['navigation'] = $this->website_model->navigation();
    }    
    
    /*------------------------------------------------------------------------*/
    
    public function index(){
        $this->load->view('template/header', $this->data);$this->load->view('page/index');
        $this->load->view('template/footer', $this->data);
    }
    
    /*------------------------------------------------------------------------*/
    
    public function about(){
        $this->load->view('template/header', $this->data);
        $this->load->view('page/about');
        $this->load->view('template/footer', $this->data);
    }
    
    /*------------------------------------------------------------------------*/
    
    public function projects(){
        $data['projects'] = $this->website_model->projects();
        
        $this->load->view('template/header', $this->data);
        $this->load->view('page/projects', $data);
        $this->load->view('template/footer', $this->data);
    }
    
    /*------------------------------------------------------------------------*/
    
    public function contact(){
        $this->load->view('template/header', $this->data);
        $this->load->view('page/contact');
        $this->load->view('template/footer', $this->data);
    }
    
    /*------------------------------------------------------------------------*/
}