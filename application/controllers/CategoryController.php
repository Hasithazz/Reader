<?php

class CategoryController extends CI_Controller {

    function loadCategory($type) {
        $this->load->model('CategoryModel');
        $this->load->model('BookModel');

        $data['categories'] = $this->CategoryModel->getAllCategories();
        $data['category'] = $type;
        $data['booksInCategory'] = $this->CategoryModel->getBooksByCategory($type);
        
        $this->load->view('HeaderView');
        $this->load->view('layouts/NavBar', $data);
        $this->load->view('CategoryView',$data);
        $this->load->view('FooterView');
//        $this->load->view('layouts/main', $data);
    }

}
