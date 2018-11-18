<?php

class BookModel extends CI_Model {

    function getAllBooks($limit, $start) { // limt and start added
        $this->db->select('*');
        $this->db->from('books');
        $this->db->join('author', 'books.AuthorId = author.AuthorId');
        $this->db->limit($limit, $start);
        $query = $this->db->get();
        return $query->result();
    }

    function getMostPopularBooks() {
        $this->db->order_by('Views', 'DESC');
        $this->db->limit(6);
        $query = $this->db->get('books');
        return $query->result();
    }

    function insertBook($data) {
        $data['SerialKey'] = '';
        $data['Views'] = 0;
        return $this->db->insert('books', $data);
    }

    function countAllBooks() {
        return $this->db->count_all("books");
    }

    function getBook($serialKey) {

        $this->db->select('*');
        $this->db->from('books');
        $this->db->join('author', 'books.AuthorId = author.AuthorId');
        $this->db->join('book_category', 'books.SerialKey = book_category.SerialKey');
        $this->db->join('categories', 'book_category.CatID = categories.CatID');
        $this->db->where('books.SerialKey', urldecode($serialKey));
        $query = $this->db->get();

        return $query->row();
    }

    function incrementViews($serialKey) {

        $this->db->set('views', '`views`+1', FALSE);
        $this->db->where('SerialKey', $serialKey);
        $this->db->update('books');
    }

    function searchBook($bookTitle, $authorName) {

        $this->db->select('*');
        $this->db->from('books');
        $this->db->join('author', 'books.AuthorId = author.AuthorId');

        if (isset($bookTitle) && isset($authorName)) {

            $array = array('books.Title' => urldecode($bookTitle), 'author.AuthorName' => urldecode($authorName));
            $this->db->where($array);
        } elseif (isset($bookTitle)) {

            $this->db->where('books.Title', urldecode($bookTitle));
        } elseif (isset($authorName)) {

            $this->db->where('author.AuthorName', urldecode($authorName));
        }
        $query = $this->db->get();
        return $query->result();
    }

    function searchRecomendedBooks($uid, $serialKey) {

        $this->db->select('*');
        $this->db->from('books');
        $this->db->join('user_book', 'books.SerialKey = user_book.SerialKey');
        $this->db->join('user', 'user_book.uid = user.uid');
        $where = 'user_book.uid !="'.$uid.'" AND user_book.SerialKey !='.$serialKey;
        $this->db->where($where);
        $this->db->group_by('user_book.SerialKey,user_book.uid');
        $this->db->order_by('Views', 'DESC');
        $this->db->limit(5);
        $query =$this->db->get();
        
        return $query->result();
        
    }

}
