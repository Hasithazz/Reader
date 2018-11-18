<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AdminModel
 *
 * @author hsedi
 */
class AdminModel extends CI_Model {

    function getAllAdmins() {

        $query = $this->db->get('admin');
        return $query->result();
    }

    function findAdmin($userName) {

        $query = $this->db->get_where('admin', array('UserName' => $userName));
        if ($query->num_rows()) {
            return true;
        } else {
            return false;
        }
    }

    function getAdmin($userName) {

        $query = $this->db->get_where('admin', array('UserName' => $userName));
        return $query->row();
    }

}
