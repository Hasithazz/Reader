<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of BookConteroller
 *
 * @author hsedi
 */
class BookController extends CI_Controller {

    function __construct() {
        parent::__construct();

        $this->load->model('BookModel');
        $this->load->model('CategoryModel');
        $this->load->model('UserBookModel');
        $data['categories'] = $this->CategoryModel->getAllCategories();
        $data['mostPopulerBooks'] = $this->BookModel->getMostPopularBooks();
        $this->load->view('HeaderView');
        $this->load->view('layouts/NavBar', $data);
    }

    public function viewBook($book) {

        $data['book'] = $this->BookModel->getBook($book);

        if ($this->session->has_userdata('uid')) {
            echo $this->session->uid;
            $data['recommended'] = $this->BookModel->searchRecomendedBooks($this->session->uid,$book);
            $this->storeDataForTracking($book);
        } else {
            echo 'session destroyed for no reason';
        }

        $this->BookModel->incrementViews($book);

        $this->load->view('BookView', $data);
        $this->load->view('FooterView');
    }

    public function buybook($serialKey) {

        $book = $this->BookModel->getBook($serialKey);
        $item = array(
            'title' => $book->Title,
            'author' => $book->AuthorName,
            'imageUrl' => $book->ImageUrl,
            'price' => $book->Price,
            'qty' => 1
        );

        if (!isset($this->session->sessionArray)) {

            $sessionArray = [];
            array_push($sessionArray, $item);
            $this->session->set_userData('sessionArray', $sessionArray);
        } else {

            $sessionArray = $this->session->sessionArray;
            array_push($sessionArray, $item);
            $this->session->set_userData('sessionArray', $sessionArray);
        }

        $this->viewCart();
    }

    public function viewCart() {
        $this->load->view('CartView');
        $this->load->view('FooterView');
    }

    public function removeItem($index) {

        $sessionArray = $this->session->sessionArray;
        array_splice($sessionArray, $index, 1);
        $this->session->set_userData('sessionArray', $sessionArray);
        $this->viewCart();
    }

    public function storeDataForTracking($serialKey) {

        $this->UserBookModel->insertData($this->session->uid, $serialKey);
    }

}
