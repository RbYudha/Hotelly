<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Hotelly - Login';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/login');
            $this->load->view('templates/auth_footer');
        } else {
            //validasi sukses
            $this->_login();
        }
    }

    private function _login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $employee = $this->db->get_where('employee', ['email_employee' => $email])->row_array();
        // var_dump($employee);
        // die;

        //ada employee
        if ($employee) {
            //jika employee active
            if ($employee['is_active'] == 1) {
                if (password_verify($password, $employee['password'])) {
                    $data = [
                        'email_employee' => $employee['email_employee'],
                        'role_id' => $employee['role_id']
                    ];
                    $this->session->set_userdata($data);
                    //cek 1 atau 2
                    if ($employee['role_id'] == 1) {
                        redirect('manajer');
                    } else {
                        redirect('employee');
                    }
                } else {
                    $this->session->set_flashdata('messageSuc', '<div class="alert alert-danger" role="alert">
                    Wrong password!</div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('messageSuc', '<div class="alert alert-danger" role="alert">
            This email has not been activated!</div>');
                redirect('auth');
            }
            //Gagal
        } else {
            $this->session->set_flashdata('messageSuc', '<div class="alert alert-danger" role="alert">
            This email is not registered!</div>');
            redirect('auth');
        }
    }

    public function registration()
    {
        $this->form_validation->set_rules('fullName', 'Fullname', 'required|trim');
        $this->form_validation->set_rules(
            'email',
            'Email',
            'required|trim|valid_email|is_unique[employee.email_employee]',
            [
                'is_unique' => 'This email has already registered!'
            ]
        );

        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[4]|matches[password2]', [
            'matches' => 'Password dont match!',
            'min_length' => 'Password too short!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

        if ($this->form_validation->run() == false) {
            $this->load->view('auth/registration');
            $this->load->view('templates/auth_footer');
        } else {
            $data = [
                'name_employee' => $this->input->post('fullName'),
                'email_employee' => $this->input->post('email'),
                'image' => 'default.jpg',
                'password' => password_hash(
                    $this->input->post('password1'),
                    PASSWORD_DEFAULT
                ),
                'role_id' => 2,
                'is_active'  => 1,
                'date_created' => date('Y-m-d H:i:s')
            ];

            $this->db->insert('employee', $data);
            $this->session->set_flashdata('messageSuc', '<div class="alert alert-success" role="alert">
            Your Account has been created!</div>');
            redirect('auth');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('email_employee');
        $this->session->unset_userdata('role_id');

        $this->session->set_flashdata('messageSuc', '<div class="alert alert-success" 
        role="alert">You have been logged out</div>');
        redirect('auth');
    }
}
