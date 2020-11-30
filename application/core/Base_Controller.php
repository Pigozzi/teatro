<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Base_Controller extends CI_Controller
{
    protected $view_directory;
    protected $data;

    public function __construct($view_directory)
    {
        parent::__construct();
        $this->view_directory = $view_directory;
        $this->data = array();
    }

    public function set_title($title)
    {
        $this->data['title'] = $title;
    }

    public function add_data($key, $value)
    {
        $this->data[$key] = $value;
    }

    public function load_view($view)
    {
        $this->load->view('template/header', $this->data);
        $this->load->view('template/navbar');
        $this->load->view('modal/alterar_senha');
        $this->load->view($this->view_directory.'/'.$view);
        $this->load->view('template/footer');
    }

    public function load_show($view)
    {
        $this->load->view('template/header', $this->data);
        $this->load->view('template/navbar');
        $this->load->view('modal/alterar_senha');
        $this->load->view('show/'.$view);
        $this->load->view('template/footer');
    }

}
