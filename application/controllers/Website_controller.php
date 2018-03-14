<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Website_Controller extends CI_Controller {
    
    // -------------------------------------------------------------------------
    
    /**
    * Data passed to view
    * 
    * @var Array
    */
    protected $data = array();
    
    // -------------------------------------------------------------------------
    
    /**
    * Class constructor
    */
    public function __construct()
    {
        parent::__construct();                                    
        
        $this->data['website']    = $this->website_model->website();
        $this->data['socials']    = $this->website_model->social_links();
        $this->data['navigation'] = $this->website_model->navigation();
    }    
    
    // -------------------------------------------------------------------------
    
    /**
    * Index page
    */
    public function index()
    {
        $this->load->view('templates/header_view', $this->data);
        $this->load->view('pages/index_view');
        $this->load->view('templates/footer_view', $this->data);
    }
    
    // -------------------------------------------------------------------------
    
    /**
    * About page
    */
    public function about()
    {
        $this->load->view('templates/header_view', $this->data);
        $this->load->view('pages/about_view');
        $this->load->view('templates/footer_view', $this->data);
    }
    
    // -------------------------------------------------------------------------
    
    /**
    * Projects page
    */
    public function projects()
    {
        $data['projects'] = $this->website_model->projects();
        
        $this->load->view('templates/header_view', $this->data);
        $this->load->view('pages/projects_view', $data);
        $this->load->view('templates/footer_view', $this->data);
    }
    
    // -------------------------------------------------------------------------
    
    /**
    * Contact page
    */
    public function contact()
    {
        $this->lang->load('contact_lang', $this->config->item('language'));
        $data['lang'] = $this->lang->language;
        
        $this->load->view('templates/header_view', $this->data);
        $this->load->view('pages/contact_view', $data);
        $this->load->view('templates/footer_view', $this->data);
    }
    
    // -------------------------------------------------------------------------
}
