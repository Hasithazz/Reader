<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AdminController
 *
 * @author hsedi
 */
class AdminController extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('BookModel');
        $this->load->model('CategoryModel');
        $this->load->model('BookCategoryModel');
        $this->load->model('AuthorModel');
        $this->load->model('UserModel');
        $this->load->model('AdminModel');
        $this->load->view('HeaderView');
    }

    public function index()
    {

        $this->loadLoginPage();
    }

    public function loadLoginPage()
    {

        $this->load->view('adminViews\AdminLoginView');
    }

    public function validateLogin()
    {

        if ($this->AdminModel->findAdmin($this->input->post('userName'))) {
            if ($this->AdminModel->getAdmin($this->input->post('userName'))->Password == $this->input->post('userPassword')) {

                $this->loadAdminPanel();
            } else {

                $this->loadLoginPage();
            }
        } else {

            $this->loadLoginPage();
        }
    }

    public function loadAdminPanel()
    {

        $this->load->view('adminViews\AdminPanelView');
    }

    public function loadAddView()
    {

        $this->load->view('adminViews\adminNavViews\AddView', $this->loadDataToAddView());
    }

    public function loadDataToAddView()
    {

        $data['authors'] = $this->AuthorModel->getAllAuthors();
        $data['categories'] = $this->CategoryModel->getAllCategories();

        return $data;
    }

    public function addCategory()
    {

        $this->form_validation->set_rules('category', 'Category', 'required|callback_validateCategory');

        if ($this->form_validation->run() == TRUE) {

            if ($this->CategoryModel->insertCategory($this->input->post('category'))) {

                echo '<script>alert("Category Added");</script>';
            } else {

                echo '<script>alert("Something Went Wrong");</script>';
            }
            $this->loadAdminPanel();
        } else {

            $subView = $this->load->view('adminViews\adminNavViews\AddView', $this->loadDataToAddView(), TRUE);
            $this->load->view('adminViews\AdminPanelView', array('subView' => $subView));
        }
    }

    public function addAuthor()
    {
        $this->form_validation->set_rules('author', 'Author', 'required|callback_validateAuthor');

        if ($this->form_validation->run() == TRUE) {

            if ($this->AuthorModel->insertAuthor($this->input->post('author'))) {

                echo '<script>alert("Author Added");</script>';
            } else {

                echo '<script>alert("Something Went Wrong");</script>';
            }
            $this->loadAdminPanel();
        } else {

            $subView = $this->load->view('adminViews\adminNavViews\AddView', $this->loadDataToAddView(), TRUE);
            $this->load->view('adminViews\AdminPanelView', array('subView' => $subView));
        }
    }

    public function addBook()
    {

        $this->setRules();

        if ($this->form_validation->run() == TRUE) {

            if ($this->BookModel->insertBook($this->setBookData()) &&
                $this->BookCategoryModel->insertBookCategory($this->setCategoryData())) {

                $this->uploadImage();
                echo '<script>alert("Book Added");</script>';
            } else {

                echo '<script>alert("Something Went Wrong");</script>';
            }
            $this->loadAdminPanel();
        } else {

            $subView = $this->load->view('adminViews\adminNavViews\AddView', $this->loadDataToAddView(), TRUE);
            $this->load->view('adminViews\AdminPanelView', array('subView' => $subView));
        }
    }

    function setRules()
    {

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('authorSelect', 'Author Name', 'required');
        $this->form_validation->set_rules('categorySelect', 'Category', 'required');
        $this->form_validation->set_rules('yearOfPublished', 'Published Year', 'required');
        $this->form_validation->set_rules('price', 'Price', 'required');
        $this->form_validation->set_rules('imageName', 'Name', 'required');
    }

    public function setBookData()
    {

        $bookData['Title'] = $this->input->post('title');
        $bookData['AuthorId'] = $this->input->post('authorSelect');
        $bookData['YearOfPublished'] = $this->input->post('yearOfPublished');
        $bookData['price'] = $this->input->post('price');
        $bookData['ImageUrl'] = $this->input->post('imageName') . '.jpg';

        return $bookData;
    }

    public function setCategoryData()
    {
        $catData['Title'] = $this->input->post('title');
        $catData['CatID'] = $this->input->post('categorySelect');

        return $catData;
    }

    public function uploadImage()
    {

        $this->upload->initialize($this->createUploadConfig($this->input->post('imageName')));
        if (!$this->upload->do_upload('upload')) {

            $error = array('error' => $this->upload->display_errors());

            $this->load->view('adminViews\AdminPanelView', $error);
        }
    }

    function createUploadConfig($ImageName)
    {

        $config['upload_path'] = './assets/images/';
        $config['allowed_types'] = 'jpg';
        $config['max_size'] = 0;
        $config['file_name'] = urldecode($ImageName);
        $config['max_width'] = 0;
        $config['max_height'] = 0;
        $config['remove_spaces'] = FALSE;

        return $config;
    }

    public function validateCategory($category)
    {

        if ($this->CategoryModel->findCategory($category)) {
            $this->form_validation->set_message('validateCategory', 'The Category already exist');
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function validateAuthor($author)
    {

        if ($this->AuthorModel->findAuthor($author)) {
            $this->form_validation->set_message('validateAuthor', 'The Author already exist');
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function loadSearchView()
    {
        $this->load->view('adminViews\adminNavViews\searchBookView');
    }

    public function searchBook()
    {

        $searchType = $this->setSearchRules();

        if ($this->form_validation->run() == TRUE) {

            $data['books'] = $this->getBookData($searchType);

            $subView = $this->load->view('adminViews\adminNavViews\SearchBookView', $data, TRUE);
            $this->load->view('adminViews\AdminPanelView', array('subView' => $subView));
        } else {

            $subView = $this->load->view('adminViews\adminNavViews\SearchBookView', '', TRUE);
            $this->load->view('adminViews\AdminPanelView', array('subView' => $subView));
        }
    }

    function setSearchRules()
    {

        $searchType = 0;

        if ($this->input->post('titleCheck') == 'check' && $this->input->post('authorCheck') == 'check') {

            $this->form_validation->set_rules('searchTitle', 'Title', 'required');
            $this->form_validation->set_rules('searchAuthor', 'Author', 'required');
            $searchType = 1;
        } elseif ($this->input->post('titleCheck') == 'check') {

            $this->form_validation->set_rules('searchTitle', 'Title', 'required');
            $searchType = 2;
        } elseif ($this->input->post('authorCheck') == 'check') {

            $this->form_validation->set_rules('searchAuthor', 'Author', 'required');
            $searchType = 3;
        } else {
            $this->form_validation->set_rules('titleCheck', '', 'required');
            $this->form_validation->set_rules('authorCheck', '', 'required');
        }
        return $searchType;
    }

    public function getBookData($searchType)
    {
        switch ($searchType) {
            case 1:
                return $this->BookModel->searchBook($this->input->post('searchTitle'), $this->input->post('searchAuthor'));
            case 2:
                return $this->BookModel->searchBook($this->input->post('searchTitle'), NULL);
            case 3:
                return $this->BookModel->searchBook(NULL, $this->input->post('searchAuthor'));
            default:
                break;
        }
    }

    public function loadViewStatistics()
    {
        $data['books'] = $this->BookModel->getAdvanceDetails();
        $this->load->view('adminViews\adminNavViews\AdminBookView', $data);

    }

}
