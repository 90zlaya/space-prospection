<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use phplibrary\Website as website;

class Website_Model extends CI_Model {

    // -------------------------------------------------------------------------

    /**
    * Images folder
    *
    * @var String
    */
    protected $project_images_location = 'assets/images/projects/';

    // -------------------------------------------------------------------------

    /**
    * Instantiates website related data from custom library
    *
    * @return Array
    */
    public function website()
    {
        $website = new website(array(
            'name'        => 'Space Prospection',
            'host'        => base_url(),
            'made'        => '2017',
            'description' => 'Small website describing space exploration and search for extraterrestrial life',
            'keywords'    => 'space, exploration, life, et, alien',
        ));

        $website->add_to_head(array(
            array(
                'path' => base_url() . 'assets/css/style.css',
                'type' => 'link',
            ),
            array(
                'path' => base_url() . 'assets/css/mobile.css',
                'type' => 'link',
            ),
            array(
                'path' => 'https://cdn.jsdelivr.net/npm/jquery@3.2.1/dist/jquery.min.js',
                'type' => 'script',
            ),
            array(
                'path' => base_url() . 'assets/js/mobile.js',
                'type' => 'script',
            ),
        ));

        $website->add_to_images(array(
            'logo_front' => base_url() . 'assets/images/logo.png',
        ), TRUE);

        return array(
            'signature'        => $website->signature(TRUE),
            'signature_hidden' => $website->signature_hidden(),
            'head'             => $website->head(),
            'logo'             => $website->images('logo_front'),
            'meta'             => $website->meta(array(
                'shortcut_icon' => base_url() . 'assets/images/favicon.png',
            )),
        );
    }

    // -------------------------------------------------------------------------

    /**
    * Returns navigation from database
    *
    * @return Array $return
    */
    public function navigation()
    {
        $query  = "
            SELECT nav.id
                ,nav.name
                ,nav.link
            FROM navigation AS nav
            WHERE nav.stt = 'A'
            ORDER BY nav.arrangement;
        ";
        $result = $this->db->query($query);
        $sql    = $result->result_array();
        
        foreach ($sql as $row)
        {
            $return[] = array(
                'name' => $row['name'],
                'link' => $row['link'],
            );
        }

        return $return;
    }

    // -------------------------------------------------------------------------

    /**
    * Returns list of social pages from database
    *
    * @return Array $return
    */
    public function social_links()
    {
        $query  = "
            SELECT sl.id
                ,sl.name
                ,sl.link
            FROM social_links AS sl
            WHERE sl.stt = 'A'
            ORDER BY sl.arrangement;
        ";
        $result = $this->db->query($query);
        $sql    = $result->result_array();
        
        foreach ($sql as $row)
        {
            $return[] = array(
                'name' => $row['name'],
                'link' => $row['link'],
            );
        }

        return $return;
    }

    // -------------------------------------------------------------------------

    /**
    * Returns only last 5 rows
    * This is about to be changed when pagination is implemented
    *
    * @return Array $return
    */
    public function projects()
    {
        $query  = "
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
        $sql    = $result->result_array();
        
        foreach ($sql as $row)
        {
            $return[] = array(
                'title'       => strtoupper($row['title']),
                'description' => $row['description'],
                'image'       => $this->project_images_location . $row['image'],
            );
        }

        return $return;
    }

    // -------------------------------------------------------------------------
}
