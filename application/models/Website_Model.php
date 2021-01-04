<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Website_Model extends CI_Model {

    /**
     * Get pages for navigation
     *
     * @return Array
     */
    public function navigation()
    {
        return $this->db->query("
            SELECT nav.navigation_id
                ,nav.name
                ,nav.link
            FROM navigation AS nav
            WHERE nav.active = 1
            ORDER BY nav.arrangement;
        ")->result_array();
    }

    /**
     * Get social links
     *
     * @return Array
     */
    public function social_links()
    {
        return $this->db->query("
            SELECT sl.social_link_id
                ,sl.name
                ,sl.link
            FROM social_links AS sl
            WHERE sl.active = 1
            ORDER BY sl.arrangement;
        ")->result_array();
    }

    /**
     * Get content for projects page (last 5 only)
     *
     * @return Array
     */
    public function projects()
    {
        return $this->db->query("
            SELECT pr.project_id
                ,pr.title
                ,pr.description
                ,pr.image
            FROM projects AS pr
            WHERE pr.active = 1
            ORDER BY pr.date_entry DESC
            LIMIT 5;
        ")->result_array();
    }

}
