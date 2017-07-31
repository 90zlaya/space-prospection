<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ZS_Website{
    public $name;
    public $host;
    public $made;
    
    public $language          = 'EN';
    public $charset           = 'UTF-8';
    public $description       = 'Simple website';
    public $keywords          = 'siple, website';
    public $favorite_icon     = 'assets/images/favorite_icon.png';
    public $logo_front        = 'assets/images/logo_front.png';
    public $logo_inside       = 'assets/images/logo_inside.png';
    public $creator           = '<a href="https://www.zlatanstajic.com/">Zlatan Stajic</a>';
    public $creator_name      = 'Zlatan Stajic';
    
    protected $_head          = array();
    protected $_bottom        = array();
    protected $_link          = 'link';
    protected $_script        = 'script';
    protected $_link_custom   = 'link-custom';
    protected $_script_custom = 'script-custom';
    
    /*------------------------------------------------------------------------*/
    
    public function __construct($params){
        $this->name = $params['name'];
        $this->host = $params['host'];
        $this->made = $params['made'];
        
        if( !empty($params['language']) ){
            $this->language = $params['language'];
        }
        
        if( !empty($params['charset']) ){
            $this->charset = $params['charset'];
        }
        
        if( !empty($params['description']) ){
            $this->description = $params['description'];
        }
        
        if( !empty($params['keywords']) ){
            $this->keywords = $params['keywords'];
        }
        
        if( !empty($params['favorite_icon']) ){
            $this->favorite_icon = $params['favorite_icon'];
        }
        
        if( !empty($params['logo_front']) ){
            $this->logo_front = $params['logo_front'];
        }
        
        if( !empty($params['logo_inside']) ){
            $this->logo_inside = $params['logo_inside'];
        }
        
        if( !empty($params['creator']) ){
            $this->creator = $params['creator'];
        }
        
        if( !empty($params['creator_name']) ){
            $this->creator_name = $params['creator_name'];
        }
    }        
    
    /*------------------------------------------------------------------------*/
    
    public function signature($alwaysMadeYear=FALSE){
        $currentYear = date('Y');
        
        if( $currentYear === $this->made or $alwaysMadeYear ){
            $since = $currentYear;
        }else{
            $since = $this->made .'-'. $currentYear;
        }
        
    return 'Copyright &#169; '. $since .' | '. $this->creator .' | All Rights Reserved';
    }   
        
    /*------------------------------------------------------------------------*/
    
    public function add_to_head($params){
        if( empty($params) ){
            // Case when there is no parameters to load in head
        }else{
            foreach($params as $param){
                if( empty($param['type']) ){
                    $param['type'] = $this->_link;
                }
                
                $this->_head[] = array(
                    'path' => $param['path'],
                    'type' => $param['type']
                );
            }
        }
    }
    
    /*------------------------------------------------------------------------*/
    
    public function add_to_bottom($params){
        if( empty($params) ){
            // Case when there is no parameters to load in bottom
        }else{
            foreach($params as $param){
                if( empty($param['type']) ){
                    $param['type'] = $this->_script;
                }
                
                $this->_bottom[] = array(
                    'path' => $param['path'],
                    'type' => $param['type']
                );
            }
        }
    }
    
    /*------------------------------------------------------------------------*/
    
    public function head($title=''){
        $return  = '<meta http-equiv="Content-Type" content="text/html; charset='. $this->charset .'">' .PHP_EOL;
        $return .= '<meta http-equiv="X-UA-Compatible" content="IE=edge">' .PHP_EOL;
        $return .= '<meta name="viewport" content="width=device-width, initial-scale=1">' .PHP_EOL;
        $return .= '<meta name="description" content="'. $this->name .':' . ' '. $this->description .'">' .PHP_EOL;
        $return .= '<meta name="keywords" content="'. $this->keywords .'">' .PHP_EOL;
        $return .= '<meta name="author" content="'. $this->creator_name .'">' .PHP_EOL;
        $return .= '<link rel="shortcut icon" href="'. $this->favorite_icon .'" type="image/png">' .PHP_EOL;
        
        $return .= '<title>';
            if( empty($title) ){
                $return .= $this->name;
            }else{
                $return .= $title;
            }
        $return .= '</title>' .PHP_EOL;
        
        $return .= '<!-- HEAD -->' .PHP_EOL;
        if( empty($this->_head) ){
            $return .= '<!-- NOT LOADED -->' .PHP_EOL;
        }else{
            foreach($this->_head as $head){
                switch($head['type']){    
                    case $this->_link:    
                        {
                            $return .= '<link rel="stylesheet" href="';
                            $return .= $head['path'];
                            $return .= '">' .PHP_EOL;
                        }
                    break; 
                    case $this->_script:    
                        {
                            $return .= '<script src="';
                            $return .= $head['path'];
                            $return .= '"></script>' .PHP_EOL;
                        }
                    break; 
                    case $this->_link_custom:    
                        {
                            $return .= '<style>';
                            $return .= $head['path'];
                            $return .= '</style>' .PHP_EOL;
                        }
                    break; 
                    case $this->_script_custom:    
                        {
                            $return .= '<script>';
                            $return .= $head['path'];
                            $return .= '</script>' .PHP_EOL;
                        }
                    break;    
                }    
            }
        }
        $return .= '<!-- /HEAD -->' .PHP_EOL;
        
    return $return;
    }   
    
    /*------------------------------------------------------------------------*/
    
    public function bottom(){
        $return = '<!-- BOTTOM -->' .PHP_EOL;
        if( empty($this->bottom) ){
            $return .= '<!-- NOT LOADED -->' .PHP_EOL;
        }else{
            foreach($this->_bottom as $bottom){
                switch($bottom['type']){    
                    case $this->_link:    
                        {
                            $return .= '<link rel="stylesheet" href="';
                            $return .= $bottom['path'];
                            $return .= '">' .PHP_EOL;
                        }
                    break; 
                    case $this->_script:    
                        {
                            $return .= '<script src="';
                            $return .= $bottom['path'];
                            $return .= '"></script>' .PHP_EOL;
                        }
                    break;    
                }   
            }
        }
        $return .= '<!-- /BOTTOM -->' .PHP_EOL;
    return $return;
    }
    
    /*------------------------------------------------------------------------*/
    
    public function redirect_to_page($page){
        header('Location: '. $page .'');
        exit();
        
        echo '    
            <!doctype html>
            <html lang="en-US">
                <head>
                    <meta charset="UTF-8">
                    <meta http-equiv="refresh" content="1; url='. $this->host .'">
                    <script>
                        window.location.href = "'. $this->host .'";
                    </script>
                    <title>Page Redirection</title>
                </head>
                <body>
                    If you are not redirected automatically, follow this <a href="'. $this->host . $page .'">link to '. $this->name .'</a>.
                </body>
            </html>
        ';            
    }
    
    /*------------------------------------------------------------------------*/
}
?>