<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of BookCategoryModel
 *
 * @author hsedi
 */
class BookCategoryModel extends CI_Model {

    function insertBookCategory($data) {
        
        $this->db->select('SerialKey');
        $this->db->from('books');
        $this->db->where('books.Title', urldecode($data['Title']));
        $query = $this->db->get();
        $row = $query->row();
        if (isset($row)) {
            $insertData['SerialKey'] = $row->SerialKey;
            $insertData['CatID'] = $data['CatID'];

            return $this->db->insert('book_category', $insertData);
        }else
            echo 'book did no added';
            return FALSE;
    }

}
