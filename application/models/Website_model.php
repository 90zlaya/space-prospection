<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Website_model extends CI_Model{
    protected $project_images_location    = 'assets/images/projects/';
    protected $project_images_replacement = 'no-image.png';
    
    /*------------------------------------------------------------------------*/
    
    public function website(){
        $params = array(
            'name'         => 'Space Prospection', 
            'host'         => base_url(),
            'made'         => 2017,
            'description'  => 'Small website describing space exploration and search for extraterrestrial life',
            'keywords'     => 'space, exploration, life, et, alien',
            'favoriteIcon' => 'assets/images/favicon.png',
            'logo_front'   => 'assets/images/logo.png'
        );
        $this->load->library('zs_website', $params);
        $params = array(
            array(
                'path' => 'assets/css/style.css', 
                'type' => 'link'
            ),
            array(
                'path' => 'assets/css/mobile.css', 
                'type' => 'link'
            ),
            array(
                'path' => 'assets/js/mobile.js', 
                'type' => 'script'
            )
        );
        $this->zs_website->add_to_head($params);
    return array(
        'signature' => $this->zs_website->signature(TRUE),
        'head'      => $this->zs_website->head(),
        'logo'      => $this->zs_website->logo_front
    );
    }
    
    /*------------------------------------------------------------------------*/
    
    public function navigation(){
        $query = "
            SELECT nav.id
                ,nav.name
                ,nav.link
            FROM navigation AS nav
            WHERE nav.stt = 'A'
            ORDER BY nav.arrangement;
        ";
        $result = $this->db->query($query);
        $sql = $result->result_array();
        foreach ($sql as $row){
            $return[] = array(
                'name'  => $row['name'],
                'link'  => $row['link']
            );
        }
    return $return;
    }
    
    /*------------------------------------------------------------------------*/
    
    public function social_links(){
        $query = "
            SELECT sl.id
                ,sl.name
                ,sl.link
            FROM social_links AS sl
            WHERE sl.stt = 'A'
            ORDER BY sl.arrangement;
        ";
        $result = $this->db->query($query);
        $sql = $result->result_array();
        foreach ($sql as $row){
            $return[] = array(
                'name'  => $row['name'],
                'link'  => $row['link']
            );
        }
    return $return;
    }
    
    /*------------------------------------------------------------------------*/
    
    public function projects(){
        $query = "
            SELECT pr.id
                ,pr.title
                ,pr.description
                ,pr.image
            FROM projects AS pr
            WHERE pr.stt = 'A'
            ORDER BY pr.date_entry DESC
            LIMIT 5;
        ";
        $result = $this->db->query($query);
        $sql = $result->result_array();
        foreach ($sql as $row){
            if(empty($row['image'])){
               $row['image'] = $this->project_images_replacement; 
            }
            
            $return[] = array(
                'title'       => strtoupper($row['title']),
                'description' => $row['description'],
                'image'       => $this->project_images_location . $row['image']
            );
        }
    return $return;
    }
    
    /*------------------------------------------------------------------------*/
}    
?>