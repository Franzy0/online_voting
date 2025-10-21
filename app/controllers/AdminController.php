<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class AdminController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->call->library('session');
        $this->call->model('AdminModel');
    }

    // Admin Login Page
    public function login()
    {
        // Only try to read POST values when the request method is POST
        if ($this->io->method() === 'post') {

            // Safely grab posted fields (framework's io->post is ok here because request is POST)
            $username = $this->io->post('username');
            $password = $this->io->post('password');

            $admin = $this->AdminModel->check_login($username, $password);
            
            if ($admin) {
                $this->session->set_userdata('admin_id', $admin['id']);
                redirect('admin/dashboard');
            } else {
                $data['error'] = "Invalid username or password.";
                $this->call->view('admin/login', $data);
                return;
            }
        }

        // GET (or after failed login) show login form
        $this->call->view('admin/login');
    }

    // Admin Dashboard Page
    public function dashboard()
    {
        if (!$this->session->has_userdata('admin_id')) {
            redirect('admin/login');
        }

        $data['voters'] = $this->AdminModel->get_all_voters();
        $data['votes'] = $this->AdminModel->get_all_votes();
        $data['candidates'] = $this->AdminModel->get_all_candidates();

        $this->call->view('admin/dashboard', $data);
    }

    // Logout
    public function logout()
    {
        $this->session->unset_userdata('admin_id');
        redirect('admin/login');
    }
}
