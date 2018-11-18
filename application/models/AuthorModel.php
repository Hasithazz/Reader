<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AuthorModel
 *
 * @author hsedi
 */
class AuthorModel extends CI_Model {

    function getAllAuthors() {

        $query = $this->db->get('author');
        return $query->result();
    }

    function insertAuthor($author) {
        
        $data = array(
            'AuthorId' => '',
            'AuthorName' => $author
        );
        return $this->db->insert('author', $data);
    }

    function findAuthor($authorName) {
        
        $query = $this->db->get_where('author', array('AuthorName' => $authorName));
        if ($query->num_rows()) {
            return true;
        } else {
            return false;
        }
    }
}
