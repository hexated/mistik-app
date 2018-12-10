<?php

class Daftar_donatur extends CI_Controller
{

public function __construct()
{
        parent::__construct();
        $this->load->model('Donatur_model');
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
}

public function index()
{
        $data['judul'] = 'Mistik';
        $data['donatur'] = $this->Donatur_model->getAllDonatur();

        $config = array(
        array(
                'field' => 'username',
                'label' => 'Username',
                'rules' => 'required'
        ),
        array(
                'field' => 'ttl',
                'label' => 'Tanggal Lahir',
                'rules' => 'required'
        ),
        array(
                'field' => 'alamat',
                'label' => 'Alamat',
                'rules' => 'required'
        ),
        array(
                'field' => 'email',
                'label' => 'Email',
                'rules' => 'required|valid_email'
        ),
        array(
                'field' => 'notelp',
                'label' => 'Telephone number',
                'rules' => 'required|numeric'
        ),
        array(
                'field' => 'password',
                'label' => 'Password',
                'rules' => 'required|min_length[6]'
        ),
        array(
                'field' => 'repeat',
                'label' => 'Password Confirmation',
                'rules' => 'required|matches[password]'
        ),
        );

        $this->form_validation->set_rules($config);

        if ($this->form_validation->run() == FALSE) 
        {
        
        $this->load->view('templates/header' , $data);
        $this->load->view('app/daftar donatur/index' , $data);
        $this->load->view('templates/footer');

        } else 
        {
        $this->Donatur_model->tambahDataDonatur();
        $this->session->set_flashdata('flash', 'Disimpan');
        redirect('daftar_donatur');
        }
}
}