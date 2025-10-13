<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class admin_controller extends Controller {

    public function __construct() {
        parent::__construct();
        $this->call->model('Admin_model');
        session_start();
    }

    // Admin login page
    public function login() {
        $msg = '';

        if ($this->io->post('username') && $this->io->post('password')) {
            $username = trim($this->io->post('username'));
            $password = trim($this->io->post('password'));

            if ($this->Admin_model->verify_login($username, $password)) {
                $_SESSION['admin'] = $username;
                redirect('admin/dashboard');
            } else {
                $msg = '❌ Invalid admin credentials.';
            }
        }

        $this->call->view('admin_login', ['msg' => $msg]);
    }

    // Dashboard page
    public function dashboard() {
        if (!isset($_SESSION['admin'])) {
            redirect('admin/login');
        }

        $data = [
            'admin' => $_SESSION['admin'],
            'totalVoters' => $this->Admin_model->get_total_voters(),
            'totalCandidates' => $this->Admin_model->get_total_candidates(),
            'totalVotes' => $this->Admin_model->get_total_votes()
        ];

        $this->call->view('admin_dashboard', $data);
    }

    // Logout
    public function logout() {
        session_destroy();
        redirect('admin/login');
    }

    
}
?>
