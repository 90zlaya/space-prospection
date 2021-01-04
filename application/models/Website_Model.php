<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Website_Model extends CI_Model {

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

    /**
     * Returns only last 5 rows
     * This should be changed when pagination is implemented
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
                'image'       => 'assets/images/projects/' . $row['image'],
            );
        }

        return $return;
    }

}
