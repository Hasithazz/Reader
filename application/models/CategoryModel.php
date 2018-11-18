<?php

class CategoryModel extends CI_Model {

    function getAllCategories() {
        $query = $this->db->get('categories');
        return $query->result();
    }

    function getBooksByCategory($category) {
        /* SELECT *
          FROM books
          INNER JOIN book_category
          ON books.SerialKey = book_category.SerialKey
          INNER JOIN categories
          ON book_category.CatID = categories.CatID
          WHERE categories.Type = 'Fantasy' */

        $this->db->select('*');
        $this->db->from('books');
        $this->db->join('author', 'books.AuthorId = author.AuthorId');
        $this->db->join('book_category', 'books.SerialKey = book_category.SerialKey');
        $this->db->join('categories', 'book_category.CatID = categories.CatID');
        $this->db->where('categories.Type', urldecode($category));
        $query = $this->db->get();
        return $query->result();
    }

    function insertCategory($category) {

        $data = array(
            'CatId' => '',
            'Type' => $category
        );
        return $this->db->insert('categories', $data);
    }

    function findCategory($categoryName) {
        
        $query = $this->db->get_where('categories', array('Type' => $categoryName));
        if ($query->num_rows()) {
            return true;
        } else {
            return false;
        }
    }

}
