<?php

class HomeController extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('BookModel');
        $this->load->model('CategoryModel');
        $this->load->model('UserModel');
        $data['categories'] = $this->CategoryModel->getAllCategories();       
        $this->load->view('HeaderView');        
        $this->load->view('layouts/NavBar', $data);
        
        if (!isset($this->session->uid)) {
            $this->session->set_userdata('uid', uniqid());
            $this->UserModel->insertUser($this->session->uid);
        }
    }

    public function index() {

        echo $this->session->uid;

        $this->configurePagination();
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        $data['mostPopulerBooks'] = $this->BookModel->getMostPopularBooks();
        $data['allBooks'] = $this->BookModel->getAllBooks(8, $page);
        $data['links'] = $this->pagination->create_links();



        $this->load->view('HomeView', $data);
        $this->load->view('FooterView');
//        $this->load->view('layouts/main', $data);
    }

    public function configurePagination() {


        $config = array();
        $config['base_url'] = base_url('HomeController/index');
        $config['total_rows'] = $this->BookModel->countAllBooks();
        $config['per_page'] = 8;
        $this->pagination->initialize($config);
    }

}
