<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UserModel
 *
 * @author hsedi
 */
class UserModel extends CI_Model{
    
    function insertUser($uid) {
        $data['uid'] = $uid;
        $this->db->insert('user', $data);
    }
}
