<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UserBookModel
 *
 * @author hsedi
 */
class UserBookModel extends CI_Model {

    function insertData($uid, $serialKey) {

        $this->load->helper('date');
        
        $data['uid'] = $uid;
        $data['SerialKey'] = $serialKey;
        $datestring = "%Y:%m:%d";
        $time = time();
        $data['date'] = mdate($datestring, $time);
        return $this->db->insert('user_book', $data);
    }

}
