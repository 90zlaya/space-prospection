<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Website_Controller extends CI_Controller{
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
        $this->load->view('templates/header_view', $this->_data);
        $this->load->view('pages/index_view');
        $this->load->view('templates/footer_view', $this->_data);
    }
    
    // -------------------------------------------------------------------------
    
    public function about()
    {
        $this->load->view('templates/header_view', $this->_data);
        $this->load->view('pages/about_view');
        $this->load->view('templates/footer_view', $this->_data);
    }
    
    // -------------------------------------------------------------------------
    
    public function projects()
    {
        $data['projects'] = $this->website_model->projects();
        
        $this->load->view('templates/header_view', $this->_data);
        $this->load->view('pages/projects_view', $data);
        $this->load->view('templates/footer_view', $this->_data);
    }
    
    // -------------------------------------------------------------------------
    
    public function contact()
    {
        $this->lang->load('contact_lang', $this->config->item('language'));
        $data['lang'] = $this->lang->language;
        
        $this->load->view('templates/header_view', $this->_data);
        $this->load->view('pages/contact_view', $data);
        $this->load->view('templates/footer_view', $this->_data);
    }
    
    // -------------------------------------------------------------------------
}